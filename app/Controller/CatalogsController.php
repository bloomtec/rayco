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
	public function view($id = 0) {
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
		$products_title = '';
		
		if(isset($this -> passedArgs['subcategory'])) {
			//debug('subcategoria');
			$categories[$this -> passedArgs['category']] = $this -> passedArgs['category'];
			$subcategories[$this -> passedArgs['subcategory']] = $this -> passedArgs['subcategory'];
			$subcategory = $this -> Catalog -> Category -> Subcategory -> read(null, $this -> passedArgs['subcategory']);
			$products_title = $subcategory['Subcategory']['nombre'];
		} elseif(isset($this -> passedArgs['category'])) {
			//debug('categoria');
			$categories[$this -> passedArgs['category']] = $this -> passedArgs['category'];
			$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('fields' => array('Subcategory.id'), 'conditions' => array('Subcategory.category_id' => $categories)));
			$category = $this -> Catalog -> Category -> read(null, $this -> passedArgs['category']);
			$products_title = $category['Category']['nombre'];
		} elseif(isset($this -> passedArgs['0'])) {
			//debug('catalogo');
			$categories = $this -> Catalog -> Category -> find('list', array('fields' => array('Category.id'), 'conditions' => array('Category.catalog_id' => $this -> passedArgs['0'])));
			$subcategories = $this -> Catalog -> Category -> Subcategory -> find('list', array('fields' => array('Subcategory.id'), 'conditions' => array('Subcategory.category_id' => $categories)));
			$catalog = $this -> Catalog -> read(null, $this -> passedArgs['0']);
			$products_title = $catalog['Catalog']['nombre'];
		}
		
		$products = $this -> Product -> ProductsSubcategory -> find('list', array('fields' => array('ProductsSubcategory.product_id'), 'conditions' => array('ProductsSubcategory.subcategory_id' => $subcategories)));
		$busqueda = false;
		
		if($this -> request -> is('post')) {
			$busqueda = true;
			$search_conditions = array();
			if(isset($this -> request -> data['Catalog']['brand']) && !empty($this -> request -> data['Catalog']['brand'])) {
				$search_conditions['Product.brand_id'] = $this -> request -> data['Catalog']['brand'];
			} 
			$search_conditions['Product.referencia LIKE'] = '%' . $this -> request -> data['Catalog']['referencia'] . '%';
			$matched_products = $this -> Product -> find('list', array('fields' => array('Product.id'), 'conditions' => $search_conditions));
			$products = array_intersect($products, $matched_products);
		}
		
		$this -> paginate = array(
			'Product' => array(
				'conditions' => array('Product.id' => $products),
				'limit' => 12
			)
		);
		
		$this -> set('busqueda', $busqueda);
		$brands = $this -> Product -> find('list', array('fields' => array('Product.brand_id'), 'conditions' => array('Product.id' => $products)));
		$this -> set('brands', $this -> Product -> Brand -> find('list', array('conditions' => array('Brand.id' => $brands))));
		$this -> set('products', $this -> paginate('Product'));
		$this -> set('products_title', $products_title);
		$this -> Session -> write('previous_section', $products_title);
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
