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
			throw new NotFoundException(__('Producto no válido'));
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
			throw new NotFoundException(__('Producto no válido'));
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
				$this -> Session -> setFlash(__('Se guardó el producto'), 'crud/success');
				$this -> redirect(array('action' => 'edit', $this -> Product -> id, true));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el producto. Por favor, intente de nuevo.'), 'crud/error');
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
			throw new NotFoundException(__('Producto no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Product -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó el producto'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo modificar el producto. Por favor, intente de nuevo.'), 'crud/error');
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
			throw new NotFoundException(__('Producto no válido'));
		}
		if ($this -> Product -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el producto'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el producto'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
