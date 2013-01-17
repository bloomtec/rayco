<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Category -> recursive = 0;
		$this -> set('categories', $this -> paginate());
	}

	public function get($catalog = null){
		if($catalog){
			return $this -> Category -> find('list',array('conditions'=>array('catalog_id'=>$catalog))); 
		}else{
			return $this -> Category -> find('list'); 
		}
		
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> Category -> id = $id;
		if (!$this -> Category -> exists()) {
			throw new NotFoundException(__('Categoría no válida'));
		}
		$this -> set('category', $this -> Category -> read(null, $id));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Category -> contain('Catalog');
		$this -> set('categories', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Category -> contain('Catalog', 'Subcategory');
		$this -> Category -> id = $id;
		if (!$this -> Category -> exists()) {
			throw new NotFoundException(__('Categoría no válida'));
		}
		$this -> set('category', $this -> Category -> read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> Category -> create();
			if ($this -> Category -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se guardó la categoría'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se guardó la categoría. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$catalogs = $this -> Category -> Catalog -> find('list');
		$this -> set(compact('catalogs'));
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Category -> id = $id;
		if (!$this -> Category -> exists()) {
			throw new NotFoundException(__('Categoría no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Category -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó la categoría'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se modificó la categoría. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Category -> read(null, $id);
		}
		$catalogs = $this -> Category -> Catalog -> find('list');
		$this -> set(compact('catalogs'));
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
		$this -> Category -> id = $id;
		if (!$this -> Category -> exists()) {
			throw new NotFoundException(__('Categoría no válida'));
		}
		if ($this -> Category -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la categoría'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó la categoría'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
