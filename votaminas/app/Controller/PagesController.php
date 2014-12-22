<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 *
 *
 * @var array
 */
	public $uses = array('Candidate', 'Vote', 'Pool');


	public function generate_results(){

		$this->getPresidents();
		$this->getGovernors();
		$this->getSenators();
		$this->getCongressmen();
		$this->getStateRepresentatives();
	}

	public function getPresidents(){
		$presidents = array();
		$candidates = $this->Candidate->find('all');
		$candidates = $this->putPercentage($candidates);

		foreach ($candidates as $candidate => $value){
			if(strcmp($value['Candidate']['type'], 'Presidente') == 0 && !empty($value['PoolsOption'])){
				$presidents[$candidate] = $value;
			}
		}

		usort($presidents, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});


		$this->set('presidents', array_slice($presidents, 0, 3));
	}

	public function getGovernors(){
		$governors = array();
		$candidates = $this->Candidate->find('all');
		$candidates = $this->putPercentage($candidates);
		foreach ($candidates as $candidate => $value){
			if(strcmp($value['Candidate']['type'], 'Governador') == 0 && !empty($value['PoolsOption'])){
				$governors[$candidate] = $value;
			}
		}

		usort($governors, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('governors', array_slice($governors, 0, 3));
	}

	public function getSenators(){
		$senators = array();
		$candidates = $this->Candidate->find('all');
		$candidates = $this->putPercentage($candidates);
		foreach ($candidates as $candidate => $value){
			if(strcmp($value['Candidate']['type'], 'Senador') == 0 && !empty($value['PoolsOption'])){
				$senators[$candidate] = $value;
			}
		}

		usort($senators, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('senators', array_slice($senators, 0, 3));
	}

	public function getCongressmen(){
		$congressmen = array();
		$candidates = $this->Candidate->find('all');
		$candidates = $this->putPercentage($candidates);
		foreach ($candidates as $candidate => $value){
			if(strcmp($value['Candidate']['type'], 'Deputado Federal') == 0 && !empty($value['PoolsOption'])){
				$congressmen[$candidate] = $value;
			}
		}

		usort($congressmen, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('congressmen', array_slice($congressmen, 0, 3));
	}

	public function getStateRepresentatives(){
		$stateRepresentatives = array();
		$candidates = $this->Candidate->find('all');
		$candidates = $this->putPercentage($candidates);
		foreach ($candidates as $candidate => $value){
			if(strcmp($value['Candidate']['type'], 'Deputado Estadual') == 0 && !empty($value['PoolsOption'])){
				$stateRepresentatives[$candidate] = $value;
			}
		}

		usort($stateRepresentatives, function($a, $b) {
    		return $b['PoolsOption'][0]['votes_qt'] - $a['PoolsOption'][0]['votes_qt'];
    		// $b - $a for descending order
		});

		$this->set('stateRepresentatives', array_slice($stateRepresentatives, 0, 3));
	}

	public function putPercentage($candidates){

		$putPercentage = array();
		foreach ($candidates as $candidate => $value){

			$votes = array();
			$pool_id = $this->Pool->find('first', array(
						'conditions' => array('Pool.name' => $value['Candidate']['type'])
			));

			if(!empty($pool_id)){
				$votes = $this->Vote->find('list', array(
							'conditions' => array('Vote.pool_id' => $pool_id['Pool']['id'])
				));
			}

			if(!empty($value['PoolsOption'])){

				if(count($votes) > 0){
					$value['PoolsOption'][0]['votes_qt'] = intval(($value['PoolsOption'][0]['votes_qt'] * 100) / count($votes));
				}
				$putPercentage[$candidate] = $value;
			}
		}

		return $putPercentage;
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {

		$this->generate_results();
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}


	public function notAuthorizedPage(){

	}
	

	public function beforeFilter()
	{
	   parent::beforeFilter();
	   $this->Auth->allow('display');
	}
}
