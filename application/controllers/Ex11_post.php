<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex11_post.php
HTTP POST 파라미터
------------------------------------------------*/

class Ex11_post extends CI_Controller
{
	public function __construct()
	{
		// 전체 기능 초기화
		parent::__construct();
		// url - helper
		$this->load->helper('url');
	}

	/**
	* post 파라미터를 전달하기 위한 페이지
	* http://localhost/ex11_post
	*/

	public function index()
	{
		$this->load->view('ex11_post/index');
	}

	/**
	* POST파라미터를 수신하여 결과를 표시하기 위한 함수
	* http://localhost/ex11_post/result
	*/

	public function result()
	{
		/*  config/config.php의 xss 필터링 설정
			$config['global_xss_filtering'] = TRUE;
			//XSS 필터를 사용안할 경우 두번째 파라미터를 FALSE로 설정.
			$config['global_xss_filtering'] = FALSE;			
		*/

		$username = $this->input->post('username');
		$email = $this->input->post('email', FALSE);

		// view에 전달할 데이터를 배열로 구성한다.
		$data = [
			'username' => $username,
			'email' => $email
		];

		// View 출력 설정
		$this->load->view('ex11_post/result.php', $data);
		
	}

}


