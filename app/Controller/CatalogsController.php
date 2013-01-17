<?php
App::uses('AppController', 'Controller');
/**
 * Catalogs Controller
 *
 * @property Catalog $Catalog
 */
class CatalogsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> Catalog -> recursive = 0;
		$this -> set('catalogs', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> layout = 'default';
		//$this -> Catalog -> contain('Category', 'Category.Subcategory', 'Category.Subcategory.Product');
		// INFO DEL CATALOGO
		$this -> Catalog -> id = $id;
		if (!$this -> Catalog -> exists()) {
			throw new NotFoundException(__('Catálogo no válido'));
		}
		$this -> Session -> write('catalog',$id); // PARA CONTROL EN LAS VISTAS
		$this -> set('catalog', $this -> Catalog -> read(null, $id));
		
		// PAGINADO DE PRODUCTOS
		$this -> loadModel('Product');
		$this -> Product -> contain();
		
		$categories = array();
		$subcategories = array();
		$products = array();
		
		if(isset($this -> passedArgs['subcategory'])) {
			//debug('subcategoria');
			$categories[$this -> passedArgs['category']] = $this -> passedArgs['category'];
			$subcategories[$this -> passedArgs['subcategory']] = $this -> passedArgs['subcategory'];
		} elseif(isset($this -> passedArgs['category'])) {
			//debug('categoria');
			$categories[$this -> passedArgs['category']] = $this -> passedArgs['category'];
			$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('fields' => array('Subcategory.id'), 'conditions' => array('Subcategory.category_id' => $categories)));
		} elseif(isset($this -> passedArgs['0'])) {
			//debug('catalogo');
			$categories = $this -> Catalog -> Category -> find('list', array('fields' => array('Category.id'), 'conditions' => array('Category.catalog_id' => $this -> passedArgs['0'])));
			$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('fields' => array('Subcategory.id'), 'conditions' => array('Subcategory.category_id' => $categories)));
		}
		
		$products = $this -> Product -> ProductsSubcategory -> find('list', array('fields' => array('ProductsSubcategory.product_id'), 'conditions' => array('ProductsSubcategory.subcategory_id' => $subcategories)));
		
		$this -> paginate = array(
			'Product' => array(
				'conditions' => array('Product.id' => $products)
			)
		);
		
		$this -> set('products', $this -> paginate('Product'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> Catalog -> recursive = 0;
		$this -> set('catalogs', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Catalog -> contain('Category');
		$this -> Catalog -> id = $id;
		if (!$this -> Catalog -> exists()) {
			throw new NotFoundException(__('Catálogo no válido'));
		}
		$this -> set('catalog', $this -> Catalog -> read(null, $id));
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Catalog -> id = $id;
		if (!$this -> Catalog -> exists()) {
			throw new NotFoundException(__('Catálogo no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Catalog -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó el catálogo'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se modificó el catálogo. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Catalog -> read(null, $id);
		}
	}

}
