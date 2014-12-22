<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {

			if($this->Auth->loggedIn() && $this->Auth->user()['role'] == 'admin'){
				$this->User->create();
				$this->request->data['User']['role'] = 'admin';
				// debug($this->request->data) or die();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Usuário com nível de administrador cadastrado com sucesso.'));
					return $this->redirect(array('action' => 'index'));
				}
			}
			else{
				$this->User->create();
				$this->request->data['User']['role'] = 'regular';
				// debug($this->request->data) or die();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Usuário cadastrado com sucesso.'));
					return $this->redirect(array('action' => 'login'));
				}
			}
		}

		// debug($this->Auth->loggedIn()) or die();

		$this->set('logged_in', $this->Auth->loggedIn());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	//Define quais actions do controller estao liberadas para uso
	//para usuarios nao logados no site
	//Depois de logado o filtro e substituido pela session
	public function beforeFilter(){

	   parent::beforeFilter();

	   if(!$this->Auth->loggedIn()){
	   	  $this->Auth->allow('login', 'add');
	   }
	}

	//Define quais actions do controller estao disponiveis para usuarios
	//com nivel de autenticacao regular
	public function isAuthorized($user){

		if (!parent::isAuthorized($user)) {

		        if ($this->action === 'logout') {
		            return true;
		        }

		        return $this->redirect(array('controller' => 'pages', 'action' => 'not_authorized_page'));
		}
		else{
			return true;
		}
	}

	//Action responsavel pelo login dos usuarios no site
	//Retorna um erro caso login ou senha estejam incorretos
	public function login(){

   		if($this->request->is('post')){

      		if($this->Auth->login()){
         		$this->redirect($this->Auth->redirect());
      		}
      		else{
         		$this->Session->setFlash('Nome de usuário ou senha incorretos!');
         	}
   		}
	}

	//Action responsavel pelo logout de usuarios do site
	public function logout(){

   		$this->redirect($this->Auth->logout());
	}
}