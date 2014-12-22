<?php
App::uses('AppController', 'Controller');
/**
 * PoolsOptions Controller
 *
 * @property PoolsOption $PoolsOption
 * @property PaginatorComponent $Paginator
 */
class PoolsOptionsController extends AppController {
	public $helpers = array('Js');
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
		$this->PoolsOption->recursive = 0;
		$this->set('poolsOptions', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PoolsOption->create();
			if ($this->PoolsOption->save($this->request->data)) {
				$this->Session->setFlash(__('The pools option has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pools option could not be saved. Please, try again.'));
			}
		}
		$pools = $this->PoolsOption->Pool->find('list');
		// $candidates = $this->PoolsOption->Candidate->find('list');

		$this->set(compact('pools'));
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PoolsOption->id = $id;
		if (!$this->PoolsOption->exists()) {
			throw new NotFoundException(__('Invalid pools option'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PoolsOption->delete()) {
			$this->Session->setFlash(__('The pools option has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pools option could not be deleted. Please, try again.'));
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
