<?php
/**
 * Static content controller.
 *
 */

App::uses('EzAppController', 'Ez.Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class OptionsController extends EzAppController {

	/**
	 * Default helper
	 *
	 * @var array
	 */
	public $helpers = array('Html', 'Session');

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	 public $uses = array();
	 
	 public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('construccion','home');
	}
	
	/**
	 * Display Browser for management of images in wysiwyg
	 *
	 * @param 
	 * @return void
	 */
	public function admin_fileBrowser(){
		$this -> layout = "Ez.file_browser";
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		$folder = new Folder(WWW_ROOT . DS . "wysiwyg");
		$this -> set("folder", $folder -> read());
		$this -> set("folderPath", "/wysiwyg");
	}
	public function home() {

	}

	public function construccion() {
		$this -> layout = 'ajax';
	}
	
}
