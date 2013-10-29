<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="keywords" content="技术问答 技术问答网站" />
<meta name="description" content="技术问答首页" />
<meta name="viewport" content="maximum-scale=1.0" />
<title>Sunshine--login</title>
<link rel="shortcut icon" href="../material/logo.ico" />
<link rel="stylesheet" type="text/css" href="../css/core.css" />
<script type="text/javascript" src="../javascript/ajax.js"></script>
<script type="text/javascript" src="../javascript/validate.js"></script>
</head>
<body>
	<div class="homepage">
		<div class="main-header">
			<div class="profile-bar">
				<div class="menu row grid-layout">
					<a class="title" href="../index.php">Sunshine尛帆</a>
					<ul>
						<li><a href="./sign_up.php">注册</a></li>
						<li><a href="./login.php">登陆</a></li>
						<li><a href="./ask_question.php">我要提问</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="grid-layout">
			<div class="module login">
				<b>帐号登陆</b>
				<hr />
				<form action="../database/login_process.php" method="post">
					<div class="username">
						<label>用户名：</label> <input type="text" name="username" onchange="" />
						<span id="usernmae_span"></span>
					</div>
					<div class="password">
						<label>密码：</label> <input type="password" name="password" /> <span
							id="password_span"></span>
					</div>
					<div class="button">
						<input type="submit" name="login" value="登陆" />
					</div>
				</form>
			</div>
		</div>
		<div class="main-footer">
			<div class="row footer">&copy; Sunshine&#8482;,&nbsp;2013</div>
		</div>
	</div>
</body>
</html>