<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
----------------------------------
 /appication/config/site.php
 커스텀 환경 설정 파일
 ---------------------------------
*/

// case1 : 1차배열인 경우
$config['company'] = '아이티페이퍼';
$config['tel'] = '070-1234-2345';
$config['address'] = '서울시 서초구 서초동';


// case2 : 2차 배열인 경우
$config['info'] = [
	'name' => 'itpaper',
	'tel' => '070) 7890-7890',
	'address' => 'seoul, korea'
];

