<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="keywords" content="技术问答 技术问答网站" />
<meta name="description" content="技术问答注册页" />
<meta name="viewport" content="maximum-scale=1.0" />
<title>Sunshine--sign up</title>
<link rel="stylesheet" type="text/css" href="../css/core.css" />
<link rel="shortcut icon" href="../material/logo.ico" />
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
			<div class="module sign_up">
				<b>帐号注册</b>
				<hr />
				<form action="../database/sign_up_process.php" method="post">
					<div class="username">
						<label>用户名：</label> <input type="text" name="username" />
					</div>
					<div class="password">
						<label>密码：</label> <input type="password" name="password" />
					</div>
					<div class="confirm_password">
						<label>确认密码：</label><input type="password" />
					</div>
					<div class="button">
						<input type="submit" name="sign_up" value="注册" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>