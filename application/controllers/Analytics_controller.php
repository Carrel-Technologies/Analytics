<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics_controller extends CI_Controller
{

	/**
	 *This is the Analytics portal for Dawati 2.0
	 *created by Kelvin
	 * 11/09/2019
	 * KAende sana
	 */
	function __construct()
	{
		parent::__construct();
		$this->data ['title'] = "Dawati E-Learning";
		$this->data ['description'] = "";

		$this->load->model('Analytics_model');
		$this->load->library('upload');
	}
	public function index()
	{
		$studentCount= $this->Analytics_model->getStudentsCount();
		$maleStudents= $this->Analytics_model->getMaleStudents();
		$femaleStudents= $this->Analytics_model->getFemaleStudents();
		$signupsToday= $this->Analytics_model->getDailySignups();
		$formOnes= $this->Analytics_model->getFormOne();
		$formTwos= $this->Analytics_model->getFormTwo();
		$formThrees= $this->Analytics_model->getFormThree();
		$formFours= $this->Analytics_model->getFormFour();
		$activeSubscriptions = $this->Analytics_model->getActiveSubscriptions();
		$inactiveSubscriptions= $this->Analytics_model->getInactiveSubscriptions();
		$annualSubscriptions= $this->Analytics_model->getAnnualSubscriptions();
		$termlySusbscriptions = $this->Analytics_model->getTermlySubscriptions();
		$monthlySusbscriptions= $this->Analytics_model->getMonthlySubscriptions();
		$nonSusbcribers= $this->Analytics_model->getNonSubscribers();
		$data=array(
			'studentCount'=>$studentCount,
			'maleCount'=> $maleStudents,
			'femaleCount'=>$femaleStudents,
			'signupsToday'=>$signupsToday,
			'formOnes'=>$formOnes,
			'formTwos'=>$formTwos,
			'formThrees'=>$formThrees,
			'formFours'=>$formFours,
			'activeSubs'=>$activeSubscriptions,
			'inactiveSubs'=>$inactiveSubscriptions,
			'annualSubs'=>$annualSubscriptions,
			'termlySubs'=>$termlySusbscriptions,
			'monthlySubs'=>$monthlySusbscriptions,
			'nonSubs'=>$nonSusbcribers
		);
		//var_dump($formFours);
		$this->load->view('index.php', $data);
	}
}
