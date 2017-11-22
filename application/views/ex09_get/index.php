<!DOCTYPE html>
<!--
	/application/views/ex09_get/index.php
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Codeigniter</title>
	<style type="text/css">
	#wrap {  }
	</style>
</head>
<body>
	<div id="wrap">
		<h1>100 + 200 = ? </h1>
		<a href="<?=base_url()?>ex09_get/result?answer=100">100</a>
		<a href="<?=base_url()?>ex09_get/result?answer=200">200</a>
		<a href="<?=base_url()?>ex09_get/result?answer=300">300</a>
		<a href="<?=base_url()?>ex09_get/result?answer=400">400</a>
		<a href="<?=base_url()?>ex09_get/result?answer=500">500</a>
	</div>
</body>