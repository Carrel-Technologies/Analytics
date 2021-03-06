<?php
/** @noinspection ALL */
defined('BASEPATH') OR exit('No direct script access allowed');


class AppAnalytics extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AppModel');

	}

	public function index()
	{


		$data = array(

		"book_Minutes_Read" => $this->AppModel->book_Minutes_Read(),
		"video_Minutes_Watched" =>$this->AppModel->video_Minutes_Watched(),
		"app_Usage_Minutes" => $this->AppModel->app_Usage_Minutes(),
		"total_Watchers" =>$this->AppModel->total_Watchers(),
		"total_Readers" => $this->AppModel->total_Readers(),
		"signins"=>$this->AppModel->signIns(),
		"students" =>$this->AppModel->students(),
		"internet_type" => $this->AppModel->internetType(),
		'title' => "App analytics",
		'view' => "app_analytics/app.php"
		);
		$this->load->view('index.php', $data);

	}
	function  videos(){
		$data = array(
		'videos' =>$this->AppModel->Videos_Watched(),
		'title' => "More information on Videos",
		'view' => "app_analytics/videos.php"
		);
		$this->load->view('index.php', $data);
	}
	function ebooks(){
		$data = array(
			'books' =>$this->AppModel->Books_Read(),

			'title' => "More Information on Ebooks",
			'view' => "app_analytics/ebooks.php"
		);
		$this->load->view('index.php', $data);
	}


}
