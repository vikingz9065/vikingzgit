<!DOCTYPE html>
<!--
	/application/views/ex15_tempdata/index.php
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
		<h1>저장된 Tempdata : <?=$temp_input?></h1>
		<? } else { ?>
		<h1>저장된 Tempdata 없음</h1>
		<? } ?>
		<form method="post" action="<?=base_url()?>ex15_tempdata/result">
			<input type="text" name="temp_input" placeholder="임시 저장값" />
			<button type="submit">Tempdata저장</button>
		</form>
	</div>
</body>