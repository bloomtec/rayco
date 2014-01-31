<?php
App::uses('AppController', 'Controller');
/**
 * Texts Controller
 *
 * @property Text $Text
 */
class TextsController extends AppController {
	
	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Text -> id = $id;
		if (!$this -> Text -> exists()) {
			throw new NotFoundException(__('Texto no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Text -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó el texto'), 'crud/success');				
			} else {
				$this -> Session -> setFlash(__('No se modificó el texto. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
		$this -> request -> data = $this -> Text -> read(null, $id);
	}

	public function getText($id = null) {
		$this -> Text -> id = $id;
		if (!$this -> Text -> exists()) {
			throw new NotFoundException(__('Texto no válido'));
		}
		return $this->Text->read(null, $id);
	}
	
}
