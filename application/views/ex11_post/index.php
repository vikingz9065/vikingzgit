<!DOCTYPE html>
<!--
	/application/views/ex11_post/index.php
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
		<form action="<?=base_url()?>ex11_post/result" method="post">
			<input type="text" name="username" placeholder="Username" />

			<input type="email" name="email" placeholder="Email" />

			<button type="submit">전송</button>
		</form>
	</div>
</body>