<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex06_encryption.php
/암호화 처리 라이브러리
------------------------------------------------*/
/* /appication/config/config.php 파일에 암호화 대한 열쇠글을 등록해야 한다. */
class Ex06_encryption extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// 라이브러리 로드
		$this->load->library('encryption');
		$this->load->helper('util');
	}
	
	/**
	* 암호화 복호화 예제
	* http://localhost/ex06_encryption
	* >> php index.php ex06_encryption
	*/

	public function index()
	{
		$source = "Hello Codeigniter";

		// 암호화. -> 같은 내용이라도 매번 다른 값으로 변환된다.
		$enc = $this->encryption->encrypt($source);
		//같은 문자열을 여러번 암호화 해도 매번 다른 값이 생성된다.
		debug($enc, "암호화 결과");

		// 복호화
		$dec = $this->encryption->decrypt($enc);
		debug($dec, "복호화 결과");
	}
}