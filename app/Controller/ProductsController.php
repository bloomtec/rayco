<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Product -> recursive = 0;
		$this -> set('products', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Product -> id = $id;
		if (!$this -> Product -> exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this -> set('product', $this -> Product -> read(null, $id));
	}
	
	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Product -> contain('Brand');
		$this -> set('products', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Product -> contain('Brand', 'Image', 'Subcategory');
		$this -> Product -> id = $id;
		if (!$this -> Product -> exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this -> set('product', $this -> Product -> read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Product -> create();
			if ($this -> Product -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The product has been saved'));
				$this -> redirect(array('action' => 'edit', $this -> Product -> id, true));
			} else {
				$this -> Session -> setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$brands = $this -> Product -> Brand -> find('list');
		$subcategories = $this -> Product -> Subcategory -> find('list');
		$this -> set(compact('brands', 'subcategories'));
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null, $wizard = false) {
		$this -> Product -> contain('Subcategory', 'Image');
		$this -> Product -> id = $id;
		if (!$this -> Product -> exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Product -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The product has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> Product -> read(null, $id);
		}
		$brands = $this -> Product -> Brand -> find('list');
		$subcategories = $this -> Product -> Subcategory -> find('list');
		$this -> set(compact('brands', 'subcategories', 'wizard'));
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
		$this -> Product -> id = $id;
		if (!$this -> Product -> exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this -> Product -> delete()) {
			$this -> Session -> setFlash(__('Product deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Product was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
