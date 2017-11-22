<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex12_cookie.php
쿠키 사용
------------------------------------------------*/

// 코드 이그나이터에서는 세션이 SSO 방식으로 구현
// NAS로 저장할 때는 파일 방식
// SESSION에 저장 할 때는 DB방식

class Ex13_session extends CI_Controller
{
	public function __construct()
	{
		// 전체 기능 초기화
		parent::__construct();
		// url - helper
		$this->load->helper('url');
		/* config.php
		$config['sess_driver'] = 'files';            // 세션 타입 (database, filse)
		$config['sess_cookie_name'] = 'ci_session';  // 쿠키로 저장될 세션 정보의 키 이름
		$config['sess_expiration'] = 7200;           // 세션 유효시간(초)
		$config['sess_save_path'] = 'T:\vikingz\vikingz_project\ci\sessions'; // 세션이 저장될 절대경로(폴더생성은 자동)
		$config['sess_match_ip'] = FALSE;            // 이전 접속과 IP 비교 여부
		$config['sess_time_to_update'] = 300;        // 세션 갱신 주기(초)
		$config['sess_regenerate_destroy'] = FALSE;  // 이전 세션 데이터 자동 삭제 여부
		*/
		$this->load->library('Session');
	}	

	/**
	* post 파라미터를 전달하기 위한 페이지
	* http://localhost/ex13_session
	*/
	/*
	데이터베이스 생성
	mysql -uroot -p
	비번없음.
	CREATE database myci default charset utf8;

	use myci;

	CREATE TABLE `ci_sessions`(
		`id` varchar(40) NOT NULL,
		`ip_address` varchar(45) NOT NULL,
		`timestamp` int(10) unsigned NOT NULL DEFAULT '0',
		`data` blob NOT NULL,
		PRIMARY KEY(`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	SELECT * FROM ci_sessions;
	*/
	public function index()
	{
		// 저장되어 잇는 세션값 읽어오기
		$username = $this->session->userdata('username');

		// 세션값을  View에 전달하기
		$data = new stdClass();
		$data->username = $username;

		$this->load->view('ex13_session/index', $data);
	}

	/**
	* POST파라미터를 전달받은 후 입력값에
	* 쿠키를 생성, 삭제하고 다시 index로 돌아간다.
	* http://localhost/ex13_session/result
	* >> php index.php ex13_session
	*/
	// http://www.ciboard.co.kr/user_guide/kr/libraries/sessions.html

	public function result()
	{
		//  사용자의 입력값 받기
		$username = $this->input->post('username');

		if($username){
			/** 1) 입력값이 있다면 세션 저장하기 */
			// 파라미터 설정 값 --> $key, $value
			// $this->session->set_userdata("username",$username);  //키하고 밸류 형식

			// 세션 저장시 다음과 같이 배열로 구성후 한번에 저장도 가능함.
			// $ses_data = ['username' => $username];  // 연관배열
			// $this->session->set_userdata[$ses_data];

			//$ses_data = ['username',$username];
			$this->session->set_userdata("userdata");

			// 세션 저장시 배열구성되 확인이 가능함.
			//$ses_data = new stdClass();
			//$ses_data->username = $username;
			//$this->session->set_userdata($ses_data);
		} else {
			/** 2) 입력값이 없다면 세션 삭제하기 */
			// 키 이름에 따른 개별 삭제
			// $this->session->unset_userdata('username');

			//현재 사용자에 대한 전체 삭제
			$this->session->sess_destory();
		}

		// URI 
		redirect('/ex13_session');		
	}

}


