<?php
session_start ();
include_once './database/get_tag.php';
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
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="ajax.js"></script>
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
					</nav>
				</div>
			</div>
		</div>
		<div class="module grid-layout content">

			<div class="side_menu">
				<div class="tag">
					<a href="./database/content.php" target="content">全部</a>
				</div>
			<?php
			$tag_array = get_tag ();
			for($i = 0; $i < count ( $tag_array ); $i ++) {
				echo "<div class=\"tag\">";
				echo "<a id=\"" . $tag_array [$i] . "\" href=\"javascript:void(0)\" onclick=\"specifyQuestion(" . $tag_array [$i] . "); return false\">" . $tag_array [$i] . "</a>";
				echo "</div>";
			}
			?>
			</div>
			<iframe class="question_display module" src="./database/content.php"
				name="content" id="content"> </iframe>
		</div>
		<div class="main-footer">
			<div class="row footer">&copy; Sunshine&#8482;,&nbsp;2013</div>
		</div>


	</div>
</body>
</html>