<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="keywords" content="技术问答  问题详细内容" />
<meta name="description" content="问题内容" />
<meta name="viewport" content="maximum-scale=1.0" />
<title>Sunshine--detail</title>
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
					<a class="logo" href="../index.php"><img alt="logo" src="../material/Logo.jpg" /></a>
					<ul>
						<li><div class="search">
									<input class="search_input" autocomplete="off" /> <a>搜索</a>
								</div></li>
								<?php
								if (! isset ( $_SESSION ['username'] )) {
									?>
									<li><a href="./member/sign_up.php">注册</a></li>
							<li><a href="./member/login.php">登陆</a></li>
								<?php
								} else {
									?>
									<li><a><?php echo $_SESSION['username']?></a></li>
							<li><a href="./member/ask_question.php">提问</a></li>
							<li><a href="./member/logout.php">退出</a></li>
									<?php
								}
								?>
					</ul>
				</div>
			</div>
		</div>
		<div class="module grid-layout content question_detail">
			<div class="title">TITLE</div>
			<div class="tag">Tag</div>
			<div class="description">Question Details</div>
			<div class="picture"><img alt="Picture" src="" /></div>
		</div>
	</div>
</body>
</html>