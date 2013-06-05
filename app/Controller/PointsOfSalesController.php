<?php
App::uses('AppController', 'Controller');
/**
 * PointsOfSales Controller
 *
 * @property PointsOfSale $PointsOfSale
 */
class PointsOfSalesController extends AppController {

	public function mapView() {
		$this->layout=false;
		$this->set('lat', $this->params->named['lat']);
		$this->set('lng', $this->params->named['lng']);
	}

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
			throw new NotFoundException(__('Punto de ventas no válido'));
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
			throw new NotFoundException(__('Punto de ventas no válido'));
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
				$this -> Session -> setFlash(__('Se guardó el punto de ventas'), 'crud/success');
				$this -> redirect(array('action' => 'edit', $this -> PointsOfSale -> id, true));
			} else {
				$this -> Session -> setFlash(__('No se pudo guardar el punto de ventas. Por favor, intente de nuevo.'), 'crud/error');
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
			throw new NotFoundException(__('Punto de ventas no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> PointsOfSale -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó el punto de ventas'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo modificar el punto de ventas. Por favor, intente de nuevo.'), 'crud/error');
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
			throw new NotFoundException(__('Punto de ventas no válido'));
		}
		if ($this -> PointsOfSale -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó el punto de ventas'), 'crud/success');
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('No se eliminó el punto de ventas'), 'crud/error');
		$this -> redirect(array('action' => 'index'));
	}

}
