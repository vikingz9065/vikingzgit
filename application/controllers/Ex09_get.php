<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex09_get.php
HTTP GET 파라미터
------------------------------------------------*/

class Ex09_get extends CI_Controller
{
	public function __construct()
	{
		// 전체 기능 초기화
		parent::__construct();

		$this->load->helper('url');
	}

	/**
	* get 파라미터를 전달하기 위한 페이지
	* http://localhost/ex09_get
	*/
	// config.php에서 설정한 base_url값을 리턴.
	// 설정값 맨 뒤에 "/"는 강제로 붙는다.

	public function index()
	{
		$this->load->view('ex09_get/index');
	}

	/**
	* get 파라미터를 수신하여 결과 표시하기
	* http://localhost/ex09_get/result?answer=숫자
	*/
	// config.php에서 설정한 base_url값을 리턴.
	// 설정값 맨 뒤에 "/"는 강제로 붙는다.

	public function result()
	{
		$answer = $this->input->get('answer');
		// input 별도의 라이브러리 페탄과 상관없이 초기화된다.

		// 표시할 결과 메시지
		$msg = '';
		if($answer==300){
			$msg='정답입니다.';
		} else {
			$msg='틀렸습니다.';
		}

		// view 출력 설정
		$this->load->view('ex09_get/result', ['msg' => $msg]);
	}

}


