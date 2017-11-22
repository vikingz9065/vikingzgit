<!DOCTYPE html>
<!--
	/application/views/ex13_session/index.php
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
		<? if ($username) {?>
		<h1>저장된 세션값 : <?=$username?></h1>
		<? } else { ?>
		<h1>저장된 세션값 없음</h1>
		<? } ?>
		<form method="post" action="<?=base_url()?>ex13_session/result">
			<input type="text" name="username" placeholder="Username" />
			<button type="submit">세션저장</button>
		</form>
	</div>
</body>