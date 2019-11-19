<?php

require APPPATH . '/libraries/REST_Controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');


class Web_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data [ 'title' ] = "Dawati Analytics | Web App Analysis";
		$this->data [ 'description' ] = "";

		$this->load->model('Web_model');

	}
	/**
	 *
	 */

	public function webAnalytics(){

			$signUps= $this->Web_model->getSignUps();
			$logins = $this->Web_model->getLoginsToday();
			$videoViews = $this->Web_model->getVideoViewsToday();
			$bookReads = $this->Web_model->getBookReadsToday();
			$attemptedPayments = $this->Web_model->getAttemptedPaymentsToday();
			$freeBookViews =$this->Web_model->freeBooks();
			$freeVideos = $this->Web_model->freeVideos();

		$dat = date('Y-m-d');
		$date = new DateTime($dat);
		$users = array();
		$signups = array();
		$period = $date->modify("-6 days");
		for ($i = 0; $i < 7; $i++) {
			$users[$i] = $this->Web_model->users_By_Day($period->format('m-d'));
			$signups[$i] = $this->Web_model->signups_By_Day($period->format('m-d'));
			$period = $date->modify("+1 day");
			//var_dump($users);
		}
			$data=array(

				'signUps'=>$signUps,
				'logins'=>$logins,
				'views' =>$videoViews,
				'reads' =>$bookReads,
				'weeklyUsers' =>$users,
				'weeklySignups'=> $signups,
				'attempts' => $attemptedPayments,
				'freeContentViews' => $freeVideos+$freeBookViews,
				'title' => "Web Analysis",
				'view' => "web_analytics/web.php"
			);

			$this->load->view('index.php', $data);

	}
	public function videoViewers(){

		$viewers = $this->Web_model->getVideoViewers();
		//var_dump($viewers);
		$data=array(

			'users' => $viewers,
			'title' => " Video Viewers",
			'view' => "web_analytics/videoViewers.php"
		);

		$this->load->view('index.php', $data);

	}
	public function bookReaders(){

		$readers = $this->Web_model->getbookReaders();

		$data=array(

			'users' => $readers,
			'title' => " Book Readers",
			'view' => "web_analytics/bookReaders.php"
		);

		$this->load->view('index.php', $data);

	}
	public function payments(){

		$users = $this->Web_model->getPayments();
//		var_dump(count($users));
		$data=array(

			'users' => $users,
			'title' => " Attempted and Complete Payments",
			'view' => "web_analytics/payments.php"
		);

		$this->load->view('index.php', $data);

	}

	//Cyrus
	public function logins(){
		$logins = $this->Web_model->moreInfoLogins();
		$data=array(

			'logins' => $logins,
			'title' => " Web Logins",
			'view' => "web_analytics/logins.php"
		);

		$this->load->view('index.php', $data);
	}
}
