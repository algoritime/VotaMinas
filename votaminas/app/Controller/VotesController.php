<?php
App::uses('AppController', 'Controller');
/**
 * Votes Controller
 *
 * @property Vote $Vote
 * @property PaginatorComponent $Paginator
 */
class VotesController extends AppController {

 public $uses = array('Vote','Candidate','PoolsOption');
 public $helpers = array('Votation');
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
		 $this->Vote->recursive = 2;

		// debug($this->Paginator->paginate()) or die();
		$this->set('votes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vote->exists($id)) {
			throw new NotFoundException(__('Invalid vote'));
		}
		$options = array('conditions' => array('Vote.' . $this->Vote->primaryKey => $id));
		$this->set('vote', $this->Vote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($data, $action) {

			$candidate_id = $data['Vote']['candidate_id'];
			unset($data['Vote']['candidate_id']);

			$pool_option = $this->PoolsOption->find('first', array(
			    				'conditions' => array('PoolsOption.candidate_id' => $candidate_id),
								'recursive' => -1
								)
			);

			$pool_option['PoolsOption']['votes_qt'] += 1;


			if (!$this->PoolsOption->exists($pool_option['PoolsOption']['id'])) {
				throw new NotFoundException(__('Opção Inválida na Enquete!'));
			}

			if ($this->PoolsOption->save($pool_option)) {

				$this->Vote->create();
				if ($this->Vote->save($data)) {
					$this->Session->setFlash(__('Voto computado com sucesso!'));
					return $this->redirect(array('action' => $action));
				}
			}
			else {
				 $this->Session->setFlash(__('O voto não pode ser computado! Tente novamente!'));
			}
	}



	public function votationPresident(){

		if ($this->request->is('post', 'put')) {

			$this->add($this->request->data, 'votationPresident');
		}
		else{

			$this->getDataVotation("Presidente");
		}

	}

		public function votationGovernor(){

		if ($this->request->is('post', 'put')) {

			$this->add($this->request->data, 'votationGovernor');
		}
		else{

			$this->getDataVotation("Governador");
		}

	}

		public function votationSenator(){

		if ($this->request->is('post', 'put')) {

			$this->add($this->request->data, 'votationSenator');
		}
		else{

			$this->getDataVotation("Senador");
		}

	}

		public function votationCongressman(){

		if ($this->request->is('post', 'put')) {

			$this->add($this->request->data, 'votationCongressman');
		}
		else{

			$this->getDataVotation("Deputado Federal");
		}

	}

			public function votationRepresentative(){

		if ($this->request->is('post', 'put')) {

			$this->add($this->request->data, 'votationRepresentative');
		}
		else{

			$this->getDataVotation("Deputado Estadual");
		}

	}

	public function getDataVotation($type){

		$candidates = $this->Candidate->find('all', array(
			    				'conditions' => array('Candidate.type' => $type),
								'recursive' => 1
								)
		);

		$pool = $this->Vote->Pool->find('first', array(
			    				'conditions' => array('Pool.name' => $type),
								'recursive' => -1
								)
		);

		$user = $this->Auth->user();
		$user_id = $user['id'];


		$pool_id = -99;
		$has_candidates = -99;
		if(!empty($pool)){
			$pool_id = $pool['Pool']['id'];

			// debug($pool_id) or die();

			$pool = $this->PoolsOption->find('first', array(
			    				'conditions' => array('PoolsOption.pool_id' => $pool_id),
								'recursive' => -1
								)
			);

			// debug($pool) or die();

			if(!empty($pool)){
				$has_candidates = 1;
			}
		// debug($has_candidates) or die();
		}



		$vote = $this->Vote->find('first', array(
							'conditions' => array('Vote.user_id' => $user_id, 'Vote.pool_id' => $pool_id),
							'recursive' => -1
							)
		);

		$already_voted = true;

		if(empty($vote)){
			$already_voted = false;
		}

		$this->set(compact('user_id', 'pool_id', 'already_voted','candidates', 'user', 'has_candidates'));
	}


	public function isAuthorized($user){

		if(!parent::isAuthorized($user)){
			if($this->action == 'votationPresident' || $this->action == 'votationGovernor' || $this->action == 'votationSenator'
			|| $this->action == 'votationRepresentative' || $this->action == 'votationCongressman' ){
				return true;
			}
   		}
   		else
   		{
   			if($this->action == 'add'){
   				return false;
   			}
   			else{
   				return true;
   			}
   		}
	}
}
