<?php
App::uses('AppController', 'Controller');
/**
 * Pools Controller
 *
 * @property Pool $Pool
 * @property PaginatorComponent $Paginator
 */
class PoolsController extends AppController {
   //var $uses = array('PoolsOption');
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
		$this->Pool->recursive = 1;

		// debug($this->Paginator->paginate()) or die();
		$this->set('pools', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pool->create();
			if ($this->Pool->save($this->request->data)) {
				$this->Session->setFlash(__('The pool has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pool could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pool->exists($id)) {
			throw new NotFoundException(__('Invalid pool'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pool->save($this->request->data)) {
				$this->Session->setFlash(__('The pool has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pool could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pool.' . $this->Pool->primaryKey => $id));
			$this->request->data = $this->Pool->find('first', $options);
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
		$this->Pool->id = $id;
		if (!$this->Pool->exists()) {
			throw new NotFoundException(__('Invalid pool'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pool->delete()) {
			$this->Session->setFlash(__('The pool has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pool could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	//Define quais actions do controller estao disponiveis para usuarios
	//com nivel de autenticacao regular
	public function isAuthorized($user){

		if (!parent::isAuthorized($user)) {

		        return $this->redirect(array('controller' => 'pages', 'action' => 'not_authorized_page'));
		}
		else{
			return true;
		}
	}
}
