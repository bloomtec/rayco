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
		$this -> layout = 'Ez.default';
		//$this -> Catalog -> contain('Category', 'Category.Subcategory', 'Category.Subcategory.Product');
		// INFO DEL CATALOGO
		$this -> Catalog -> id = $id;
		if (!$this -> Catalog -> exists()) {
			throw new NotFoundException(__('Catálogo no válido'));
		}
		$this -> set('catalog', $this -> Catalog -> read(null, $id));
		
		// PAGINADO DE PRODUCTOS
		$conditions = array();
		$this -> loadModel('Product');
		$this -> Product -> contain();
		if($this -> request -> is('post') || $this -> request -> is('put')) {
			// Se envía categoría
			if(!empty($this -> request -> data['Filtro']['categories']) && empty($this -> request -> data['Filtro']['subcategories'])) {
				// Paginado
				$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('conditions' => array('Subcategory.category_id' => $this -> request -> data['Filtro']['categories']), 'fields' => array('Subcategory.id')));
				$products = $this -> Catalog -> Category -> Subcategory -> ProductsSubcategory -> find('list', array('conditions' => array('ProductsSubcategory.subcategory_id' => $subcategories), 'fields' => array('ProductsSubcategory.product_id')));
				$conditions['Product.id'] = $products;
				
				// Filtros
				$categories = $this -> Catalog -> Category -> find('list', array('conditions' => array('Category.id' => $this -> request -> data['Filtro']['categories'])));
				$this -> set('categories', $categories);
				$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('conditions' => array('Subcategory.category_id' => $this -> request -> data['Filtro']['categories'])));
				$this -> set('subcategories', $subcategories);
			}
			// Se envía subcategoría :: NO SE DA POR EL MOMENTO
			elseif(empty($this -> request -> data['Filtro']['categories']) && !empty($this -> request -> data['Filtro']['subcategories'])) {
				
			}
			// Se envía categoría y subcategoría
			elseif(!empty($this -> request -> data['Filtro']['categories']) && !empty($this -> request -> data['Filtro']['subcategories'])) {
				// Paginado
				$products = $this -> Catalog -> Category -> Subcategory -> ProductsSubcategory -> find('list', array('conditions' => array('ProductsSubcategory.subcategory_id' => $this -> request -> data['Filtro']['subcategories']), 'fields' => array('ProductsSubcategory.product_id')));
				$conditions['Product.id'] = $products;
				
				// Filtros
				$categories = $this -> Catalog -> Category -> find('list', array('conditions' => array('Category.id' => $this -> request -> data['Filtro']['categories'])));
				$this -> set('categories', $categories);
				$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('conditions' => array('Subcategory.category_id' => $this -> request -> data['Filtro']['categories'])));
				$this -> set('subcategories', $subcategories);
			}
			// Se envía vacío
			else {
				$categories = $this -> Catalog -> Category -> find('list', array('conditions' => array('Category.catalog_id' => $id)));
				$this -> set('categories', $categories);
				/*$categories = $this -> Catalog -> Category -> find('list', array('conditions' => array('Category.catalog_id' => $id), 'fields' => array('Category.id')));
				$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('conditions' => array('Subcategory.category_id' => $categories)));
				$this -> set('subcategories', $subcategories);*/
			}
		} else {
			$categories = $this -> Catalog -> Category -> find('list', array('conditions' => array('Category.catalog_id' => $id)));
			$this -> set('categories', $categories);
			/*$categories = $this -> Catalog -> Category -> find('list', array('conditions' => array('Category.catalog_id' => $id), 'fields' => array('Category.id')));
			$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('conditions' => array('Subcategory.category_id' => $categories)));
			$this -> set('subcategories', $subcategories);*/
		}
		$this -> paginate = array(
			'Product' => array(
				'conditions' => $conditions
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
