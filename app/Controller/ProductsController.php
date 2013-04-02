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
			$this->Product->recursive = 0;
			$this->set('products', $this->paginate());
		}

		/**
		 * view method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function view($id = null) {
			$this->Product->id = $id;
			if(!$this->Product->exists()) {
				throw new NotFoundException(__('Producto no válido'));
			}
			$this->set('product', $this->Product->read(null, $id));
			$this->set('catalog', $this->Session->read('catalog'));
			$this->set('referer', $this->referer());
			$this->set('previous_section', $this->Session->read('previous_section'));
		}

		/**
		 * admin_index method
		 *
		 * @return void
		 */
		public function admin_index() {
			$this->Product->contain('Brand');
			$this->set('products', $this->paginate());
		}

		/**
		 * admin_view method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_view($id = null) {
			$this->Product->contain('Brand', 'Image', 'Subcategory', 'Subcategory.nombre <> "empty"');
			$this->Product->id = $id;
			if(!$this->Product->exists()) {
				throw new NotFoundException(__('Producto no válido'));
			}
			$this->set('product', $this->Product->read(null, $id));
		}

		/**
		 * admin_add method
		 *
		 * @return void
		 */
		public function admin_add() {
			if($this->request->is('post')) {
				$this->Product->create();
				if($this->Product->save($this->request->data)) {
					$this->Session->setFlash(__('Se guardó el producto'), 'crud/success');
					$this->redirect(array('action' => 'edit', $this->Product->id, true));
				} else {
					$this->Session->setFlash(__('No se pudo guardar el producto. Por favor, intente de nuevo.'), 'crud/error');
				}
			}
			$brands = $this->Product->Brand->find('list');
			$this->Product->Subcategory->Category->contain('Subcategory.id', 'Subcategory.nombre');
			$categories = $this->Product->Subcategory->Category->find(
				'all',
				array(
					'fields' => array(
						'Category.id',
						'Category.nombre'
					)
				)
			);
			$this->set(compact('brands', 'categories'));
		}

		/**
		 * admin_edit method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_edit($id = null, $wizard = false) {
			$this->Product->contain('Subcategory', 'Image');
			$this->Product->id = $id;
			if(!$this->Product->exists()) {
				throw new NotFoundException(__('Producto no válido'));
			}
			if($this->request->is('post') || $this->request->is('put')) {
				if($this->Product->save($this->request->data)) {
					$this->Session->setFlash(__('Se modificó el producto'), 'crud/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('No se pudo modificar el producto. Por favor, intente de nuevo.'), 'crud/error');
				}
			} else {
				$this->request->data = $this->Product->read(null, $id);
				$subcategories       = array();
				$categories          = array();
				foreach($this->request->data['Subcategory'] as $key => $subcategory) {
					if(!in_array($subcategory['id'], $subcategories)) $subcategories[] = $subcategory['id'];
					if(!in_array($subcategory['category_id'], $categories)) $categories[] = $subcategory['category_id'];
				}
				$this->request->data['Category']    = array('Category' => $categories);
				$this->request->data['Subcategory'] = array('Subcategory' => $subcategories);
			}
			$brands = $this->Product->Brand->find('list');
			$this->Product->Subcategory->Category->contain('Subcategory.id', 'Subcategory.nombre');
			$categories = $this->Product->Subcategory->Category->find(
				'all',
				array(
					'fields' => array(
						'Category.id',
						'Category.nombre'
					)
				)
			);
			$this->set(compact('brands', 'categories', 'wizard'));
		}

		/**
		 * admin_delete method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_delete($id = null) {
			if(!$this->request->is('post')) {
				throw new MethodNotAllowedException();
			}
			$this->Product->id = $id;
			if(!$this->Product->exists()) {
				throw new NotFoundException(__('Producto no válido'));
			}
			if($this->Product->delete()) {
				$this->Session->setFlash(__('Se eliminó el producto'), 'crud/success');
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('No se eliminó el producto'), 'crud/error');
			$this->redirect(array('action' => 'index'));
		}

	}
