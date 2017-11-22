<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*------------------------------------------------
/controllers/Ex17_thumbnail.php
파일 업로드 처리
------------------------------------------------*/


class Ex17_thumbnail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->config->load('upload');       // 업로드 설정정보 (폴더경로 얻기 위함)
		$this->config->load('thumbnail');    // 썸네일 설정정보
		$this->load->helper('util');         // 유틸헬퍼(debug()함수 사용 위함)
		$this->load->helper('url');          // URL헬퍼(base_url() 함수 사용 위함)
		$this->load->helper('file');         // 파일헬퍼(업로드 폴더의 파일목록 조회)
		$this->load->library('image_lib');   // 썸네일 생성 라이브러리
	}

	/*
		http://localhost/ex17_thumbnail
	*/

	public function index()
	{
		// 전체 환경 설정 정보에서 썸네일 관련 정보만 추출
		$config = $this->config->item('thumbnail');

		// 썸네일이 생성될 폴더가 없다면 생성한다.
		if(!is_dir($config['new_image'])){
			mkdir($config['new_image'], 0777, true);
			chmod($config['new_image'], 0777);
		}

		// 전체 환경설정 정보에서 파일이 저장되어 잇는 디렉토리 경로만 추출
		$upload_config = $this->config->item('upload');
		$dir = $upload_config['upload_path'];

		// 디렉토리의 파일 정보들을 추출한다.
		// -> 두 번째 파라미터 TRUE : 절대경로 리턴.
		// -> FALSE : 파일명만 리턴
		$files = get_filenames($dir, TRUE);

		debug($files);

		foreach ($files as $key => $item){
			// 설정정보에 원본파일 경로 추가
			//$config['source_image'] = $dir.'/'.$item;  <--  $files = get_filenames($dir, FALSE); 일때
			$config['source_image'] = $item;

			// 썸네일이 저장될 경로 추가 - config/thumbnail.php에 추가 하였으므로 삭제
			//$config['new_image'] = $dir.'/thumbs/'.$item;

			// 설정정보를 라이브러리에 로드시킴
			$this->image_lib->initialize($config); 

			// 이미지 리사이즈(성공시 true, 실패시 false)
			$result = $this->image_lib->resize();

			if(!$result) {
				debug($this->image_lib->display_errors());
			} else {
				debug("썸네일 생성 성공", $item);
			}
		}
	}

	/*
		업로드 결과 처리
		http://localhost/ex17_thumbnail/result
	
	public function result()
	{
		// 전체 환경설정 정보에서 메일 발송에 필요한 정보만 추출
		$config = $this->config->item('upload');
		
		// 파일이 업로드 될 폴더가 존재하지 않는다면 생성한다.
		if(!is_dir($config['upload_path'])){
			//경로, 퍼미션, 하위폴더 생성 여부
			mkdir($config['upload_path'],766,TRUE);
			chmod($config['upload_path'],766);
		}

		// 업로드 라이브러리에 환경설정 정보 등록
		$this->upload->initialize($config);

		// 업로드 수행 --> 실패시 FALSE 리턴됨
		$result = $this->upload->do_upload('photo');
									// <input name="photo" />
		$data = FALSE;
		if(!$result){
			// 실패시 에러정보를 조회
			$data = $this->upload->display_errors();
		} else {
			// 업로드 된 결과 데이터를 조회.
			$data =$this->upload->data();
		}

		debug($data);

	}
	*/
}


