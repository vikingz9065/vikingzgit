<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex15_tempdata.php
지정된 시간동안 세션
------------------------------------------------*/


class Ex15_tempdata extends CI_Controller
{
	public function __construct()
	{
		// 전체 기능 초기화
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Session');
	}	

	/** post 파라미터를 전달하기 위한 페이지
	// http://localhost/ex15_tempdata
	* >> php index.php ex15_tempdata
	*/
	public function index()
	{
		// 저장되어 잇는 Flashdata값 읽어오기
		$temp_input = $this->session->tempdata('temp_input');

		// 혹은 세션과 동일하게 읽을 수 있음.
		// $temp_input = $this->session->userdata('temp_input');
	

		// 세션값을 View에 전달하기
		$data = new stdClass();
		$data->temp_input = $temp_input;

		$this->load->view('ex15_tempdata/index', $data);
	}

	/*
	*/
	public function result()
	{
		//  사용자의 입력값 받기
		$temp_input = $this->input->post('temp_input');

		if($temp_input){
			// 기존의 세션을 Flash 데이터로 변환하기
			//$this->session->set_userdata("temp_input",$temp_input);
			//$this->session->mark_as_temp('temp_input',10);

			//처음부터 Flash 데이터로 만들기
			$this->session->set_tempdata("temp_input", $temp_input, 10);
		}

		//URL헬퍼에 내장된 함수를 사용하여 페이지 이동
		// --> config.php 설정 파일에 base_url 값을 반드시 지정해야 함.

		redirect('/ex15_tempdata');
	}

}


