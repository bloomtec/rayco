<?php
App::uses('AppController', 'Controller');
/**
 * PointsOfSales Controller
 *
 * @property PointsOfSale $PointsOfSale
 */
class PointsOfSalesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this -> PointsOfSale -> recursive = 0;
		$this -> set('pointsOfSales', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this -> PointsOfSale -> id = $id;
		if (!$this -> PointsOfSale -> exists()) {
			throw new NotFoundException(__('Invalid points of sale'));
		}
		$this -> set('pointsOfSale', $this -> PointsOfSale -> read(null, $id));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> PointsOfSale -> recursive = 0;
		$this -> set('pointsOfSales', $this -> paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> PointsOfSale -> contain('Image');
		$this -> PointsOfSale -> id = $id;
		if (!$this -> PointsOfSale -> exists()) {
			throw new NotFoundException(__('Invalid points of sale'));
		}
		$this -> set('pointsOfSale', $this -> PointsOfSale -> read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> PointsOfSale -> create();
			if ($this -> PointsOfSale -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The points of sale has been saved'));
				$this -> redirect(array('action' => 'edit', $this -> PointsOfSale -> id, true));
			} else {
				$this -> Session -> setFlash(__('The points of sale could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null, $wizard = false) {
		$this -> PointsOfSale -> contain('Image');
		$this -> PointsOfSale -> id = $id;
		if (!$this -> PointsOfSale -> exists()) {
			throw new NotFoundException(__('Invalid points of sale'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> PointsOfSale -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('The points of sale has been saved'));
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('The points of sale could not be saved. Please, try again.'));
			}
		} else {
			$this -> request -> data = $this -> PointsOfSale -> read(null, $id);
		}
		$this -> set(compact('wizard'));
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
		$this -> PointsOfSale -> id = $id;
		if (!$this -> PointsOfSale -> exists()) {
			throw new NotFoundException(__('Invalid points of sale'));
		}
		if ($this -> PointsOfSale -> delete()) {
			$this -> Session -> setFlash(__('Points of sale deleted'));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Points of sale was not deleted'));
		$this -> redirect(array('action' => 'index'));
	}

}
