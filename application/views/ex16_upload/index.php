<!DOCTYPE html>
<!--
	/application/views/ex16_upload/index.php
-->
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title>Codeigniter</title>
	<style type="text/css">
	#wrap {  }
	</style>
</head>
<body>
	<div id="wrap">
		<form method="post" action="<?=base_url()?>ex16_upload/result" enctype="multipart/form-data">
			<input type="file" name="photo" placeholder="jpg,gif,png" />
			<button type="submit">파일업로드</button>
		</form>
	</div>
</body>