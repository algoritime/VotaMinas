<?php
App::uses('AppController', 'Controller');
/**
 * Candidates Controller
 *
 * @property Candidate $Candidate
 * @property PaginatorComponent $Paginator
 */
class CandidatesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('Candidate', 'Pool', 'PoolsOption', 'Vote');
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Candidate->recursive = 1;
		$this->set('candidates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Candidate->exists($id)) {
			throw new NotFoundException(__('Invalid candidate'));
		}
		$options = array('conditions' => array('Candidate.' . $this->Candidate->primaryKey => $id));
		$this->set('candidate', $this->Candidate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if($this->request->data['Candidate']){
				$image = $this->request->data['Candidate']['image_url'];
				$imageTypes = array("image/gif", "image/jpeg", "image/png");
				$uploadFolder = "upload";
				$uploadPath = WWW_ROOT . $uploadFolder;

				foreach ($imageTypes as $type) {
					if($type == $image['type']){
						if($image['error'] == 0){
							$imageName = $image['name'];

							if(file_exists($uploadPath . '/' . $imageName)){
								$imageName = date('His') . $imageName;
							}

							$full_image_path = $uploadPath . '/' . $imageName;

							if(move_uploaded_file($image['tmp_name'], $full_image_path)){
								$this->request->data['Candidate']['image_url'] = $uploadFolder . '/' . $imageName;
								// debug($this->request->data) or die();
								$this->Candidate->create();
								if ($this->Candidate->save($this->request->data)) {
									$this->Session->setFlash(__('The candidate has been saved.'));
									return $this->redirect(array('action' => 'index'));
								}
								else{
									$this->Session->setFlash(__('The candidate could not be saved. Please, try again.'));
								}
							}
							else{
								$this->Session->setFlash('There was a problem uploading file. Please try again.');
							}
						}
						else{
							$this->Session->setFlash('Error uploading file.');
						}
					}
					else{
						$this->Session->setFlash('Unacceptable file type');
					}
				}
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

		if (!$this->Candidate->exists($id)) {
			throw new NotFoundException(__('Invalid candidate'));
		}

		if ($this->request->is(array('post', 'put'))) {

			if($this->request->data['Candidate']){

				if($this->request->data['Candidate']['image_url']['size'] == 0){
					$this->request->data['Candidate']['image_url'] = $this->request->data['Candidate']['image_url_saved'];
					unset($this->request->data['Candidate']['image_url_saved']);

					if ($this->Candidate->save($this->request->data)) {
						$this->Session->setFlash(__('The user has been saved.'));
						return $this->redirect(array('action' => 'index'));
					}
					else {
						$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
					}
				}
				else{
					unset($this->request->data['Candidate']['image_url_saved']);

					// debug($this->request->data['Candidate']) or die();
					$image = $this->request->data['Candidate']['image_url'];
					$imageTypes = array("image/gif", "image/jpeg", "image/png");
					$uploadFolder = "upload";
					$uploadPath = WWW_ROOT . $uploadFolder;

					foreach ($imageTypes as $type) {
						if($type == $image['type']){
							if($image['error'] == 0){
								$imageName = $image['name'];

								if(file_exists($uploadPath . '\\' . $imageName)){
									$imageName = date('His') . $imageName;
								}

								$full_image_path = $uploadPath . '\\' . $imageName;

								if(move_uploaded_file($image['tmp_name'], $full_image_path)){
									$this->request->data['Candidate']['image_url'] = $uploadFolder . '\\' . $imageName;
									// debug($this->request->data) or die();
									$this->Candidate->create();
									if ($this->Candidate->save($this->request->data)) {
										$this->Session->setFlash(__('The candidate has been saved.'));
										return $this->redirect(array('action' => 'index'));
									}
									else{
										$this->Session->setFlash(__('The candidate could not be saved. Please, try again.'));
									}
								}
								else{
									$this->Session->setFlash('There was a problem uploading file. Please try again.');
								}
							}
							else{
								$this->Session->setFlash('Error uploading file.');
							}
						}
						else{
							$this->Session->setFlash('Unacceptable file type');
						}
					}
				}
			}
		}
		else {
			$options = array('conditions' => array('Candidate.' . $this->Candidate->primaryKey => $id));
			$this->request->data = $this->Candidate->find('first', $options);
			$this->set('image_url_saved', $this->request->data['Candidate']['image_url']);
			 // debug($this->request->data['Candidate']['image_url']) or die();
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
		$this->Candidate->id = $id;
		if (!$this->Candidate->exists()) {
			throw new NotFoundException(__('Candidato inválido!'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Candidate->delete()) {
			$this->Session->setFlash(__('O candidato foi deletado.'));
		} else {
			$this->Session->setFlash(__('O candidato não pode ser deletado. Tente novamente!'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	public function getByType(){
		$enquete_type = $this->data['PoolsOption']['pool_id'];

		$typesNoPool = array();

		if(!empty($enquete_type)){
			$candidateType = null;
			$pools = $this->Pool->find('all');
			foreach ($pools as $pool) {
				if($pool['Pool']['id'] == $enquete_type){
					$candidateType = $pool['Pool']['name'];
					break;
				}
			}

			$types = $this->Candidate->find('all', array(
				'conditions' => array('Candidate.type' => $candidateType),
				'recursive' => 1
				));

			foreach ($types as $type) {

				if(empty($type['PoolsOption'])){
					$typesNoPool[$type['Candidate']['id']] = $type['Candidate']['name'];
				}
			}
		}
		else{
			$typesNoPool[''] = "Selecione uma enquete";
		}

		if(empty($typesNoPool)){
			$typesNoPool[''] = "Sem candidatos";
		}

		$this->set('types', $typesNoPool);
		$this->layout = 'ajax';
	}



	public function presidents() {
		$presidents = $this->Candidate->find('all', array(
				'conditions' => array('Candidate.type' => "Presidente"),
				'recursive' => 1
				));

		$presidents = $this->hasPoolOption($presidents);
		$presidents = $this->putPercentage($presidents);

		usort($presidents, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		// debug($presidents) or die();
		$this->set('presidents', $presidents);
	}

	public function governors() {
		$governors = $this->Candidate->find('all', array(
				'conditions' => array('Candidate.type' => "Governador"),
				'recursive' => 1
				));

		$governors = $this->hasPoolOption($governors);
		$governors = $this->putPercentage($governors);

		usort($governors, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('governors', $governors);
	}

	public function senators() {
		$senators = $this->Candidate->find('all', array(
				'conditions' => array('Candidate.type' => "Senador"),
				'recursive' => 1
				));

		$senators = $this->hasPoolOption($senators);
		$senators = $this->putPercentage($senators);

		usort($senators, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('senators', $senators);
	}

	public function depsest() {
		$depsest = $this->Candidate->find('all', array(
				'conditions' => array('Candidate.type' => "Deputado Estadual"),
				'recursive' => 1
				));

		$depsest = $this->hasPoolOption($depsest);
		$depsest = $this->putPercentage($depsest);

		usort($depsest, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('depsest', $depsest);
	}

	public function depsfed() {
		$depsfed = $this->Candidate->find('all', array(
				'conditions' => array('Candidate.type' => "Deputado Federal"),
				'recursive' => 1
				));

		$depsfed = $this->hasPoolOption($depsfed);
		$depsfed = $this->putPercentage($depsfed);

		usort($depsfed, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('depsfed', $depsfed);
	}

	public function hasPoolOption($candidates){

		$hasPoolOption = array();
		foreach ($candidates as $candidate => $value){
			if(!empty($value['PoolsOption'])){
				$hasPoolOption[$candidate] = $value;
			}
		}

		return $hasPoolOption;
	}

	public function putPercentage($candidates){

		$putPercentage = array();
		foreach ($candidates as $candidate => $value){
			$pool_id = $this->Pool->find('first', array(
						'conditions' => array('Pool.name' => $value['Candidate']['type'])
			));

			$votes = $this->Vote->find('list', array(
						'conditions' => array('Vote.pool_id' => $pool_id['Pool']['id'])
			));

			if(!empty($value['PoolsOption'])){

				if(count($votes) > 0) {
					$value['PoolsOption'][0]['votes_qt'] = intval(($value['PoolsOption'][0]['votes_qt'] * 100) / count($votes));
				}
				$putPercentage[$candidate] = $value;
			}
		}

		return $putPercentage;
	}

	public function beforeFilter(){

	   parent::beforeFilter();
	   $this->Auth->allow('presidents', 'governors', 'senators', 'depsest', 'depsfed');
	}

	//Define quais actions do controller estao disponiveis para usuarios
	//com nivel de autenticacao regular
	public function isAuthorized($user){

		if (!parent::isAuthorized($user)) {

		        return $this->redirect(array('controller' => 'pages', 'action' => 'not_authorized_page'));
		}
		else{
			if($this->action == 'hasPoolOption' || $this->action == 'putPercentage'){
   				return false;
   			}
   			else{
   				return true;
   			}
		}
	}
}
