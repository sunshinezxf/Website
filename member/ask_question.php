<?php
session_start ();
if (! isset ( $_SESSION ['username'] ) && ! isset ( $_SESSION ['password'] )) {
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="keywords" content="技术问答 技术问答" />
<meta name="description" content="技术问答提问页" />
<meta name="viewport" content="maximum-scale=1.0" />
<title>Sunshine--ask question</title>
<link rel="shortcut icon" href="../material/logo.ico" />
<link rel="stylesheet" type="text/css" href="../css/core.css" />
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
									<li><a href="./sign_up.php">注册</a></li>
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
			<div class="module ask_question">
				<b>提出问题</b>
				<hr />
				<div class="caption">
					<label>标题：</label><input type="text" name="title" />
				</div>
				<div class="category">
					<label>分类：</label><input type="text" name="category" />
				</div>
				<div class="description">
					<label>问题描述：</label>
					<div>
						<textarea rows="6"></textarea>
					</div>
				</div>
				<div class="button">
					<input type="submit" name="publish" value="发表" />
				</div>
			</div>
		</div>
		<div class="main-footer">
			<div class="row footer">&copy; Sunshine&#8482;,&nbsp;2013</div>
		</div>
	</div>
</body>
</html>