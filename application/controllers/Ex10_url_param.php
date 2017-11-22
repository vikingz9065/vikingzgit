<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex10_url_param.php
URL 파라미터
------------------------------------------------*/

class Ex10_url_param extends CI_Controller
{
	public function __construct()
	{
		// 전체 기능 초기화
		parent::__construct();
		// url - helper
		$this->load->helper('url');
	}

	/**
	* url 파라미터를 전달하기 위한 페이지
	* http://localhost/ex10_url_param
	*/

	public function index()
	{
		$this->load->view('ex10_url_param/index');
	}

	/**
	* GET 파라미터를 수신하여 결과 표시하기
	* http://localhost/ex10_url_param
	*/

	public function result($msg1='헬로',$msg2='월드')
	{
		// URL파라미터값 받기
		$data = new stdClass();
		$data->msg1 = $msg1;
		$data->msg2 = $msg2;

		// View 출력 설정
		$this->load->view('ex10_url_param/result', $data);
	}

}


