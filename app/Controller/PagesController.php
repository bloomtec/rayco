<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	public function beforeFilter() {
		//ssparent::beforeFilter();
		$this -> Auth -> allow('*');
	}

	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Pages';

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
	//public $uses = array();

	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this -> redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this -> set(compact('page', 'subpage', 'title_for_layout'));
		$this -> render(implode('/', $path));

	}
	
	
	public function view($id = null) {
		$this -> layout = "pages";
		$this -> Page -> id = $id;
		if (!$this -> Page -> exists()) {
			throw new NotFoundException(__('Página no válida'));
		}
		$this -> set('page', $this -> Page -> read(null, $id));
	}

	public function admin_beforePrev() {
		$this -> Session -> write('left_content', $_POST['left_content']);
		$this -> Session -> write('content', $_POST['content']);
		echo true;
		exit(0);
	}

	public function admin_preview() {
		$this -> layout = "pages";
		$page = array('Page' => array('left_content' => $this -> Session -> read('left_content'), 'content' => $this -> Session -> read('content')));
		$this -> set(compact('page'));
	}

	public function home() {

	}

	public function contacto() {
		if($this->request->is('post')) {
			$para  = 'ricardopandales@gmail.com, jc.rojas.sanchez@hotmail.com';
			$titulo = ':: Contacto RAYCO ::';
			$mensaje =
			'
			<table>
				<tr>
					<td>Nombre y Apellido</td><td>' . $this->request->data['Contacto']['nombre_y_apellido'] . '</td>
				</tr>
				<tr>
					<td>Empresa</td><td>' . $this->request->data['Contacto']['empresa'] . '</td>
				</tr>
				<tr>
					<td>Departamento</td><td>' . $this->request->data['Contacto']['departamento'] . '</td>
				</tr>
				<tr>
					<td>Ciudad</td><td>' . $this->request->data['Contacto']['ciudad'] . '</td>
				</tr>
				<tr>
					<td>Teléfono</td><td>' . $this->request->data['Contacto']['telefono'] . '</td>
				</tr>
				<tr>
					<td>Corre Electrónico</td><td>' . $this->request->data['Contacto']['email'] . '</td>
				</tr>
				<tr>
					<td>Preguntas o Comentarios</td><td>' . $this->request->data['Contacto']['mensaje'] . '</td>
				</tr>
			<table>
			';
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			if(mail($para, $titulo, $mensaje, $cabeceras)) {
				$this->Session->setFlash(__('Su mensaje ha sido enviado'), 'crud/success');
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error al tratar de enviar su mensaje'), 'crud/error');
			}
		}

		$this->loadModel('Text');
		$text = $this->Text->read(null, 1);
		$this->set('text', $text['Text']['text']);
	}
	

	public function empresa() {
		$this -> loadModel("Company");
		$this -> set("company", $this -> Company -> read(null,1));
	}
	public function locales()
	{
        $this -> loadModel("PointsOfSale");
        $this -> set("locales", $this -> PointsOfSale -> find('all'));
		
	}
	public function marcas()
	{
		
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Page -> recursive = 0;
		$this -> set('pages', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Page -> id = $id;
		if (!$this -> Page -> exists()) {
			throw new NotFoundException(__('Página no válida'));
		}
		$this -> set('page', $this -> Page -> read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Page -> create();
			if ($this -> Page -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la página'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se guardó la página. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Page -> id = $id;
		if (!$this -> Page -> exists()) {
			throw new NotFoundException(__('Página no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Page -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó la página'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se modificó la página. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Page -> read(null, $id);
		}
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Page -> id = $id;
		if (!$this -> Page -> exists()) {
			throw new NotFoundException(__('Página no válida'));
		}
		if ($this -> Page -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la página'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la página'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
