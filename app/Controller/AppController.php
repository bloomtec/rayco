<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $cacheAction = true;
	
	private $identifier = '';

	public $components = array('Auth', 'Session', 'Cookie', 'Attachment');

	public function beforeFilter() {
		$Class = $this -> modelClass;
		$this -> $Class -> contain();
		$this -> beforeFilterAuthConfig();
		$this -> beforeFilterCookieConfig();
		if (isset($this -> params["prefix"]) && $this -> params["prefix"] == "admin") {
			$this -> layout = "Ez.default";
		}
	}
	
	public function isAuthorized() {
		if (isset($this -> params["prefix"]) && $this -> params["prefix"] == "admin" && !$this -> Auth -> user('id')) {
			return false;
		} elseif(isset($this -> params["prefix"]) && $this -> params["prefix"] == "admin" && $this -> Auth -> user('id')) {
			return true;
		}
	}

	private function beforeFilterAuthConfig() {
		$this -> Auth -> authorize = array('Controller');
		$this -> Auth -> authenticate = array('Form' => array('scope' => array('es_activo' => 1)));
		if (isset($this -> params["prefix"]) && $this -> params["prefix"] == "admin") {
			$this -> Auth -> loginAction = array('controller' => 'users', 'action' => 'login', 'plugin' => 'user_control', 'admin' => true);
		} else {
			$this -> Auth -> allow('*');
		}
		$this -> Auth -> authError = __('No tiene permiso para ver esta sección', true);
		$this -> Auth -> loginRedirect = array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'profile');
		$this -> Auth -> logoutRedirect = array('plugin' => 'user_control', 'controller' => 'users', 'action' => 'login');
	}

	private function beforeFilterCookieConfig() {
		if(isset($this -> Cookie -> name) && !empty($this -> Cookie -> name)) {
			$this -> Cookie -> name = 'PriceShoes';
		}
		if(isset($this -> Cookie -> time) && !empty($this -> Cookie -> time)) {
			$this -> Cookie -> time = 1800;  // 3600 = '1 hour'
		}
		if(isset($this -> Cookie -> path) && !empty($this -> Cookie -> path)) {
			$this -> Cookie -> path = '/';
		}
		if(isset($this -> Cookie -> domain) && !empty($this -> Cookie -> domain)) {
			$this -> Cookie -> domain = 'priceshoes.com.co';
		}
		if(isset($this -> Cookie -> secure) && !empty($this -> Cookie -> secure)) {
			$this -> Cookie -> secure = true;  // i.e. only sent if using secure HTTPS
		}
		if(isset($this -> Cookie -> key) && !empty($this -> Cookie -> key)) {
			$this -> Cookie -> key = 'qSI2Web32qs*&BlsXOoomw!';
		}
		if(isset($this -> Cookie -> httpOnly) && !empty($this -> Cookie -> httpOnly)) {
			$this -> Cookie -> httpOnly = true;
		}
	}
	
	protected function cleanImages() {
		// Llamar los modelos que usan imagenes
		$this -> loadModel('Category');
		$this -> loadModel('Gallery');
		$this -> loadModel('Image');
		
		$fileNames = array();
		
		$tmpFileNames = null;
		
		// Obtener nombres de archivos registrados en las diferentes tablas
		$tmpFileNames = $this -> Category -> find('list', array('recursive' => -1, 'conditions' => array('Category.image NOT' => null), 'fields' => array('Category.image')));
		foreach ($tmpFileNames as $index => $tmpFileName) {
			$fileNames[] = $tmpFileName;
		}
		$tmpFileNames = $this -> Gallery -> find('list', array('recursive' => -1, 'conditions' => array('Gallery.image NOT' => null), 'fields' => array('Gallery.image')));
		foreach ($tmpFileNames as $index => $tmpFileName) {
			$fileNames[] = $tmpFileName;
		}
		$tmpFileNames = $this -> Image -> find('list', array('recursive' => -1, 'conditions' => array('Image.path NOT' => null), 'fields' => array('Image.path')));
		foreach ($tmpFileNames as $index => $tmpFileName) {
			$fileNames[] = $tmpFileName;
		}
		
		$directories = array(
			0 => IMAGES . 'uploads',
			1 => IMAGES . 'uploads/50x50',
			2 => IMAGES . 'uploads/100x100',
			3 => IMAGES . 'uploads/150x150',
			4 => IMAGES . 'uploads/215x215',
			5 => IMAGES . 'uploads/360x360',
			6 => IMAGES . 'uploads/750x750',
		);
		
		foreach ($directories as $index => $directory) {
			
			if (is_dir($directory) && $directoryHandle = opendir($directory)) {
				
				$directoryFiles = array();
				
				while (false !== ($fileEntry = readdir($directoryHandle))) {
					if ($fileEntry != 'empty' && is_file($directory . DS . $fileEntry))
						$directoryFiles[] = $fileEntry;
				}
				closedir($directoryHandle);
				
				foreach ($directoryFiles as $index => $directoryFile) {
					if (!in_array($directoryFile, $fileNames)) {
						unlink($directory . DS . $directoryFile);
					}
				}
				
			}
			
		}
		
	}

}
