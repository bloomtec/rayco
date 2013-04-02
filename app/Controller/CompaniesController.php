<?php
	App::uses('AppController', 'Controller');
	/**
	 * Companies Controller
	 *
	 * @property Company $Company
	 */
	class CompaniesController extends AppController {

		/**
		 * view method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function view($id = 1) {
			$this->Company->id = $id;
			if(!$this->Company->exists()) {
				throw new NotFoundException(__('Invalid company'));
			}
			$this->set('company', $this->Company->read(null, $id));
		}

		/**
		 * admin_index method
		 *
		 * @return void
		 */
		public function admin_index() {
			$this->Company->recursive = 0;
			$this->set('companies', $this->paginate());
		}

		/**
		 * admin_view method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_view($id = null) {
			$this->Company->id = $id;
			if(!$this->Company->exists()) {
				throw new NotFoundException(__('Invalid company'));
			}
			$this->set('company', $this->Company->read(null, $id));
		}

		/**
		 * admin_add method
		 *
		 * @return void
		 */
		/*public function admin_add() {
			if($this->request->is('post')) {
				$this->Company->create();
				if($this->Company->save($this->request->data)) {
					$this->Session->setFlash(__('The company has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
				}
			}
		}*/

		/**
		 * admin_edit method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_edit($id = null) {
			$this->Company->id = $id;
			if(!$this->Company->exists()) {
				throw new NotFoundException(__('Invalid company'));
			}
			if($this->request->is('post') || $this->request->is('put')) {
				if($this->Company->save($this->request->data)) {
					$this->Session->setFlash(__('The company has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
				}
			} else {
				$this->request->data = $this->Company->read(null, $id);
			}
		}

		/**
		 * admin_delete method
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		/*public function admin_delete($id = null) {
			if(!$this->request->is('post')) {
				throw new MethodNotAllowedException();
			}
			$this->Company->id = $id;
			if(!$this->Company->exists()) {
				throw new NotFoundException(__('Invalid company'));
			}
			if($this->Company->delete()) {
				$this->Session->setFlash(__('Company deleted'));
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Company was not deleted'));
			$this->redirect(array('action' => 'index'));
		}*/
	}
