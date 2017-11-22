<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/helpers/util_helper.php
사용자가 정의한 함수들을 모아 놓은 파일
헬퍼 파일은 원하는 만큼 생성 가능하다.
파일이름 뒤에는 항상 '_helper' 가 붙어 있어야 한다.
------------------------------------------------*/

if(!function_exists('debug')) // function_exists 함수가 있는지 없는지 검사한다.
{								// function debug(&$value) '&'참조 파라미터
	function debug($value){
		$content = print_r($value,true);

		// 현재 컬트롤러 객체의 참조
		$CI = &get_instance();
		$CI->output->append_output($content);
	}
}