<?php
App::uses('UserControlAppController', 'UserControl.Controller');
/**
 * Users Controller
 *
 */
class UsersController extends UserControlAppController {
	
	/**
	 * Llaves de ReCaptcha
	 */
	private $public_key = "6LfC5dESAAAAANQHI4pvu2S_wniSgHivoXFYuT5a";
	private $private_key = "6LfC5dESAAAAAL-J0uwgmJMSxrBSwSd0uXXZ3Wqt";
	
	/**
	 * Declarar aquí lo que debe suceder siempre que se acceda a usuarios
	 * 
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		
		/**
		$this -> User -> bindModel(
			array(
				'belongsTo' => array(
					'Role' => array(
						'className' => 'UserControl.Role',
						'foreignKey' => 'role_id',
						'conditions' => '',
						'fields' => '',
						'order' => ''
					)
				)
			)
		);
		 */
		
		// Métodos que deben quedar públicos
		$this -> Auth -> allow('admin_login', 'register', 'registerEmail', 'resetPassword', 'createUser');
		
	}

	/**
	 * profile method
	 *
	 * @return void
	 */
	public function profile() {	
		$this -> layout='profile';
		if (!$this -> Auth -> user('id')) {
			$this -> redirect(
				array(
					'action' => 'login',
					'controller' => 'users',
					'plugin' => 'user_control'
				)
			);
		} else {
			$this -> set('user', $this -> User -> read(null, $this -> Auth -> user('id')));
		}
	}

	/**
	 * edit method
	 *
	 * @return void
	 */
	public function edit() {
		$this -> layout='profile';
		if (!$this -> Auth -> user('id')) {
			$this -> redirect(
				array(
					'action' => 'login',
					'controller' => 'users',
					'plugin' => 'user_control'
				)
			);
		} else {
			if ($this -> request -> is('post') || $this -> request -> is('put')) {
				if ($this -> User -> save($this -> request -> data)) {
					$this -> Session -> setFlash(__('Se modificó el usuario'), 'crud/success');
					$this -> redirect(array('action' => 'profile'));
				} else {
					$this -> Session -> setFlash(__('No se pudo modificar el usuario. Por favor, intente de nuevo,'), 'crud/error');
				}
			}
			$this -> request -> data = $this -> User -> read(null, $this -> Auth -> user('id'));
			$documentTypes = $this -> User -> DocumentType -> find('list');
			$this -> set(compact('documentTypes'));
		}
	}
	
	/**
	 * editPassword method
	 *
	 * @return void
	 */
	public function editPassword() {
		$this -> layout='profile';
		if (!$this -> Auth -> user('id')) {
			$this -> redirect(
				array(
					'action' => 'login',
					'controller' => 'users',
					'plugin' => 'user_control'
				)
			);
		} else {
			if ($this -> request -> is('post') || $this -> request -> is('put')) {
				if ($this -> User -> save($this -> request -> data)) {
					$this -> Session -> setFlash(__('Se ha modificado la contraseña'), 'crud/success');
					$this -> redirect(
						array(
							'action' => 'profile',
							'controller' => 'users',
							'plugin' => 'user_control'
						)
					);
				} else {
					$this -> Session -> setFlash(__('No se pudo modificar la contraseña. Por favor, intente de nuevo.'), 'crud/error');
				}
			}
		}
	}
	
	public function orders() {
		$this -> layout='profile';
		if (!$this -> Auth -> user('id')) {
			$this -> redirect(
				array(
					'action' => 'login',
					'controller' => 'users',
					'plugin' => 'user_control'
				)
			);
		} 
		$orders = $this -> User -> Order -> find('all',array(
				'conditions'=>array(
					'Order.user_id'=>$this -> Auth -> user('id')
				),
				'contain'=>array('OrderState','UserAddress','OrderItem'=>array('Product','ProductSize'))
			)
		);
		$this -> set('orders',$orders);
	}
	
	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this -> User -> recursive = 0;
		$this -> set('users', $this -> paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this -> User -> id = $id;
		$this -> User -> recursive = 1;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		$user = $this -> User -> read(null, $id);
		$this -> set('user', $user);
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this -> User -> id = $id;
		if (!$this -> User -> exists()) {
			throw new NotFoundException(__('Usuario no válido'));
		}
		if ($this -> request -> is('post') || $this -> request -> is('put')) {
			if ($this -> User -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se modificó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo modificar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		} else {
			$this -> request -> data = $this -> User -> read(null, $id);
		}
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this -> request -> is('post')) {
			$this -> User -> create();
			if ($this -> User -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Se agregó el usuario'), 'crud/success');
				$this -> redirect(array('action' => 'index'));
			} else {
				$this -> Session -> setFlash(__('No se pudo agregar el usuario. Por favor, intente de nuevo.'), 'crud/error');
			}
		}
	}
	
	/**
	 * Inicio de sesión
	 *
	 * @return void
	 */
	public function admin_login() {
		if($this -> Auth -> user('id') && $this -> Auth -> user('role_id') == 1) {
			$this -> redirect(array('plugin' => 'user_control', 'action' => 'index'));
		}
		$this -> layout="Ez.login";
		/**
		 * Llevar un registro de cuantos inicios de sesión se tienen
		 */
		$login_attempts = $this -> Cookie -> read('User.login_attempts');
		if(!$login_attempts) {
			$login_attempts = 1;
			$this -> Cookie -> write('User.login_attempts', $login_attempts);
			$login_attempts = $this -> Cookie -> read('User.login_attempts');
		}
		
		// Variable que contiene el error del captcha
		$error = null;
		
		if(!$login_attempts || $login_attempts > 3) {
			/**
			 * Sección ReCaptcha
			 */
			 
			// ReCaptcha Lib
			$lib_path = APP . 'Plugin/UserControl/Lib/ReCaptcha/recaptchalib.php';
			require_once ($lib_path);
			
			/**
			 * Fin sección ReCaptcha
			 */
			
			if ($this -> request -> is('post')) {
				// was there a reCAPTCHA response?
				if (isset($_POST['recaptcha_challenge_field']) && isset($_POST['recaptcha_response_field'])) {
					$resp = recaptcha_check_answer(
						$this -> private_key, $_SERVER["REMOTE_ADDR"],
						$_POST['recaptcha_challenge_field'],
						$_POST['recaptcha_response_field']
					);
					
					// Verificar la respuesta de ReCaptcha
					if ($resp -> is_valid) {
						if($this -> request -> is('post')) {
							if ($this -> Auth -> login()) {
								$this -> Cookie -> delete('User.login_attempts');
								return $this -> redirect(array(
									'controller' => 'users',
									'action' => 'index',
									'plugin' => 'user_control',
									'admin' => true
								));
								$this -> Session -> setFlash(__('Has iniciado sesión.'));
							} else {
								$login_attempts += 1;
								$this -> Cookie -> write('User.login_attempts', $login_attempts);
								$this -> Session -> setFlash(__('Usuario o contraseña incorrectos.'));
							}
						}
					} else {
						// Asignar el error para llevar a la vista
						$this -> Session -> setFlash(__('Debes ingresar los datos correctos al captcha'));
						$error = $resp -> error;
					}
				}
			}
		} else {
			if($this -> request -> is('post')) {
				if ($this -> Auth -> login()) {
					$this -> Cookie -> delete('User.login_attempts');
					return $this -> redirect(array(
						'controller' => 'users',
						'action' => 'index',
						'plugin' => 'user_control',
						'admin' => true
					));
					$this -> Session -> setFlash(__('Has iniciado sesión.'), 'crud/success');
				} else {
					$login_attempts += 1;
					$this -> Cookie -> write('User.login_attempts', $login_attempts);
					$this -> Session -> setFlash(__('Usuario o contraseña incorrectos.'), 'crud/error');
				}
			}
		}
		
		$this -> set('login_attempts', $login_attempts);
		$this -> set('error', $error);
		$this -> set('public_key', $this -> public_key);
	}
	
	/**
	 * Inicio de sesión
	 *
	 * @return void
	 */
	public function login() {
		/**
		 * Llevar un registro de cuantos inicios de sesión se tienen
		 */
		$login_attempts = $this -> Cookie -> read('User.login_attempts');
		if(!$login_attempts) {
			$login_attempts = 1;
			$this -> Cookie -> write('User.login_attempts', $login_attempts);
			$login_attempts = $this -> Cookie -> read('User.login_attempts');
		}
		
		// Variable que contiene el error del captcha
		$error = null;
		
		if(!$login_attempts || $login_attempts > 3) {
			/**
			 * Sección ReCaptcha
			 */
			 
			// ReCaptcha Lib
			$lib_path = APP . 'Plugin/UserControl/Lib/ReCaptcha/recaptchalib.php';
			require_once ($lib_path);
			
			/**
			 * Fin sección ReCaptcha
			 */
			
			if ($this -> request -> is('post')) {
				// was there a reCAPTCHA response?
				if (isset($_POST['recaptcha_challenge_field']) && isset($_POST['recaptcha_response_field'])) {
					$resp = recaptcha_check_answer(
						$this -> private_key, $_SERVER["REMOTE_ADDR"],
						$_POST['recaptcha_challenge_field'],
						$_POST['recaptcha_response_field']
					);
					
					// Verificar la respuesta de ReCaptcha
					if ($resp -> is_valid) {
						if($this -> request -> is('post')) {
							if ($this -> Auth -> login()) {
								$this -> Cookie -> delete('User.login_attempts');
								return $this -> redirect($this -> Auth -> redirect());
								$this -> Session -> setFlash(__('Has iniciado sesión.'));
							} else {
								$login_attempts += 1;
								$this -> Cookie -> write('User.login_attempts', $login_attempts);
								$this -> Session -> setFlash(__('Usuario o contraseña incorrectos.'));
							}
						}
					} else {
						// Asignar el error para llevar a la vista
						$this -> Session -> setFlash(__('Debes ingresar los datos correctos al captcha'));
						$error = $resp -> error;
					}
				}
			}
		} else {
			if($this -> request -> is('post')) {
				if ($this -> Auth -> login()) {
					$this -> Cookie -> delete('User.login_attempts');
					return $this -> redirect($this -> Auth -> redirect());
					$this -> Session -> setFlash(__('Has iniciado sesión.'), 'crud/success');
				} else {
					$login_attempts += 1;
					$this -> Cookie -> write('User.login_attempts', $login_attempts);
					$this -> Session -> setFlash(__('Usuario o contraseña incorrectos.'), 'crud/error');
				}
			}
		}
		
		$this -> set('login_attempts', $login_attempts);
		$this -> set('error', $error);
		$this -> set('public_key', $this -> public_key);
	}

	/**
	 * Cerrar la sesión de usuario activa
	 *
	 * @return void
	 */
	public function logout() {
		$this -> redirect($this -> Auth -> logout());
	}
	
	/**
	 * Cerrar la sesión administrativa de usuario activa
	 *
	 * @return void
	 */
	public function admin_logout() {
		$this -> Auth -> logout();
		$this -> redirect('/admin');
	}
	
	public function registerEmail() {
		if($this -> request -> is('post') || $this -> request -> is('put')) {
			$this -> loadModel('UserMailConfig');
			$this -> loadModel('MailingList');
			$user_mail_config = $this -> UserMailConfig -> read(null, 1);
			$mailing_list = $this -> MailingList -> findByScenario('Registro De Correo');
			
			// Verificar si se está usando un servicio
			if($user_mail_config['UserMailConfig']['is_active']) {
				// Verificar el servicio que se esta usando
				switch($user_mail_config['UserMailConfig']['mail_service_id']) {
					// MailChimp
					case 1:
						if($this -> mailChimpRegisterEmail(
							$this -> request -> data['User']['email'],
							$user_mail_config['UserMailConfig']['api_key'],
							$mailing_list['MailingList']['list_unique_code']
						)) {
							$this -> Session -> setFlash('Por favor revisa tu correo para confirmar el registro', 'crud/success');
						} else {
							$this -> Session -> setFlash('Ha ocurrido un error al registrar el correo. Por favor intente de nuevo.', 'crud/error');
						}
						break;
					// No hay servicios configurados
					default:
						// TODO : que hacer aqui?
						return false;
						break;
				}
			}
			$this -> redirect($this -> referer());
		}
	}
	
	/**
	 * Resetear contraseña de usuario
	 * 
	 * @return void
	 */
	public function resetPassword() {
		
		if($this -> request -> is('post') || $this -> request -> is('put')) {
			
			if(isset($this -> request -> data['User']['email']) && !empty($this -> request -> data['User']['email'])) {
				$this -> User -> recursive = -1;
				$test_user = $this -> User -> findByEmail($this -> request -> data['User']['email']);
							
				if($test_user) {
					$password = $this -> generatePassword();
					$user = $this -> User -> read(null, $test_user['User']['id']);
					$user['User']['password'] = $password;
					$user['User']['verify_password'] = $password;
					if($this -> User -> save($user)) {
						$email_address = Configure::read('email');
						$email_password = Configure::read('email_password');
						$site_name = Configure::read('site_name');
						$gmail = array(
							'host' => 'ssl://smtp.gmail.com',
							'port' => 465,
							'username' => $email_address,
							'password' => $email_password,
							'transport' => 'Smtp'
						);
						App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail($gmail);
						$email -> from(array($email_address => $site_name));
						$email -> to($user['User']['email']);
						$email -> subject('Renovación De Contraseña :: ' . $site_name);
						$email -> send('Su nueva contraseña es :: ' . $password);
					}
				}
				
				$this -> Session -> setFlash('Si el correo ingresado está registrado proximamente le llegará un correo con su nueva contraseña');
			} else {
				$this -> Session -> setFlash('Debe ingresar un correo electrónico para utilizar esta función');
			}
			
		}
			
	}
	
	/**
	 * Generar una contraseña de manera automática
	 * 
	 * @return Una contraseña aleatoria
	 */
	private function generatePassword() {
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$cad = "";
		for ($i = 0; $i < 8; $i++) {
			$cad .= substr($str, rand(0, 62), 1);
		}
		return $cad;
	}

}
