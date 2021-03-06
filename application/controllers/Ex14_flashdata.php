<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex14_flashdata.php
한 페이지에서만 유효한 일회성 세션
------------------------------------------------*/

// 코드 이그나이터에서는 세션이 SSO 방식으로 구현
// NAS로 저장할 때는 파일 방식
// SESSION에 저장 할 때는 DB방식

class Ex14_flashdata extends CI_Controller
{
	public function __construct()
	{
		// 전체 기능 초기화
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Session');
	}	

	/** post 파라미터를 전달하기 위한 페이지
	// http://localhost/ex14_flashdata
	*/
	public function index()
	{
		// 저장되어 잇는 Flashdata값 읽어오기
		$temp_input = $this->session->flashdata('temp_input');

		// 혹은 세션과 동일하게 읽을 수 있음.
		// $temp_input = $this->session->userdata('temp_input');

		/** 다음의 기능은 Flash 데이터의 파괴를 1회 유보한다. */
		//A(세션저장) --> B(읽기, 자동삭제)
		//A(세션저장) --> B(읽기, Keep) --> C(자동삭제)
		// 다음 페이지에서 삭제됨.
		//$this->session->keep_flashdata('temp_input');
		//$this->session->keep_flashdata(array('temp_input','item2','item3');

		// Flashdata값을 View에 전달하기
		$data = new stdClass();
		$data->temp_input = $temp_input;

		$this->load->view('ex14_flashdata/index', $data);
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
			//$this->session->mark_as_flash('temp_input');

			//처음부터 Flash 데이터로 만들기
			$this->session->set_flashdata("temp_input",$temp_input);
		}

		//URL헬퍼에 내장된 함수를 사용하여 페이지 이동
		// --> config.php 설정 파일에 base_url 값을 반드시 지정해야 함.

		redirect('/ex14_flashdata');
	}

}


