<!DOCTYPE html>
<!--
	/application/views/ex12_cookie/index.php
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
		<? if ($mycookie) {?>
		<h1>저장된 쿠키값 : <?=$mycookie?></h1>
		<? } else { ?>
		<h1>저장된 쿠키값 없음</h1>
		<? } ?>
		<form method="post" action="<?=base_url()?>ex12_cookie/result">
			<input type="text" name="username" placeholder="Username" />
			<button type="submit">쿠키저장</button>
		</form>
	</div>
</body>