<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {
	
	public $components = array('Attachment');
	
	function uploadify_add() {
		
		if ($_POST['name'] && $_POST['folder'] && $_POST['multiple']) {

			$fileName = $_POST['name'];
			$folder = $_POST['folder'];
			$multiple = $_POST['multiple'];
			$model_class = null;
			$foreign_key = null;
			
			if($multiple == 'true') {
				$model_class = $_POST['model_class'];
				$foreign_key = $_POST['foreign_key'];
			}
			
			if(!$this -> Attachment -> resize_image('resize', $folder . '/' . $fileName, $folder . '/50x50', $fileName, 50,	50)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/100x100", $fileName, 100, 100)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/150x150", $fileName, 150, 150)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/215x215", $fileName, 215, 215)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/360x360", $fileName, 360, 360)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			if(!$this -> Attachment -> resize_image("resize", $folder . "/" . $fileName, $folder . "/750x750", $fileName, 750, 750)) {
				echo json_encode(array('success' => false));
				exit(0);
			}
			
			if($multiple == 'true') {
				$this -> Image -> create();
			
				$image = array(
					'Image' => array(
						'model_class' => $model_class,
						'foreign_key' => $foreign_key,
						'image' => $fileName
					)
				);
				
				if($this -> Image -> save($image)) {
					echo json_encode(array(
						'success' => true,
						'image_id' => $this -> Image -> id,
						'model_class' => $model_class,
						'foreign_key' => $foreign_key
					));
				} else {
					echo json_encode(array('success' => false));
				}
			} else {
				echo json_encode(array('success' => true));
			}
				
		}

		exit(0);

	}
	
	/**
	 * Obtener las imagenes de un producto
	 * 
	 * @param string $model_class Nombre de la clase relacionada a la imagen
	 * @param int $foreign_key ID del ítem relacionado perteneciente a $model_class
	 * @param bool $json Indica si se debe dar respuesta con un objeto JSON
	 * @return Información de las imagenes relacionadas en el formato indicado; por defecto NO esta en JSON
	 */
	public function getImages($model_class, $foreign_key, $json = false) {
		$images = $this -> Image -> find('all', array('conditions' => array('Image.model_class' => $model_class, 'Image.foreign_key' => $foreign_key)));
		if(!$json) {
			$this -> autoRender = false;
			Configure::write('debug', 0);
			echo json_encode($images);
			exit(0);
		} else {
			return $images;
		}
	}
	
	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> Image -> id = $id;
		if (!$this -> Image -> exists()) {
			throw new NotFoundException(__('Imagen no válida'));
		}
		$this -> set('image', $this -> Image -> read(null, $id));
	}
	
	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> Image -> id = $id;
		if (!$this -> Image -> exists()) {
			throw new NotFoundException(__('Imagen no válida'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> Image -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó la imagen'), 'crud/success');
				$this -> redirect(
					array(
						'controller' => Inflector::tableize($this -> request -> data['Image']['model_class']),
						'action' => 'edit',
						$this -> request -> data['Image']['foreign_key']
					)
				);
			} else {
				$this -> Session -> setFlash(__('No se modificó la imagen. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> Image -> read(null, $id);
		}
	}
	
	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id, $model_class, $foreign_key) {
		if (!$this -> request -> is('post')) {
			throw new MethodNotAllowedException();
		}
		$this -> Image -> id = $id;
		if (!$this -> Image -> exists()) {
			throw new NotFoundException(__('Imagen no válida'));
		}
		if ($this -> Image -> delete()) {
			$this -> Session -> setFlash(__('Se eliminó la imagen'), 'crud/success');
			$this -> redirect(
				array(
					'controller' => Inflector::tableize($model_class),
					'action' => 'edit',
					$foreign_key
				)
			);
		}
		$this -> Session -> setFlash(__('No se eliminó la imagen'), 'crud/error');
		//$this -> redirect(array('action' => 'index'));
		$this -> redirect(
			array(
				'controller' => Inflector::tableize($model_class),
				'action' => 'edit',
				$foreign_key
			)
		);
	}
	
}
