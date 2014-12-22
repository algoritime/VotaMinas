<?php

class VotationHelper extends AppHelper{

 public $helpers = array('Html');

	public function makeCustomRadios($candidates){

		$customRadioButtons = '';//'<div class="contentList">';
		$customRadioButtons .= '<input type="hidden" name="data[Vote][candidate_id]" id="VoteCandidateName_" value="">';

		foreach ($candidates as $key => $value) {
			$customRadioButtons .= '<div class="contentList">';
			$customRadioButtons .= '<input type="radio" name="data[Vote][candidate_id]"
						id="VoteCandidateName'. $value['Candidate']['id'] . '"required value="'. $value['Candidate']['id'] .'">';
			// $customRadioButtons .= '<img src="' . $value['Candidate']['image_url'] . '"/>';
			$customRadioButtons .= '<label for="VoteCandidateName'. $key . '">' .
								   		'<img src="' . $this->Html->url('/', true) . $value['Candidate']['image_url'] . '"/>' .
										 '<p class="radioName">Candidato: ' . $value['Candidate']['name'] . '</p>' .
										 '<p class="radioEntourage">Partido: ' . $value['Candidate']['entourage'] . '</p>' .
										 '<p class="radioNumber">Número: ' . $value['Candidate']['number'] . '</p>' .
								   '</label>';
			$customRadioButtons .= '</div>';
		}

		// $customRadioButtons .= '</div>';

		return $customRadioButtons;
	}
}
