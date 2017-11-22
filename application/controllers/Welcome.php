<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
// 클래스가 폴더 함수가 페이지
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()  // 이 함수가 시작페이지
	{
		// 화면에 출력하고자 하는 데이터
		$data = [
			'name' => '코드이그나이터',
			'message' => 'Hello World'
		];
		$this->load->view('welcome_message', $data);
	}

	public function hello()  // 이 함수가 시작페이지
	{
		// 화면에 출력하고자 하는 데이터
		$data = [
			'name' => '코드이그나이터',
			'message' => 'Hello World'
		];
		$this->load->view('hello', $data);
	}
}

// 소스코드의 이름과 클래스의 이름은 일치해야 한다.
/*
컨트롤러 : GET, POST 등의 파라미터 받는다(요청)
브라우저에 보낼 결과값을 생성.

화면 구성을 위한 별도의 php에게 토스.
view
*/