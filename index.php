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
					<a class="logo" href="./index.php"> <img alt="logo"
						src="./material/Logo.jpg" />
					</a>
					<nav>
						<ul>
							<li><div class="search">
									<input class="search_input" autocomplete="off" /> <a>搜索</a>
								</div></li>
							<li><a href="./member/sign_up.php">注册</a></li>
							<li><a href="./member/login.php">登陆</a></li>
							<li><a href="./member/ask_question.php">提问</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="module grid-layout content">
			<div class="side_menu"></div>
			<div class="module display">问题一</div>
			<div class="module display">问题二</div>
			<div class="module display">问题三</div>
			<div class="module display">问题四</div>
			<div class="module display">问题五</div>

		</div>
		<div class="main-footer">
			<div class="row footer">&copy; Sunshine&#8482;,&nbsp;2013</div>
		</div>


	</div>
</body>
</html>