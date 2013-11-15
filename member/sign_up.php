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
<script type="text/javascript" src="../javascript/ajax.js"></script>
<script type="text/javascript" src="../javascript/validate.js"></script>
</head>
<body>
	<div class="homepage">
		<div class="main-header">
			<div class="profile-bar">
				<div class="menu row grid-layout">
					<a class="logo" href="../index.php"><img alt="logo"
						src="../material/Logo.jpg" /></a>
					<nav>
						<ul>
							<li><div class="search">
									<input class="search_input" autocomplete="off" /> <a>搜索</a>
								</div></li>
							<?php
							if (! isset ( $_SESSION ['username'] )) {
								?>
									<li><a href="./member/sign_up.php">注册</a></li>
							<li><a href="./login.php">登陆</a></li>
								<?php
							} else {
								?>
									<li><a><?php echo $_SESSION['username']?></a></li>
							<li><a href="./ask_question.php">提问</a></li>
							<li><a href="./logout.php">退出</a></li>
									<?php
							}
							?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="grid-layout">
			<div class="module sign_up">
				<b>帐号注册</b>
				<hr />
				<form action="../database/sign_up_process.php" method="post">
					<div class="username">
						<label>用户名：</label> <input type="text" id="username"
							name="username" onchange="prompt_username()" /> <span
							id="username_span"></span>
					</div>
					<div class="password">
						<label>密码：</label> <input type="password" id="password"
							name="password" onchange="prompt_password()" /> <span
							id="password_span"></span>
					</div>
					<div class="confirm_password">
						<label>确认密码：</label><input type="password" id="confirm_password"
							onchange="same_password()" /> <span id="confirm_password_span"></span>
					</div>
					<div class="button">
						<input type="submit" name="sign_up" value="注册" />
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