<!DOCTYPE html>
<!--
	/application/views/ex14_flashdata/index.php
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
		<? if ($temp_input) {?>
		<h1>저장된 세션값 : <?=$temp_input?></h1>
		<? } else { ?>
		<h1>저장된 Flashdata 없음</h1>
		<? } ?>
		<form method="post" action="<?=base_url()?>ex14_flashdata/result">
			<input type="text" name="temp_input" placeholder="Username" />
			<button type="submit">Flashdata저장</button>
		</form>
	</div>
</body>