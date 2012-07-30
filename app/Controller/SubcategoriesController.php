<?php
App::uses('AppController', 'Controller');
/**
 * Subcategories Controller
 *
 * @property Subcategory $Subcategory
 */
class SubcategoriesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Subcategory -> recursive = 0;
		$this -> set('subcategories', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Subcategory -> id = $id;
		if (!$this -> Subcategory -> exists()) {
			throw new NotFoundException(__('Subcategoría no válida'));
		}
		$this -> set('subcategory', $this -> Subcategory -> read(null, $id));
	}	

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Subcategory -> contain('Category');
		$this -> set('subcategories', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Subcategory -> contain('Category', 'Product');
		$this -> Subcategory -> id = $id;
		if (!$this -> Subcategory -> exists()) {
			throw new NotFoundException(__('Subcategoría no válida'));
		}
		$this -> set('subcategory', $this -> Subcategory -> read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Subcategory -> create();
			if ($this -> Subcategory -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la subcategoría'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar la subcategoría. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$categories = $this -> Subcategory -> Category -> find('list');
		$products = $this -> Subcategory -> Product -> find('list');
		$this -> set(compact('categories', 'products'));
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Subcategory -> contain('Product');
		$this -> Subcategory -> id = $id;
		if (!$this -> Subcategory -> exists()) {
			throw new NotFoundException(__('Subcategoría no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Subcategory -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó la subcategoría'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo modificar la subcategoría. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Subcategory -> read(null, $id);
		}
		$categories = $this -> Subcategory -> Category -> find('list');
		$products = $this -> Subcategory -> Product -> find('list');
		$this -> set(compact('categories', 'products'));
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
		$this -> Subcategory -> id = $id;
		if (!$this -> Subcategory -> exists()) {
			throw new NotFoundException(__('Subcategoría no válida'));
		}
		if ($this -> Subcategory -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la subcategoría'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la subcategoría'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}