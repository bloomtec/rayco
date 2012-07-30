<?php
App::uses('AppController', 'Controller');
/**
 * Brands Controller
 *
 * @property Brand $Brand
 */
class BrandsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Brand -> recursive = 0;
		$this -> set('brands', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Brand -> id = $id;
		if (!$this -> Brand -> exists()) {
			throw new NotFoundException(__('Marca no válida'));
		}
		$this -> set('brand', $this -> Brand -> read(null, $id));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Brand -> recursive = 0;
		$this -> set('brands', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Brand -> contain('Product');
		$this -> Brand -> id = $id;
		if (!$this -> Brand -> exists()) {
			throw new NotFoundException(__('Marca no válida'));
		}
		$this -> set('brand', $this -> Brand -> read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Brand -> create();
			if ($this -> Brand -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la marca'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se guardó la marca. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Brand -> id = $id;
		if (!$this -> Brand -> exists()) {
			throw new NotFoundException(__('Marca no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Brand -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó la marca'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se modificó la marca. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Brand -> read(null, $id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Brand -> id = $id;
		if (!$this -> Brand -> exists()) {
			throw new NotFoundException(__('Marca no válida'));
		}
		if ($this -> Brand -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la marca'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la marca'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
