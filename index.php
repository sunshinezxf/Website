<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="keywords" content="技术问答 技术问答网站" />
<meta name="description" content="技术问答首页" />
<meta name="viewport" content="maximum-scale=1.0" />
<title>Sunshine</title>
<link rel="shortcut icon" href="./material/logo.ico" />
<link rel="stylesheet" type="text/css" href="./css/core.css" />
</head>
<body>
	<div class="homepage">
		<div class="main-header">
			<div class="profile-bar">
				<div class="menu row grid-layout">
					<a class="title" href="./index.php">Sunshine尛帆</a>
					<ul>
						<li><a href="./member/sign_up.php">注册</a></li>
						<li><a href="./member/login.php">登陆</a></li>
						<li><a href="./member/ask_question.php">提问</a></li>
						<li><a href="./member/logout.php">退出</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="module display">问题一</div>
		<div class="module display">问题二</div>
		<div class="module display">问题三</div>
		<div class="module display">问题四</div>
		<div class="main-footer">
			<div class="row footer">&copy;  Sunshine&#8482;,&nbsp;2013</div>
		</div>
	</div>
</body>
</html>