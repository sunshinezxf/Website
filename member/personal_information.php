<?php
session_start ();
include_once '../database/connect.php';
$username = $_GET ['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="keywords" content="技术问答  个人信息" />
<meta name="description" content="個人信息" />
<meta name="viewport" content="maximum-scale=1.0" />
<title>Sunshine--personal information</title>
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
					<a class="logo" href="../index.php"><img alt="logo"
						src="../material/Logo.jpg" /></a>
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
				</div>
			</div>
		</div>
		<?php
		$connection = connect ();
		$sql = "select * from user where u_username=:username";
		$result = $connection->prepare ( $sql );
		$result->execute ( array (
				':username' => $username 
		) );
		$temp = $result->fetch ( PDO::FETCH_ASSOC );
		?>
		<div class="module grid-layout content personal">
			<div>
				<div class="title">个人信息</div>
				<div class="p_username">
					用户名：<span><?php echo $temp['u_username']?></span>
				</div>
				<div class="p_mark">
					积分：<span><?php echo $temp['u_mark']?></span>
				</div>
			</div>
			<div class="module leave_message">
			<?php
			$sql = "select * from message where to_username = :to_username";
			$result = $connection->prepare ( $sql );
			$result->execute ( array (
					':to_username' => $username 
			) );
			$i = 0;
			while ( true ) {
				$temp = $result->fetch ( PDO::FETCH_ASSOC );
				if ($temp == null) {
					break;
				} else {
					$i ++;
					$username = $temp ['from_username'];
					$description = $temp ['message'];
					echo "<div class=\"module\">";
					echo "<div class=\"message_display\">";
					echo "<div class=\"username\">" . $username . ":&nbsp;</div>";
					echo "<div class=\"message_content\">" . $description . "</div>";
					echo "<div class=\"stairs\">第" . $i . "楼</div>";
					echo "</div>";
					echo "</div>";
				}
			}
			?>
			<hr />
				<div class="module messagearea">
					<label>我要留言：</label>
					<form action="../database/leave_message.php" method="post">
						<div class="message">
							<input type="text" name="to_username" style="visibility: hidden;"
								value=<?php echo $username?> />
							<textarea rows="6" name="message_content"></textarea>
							<div class="button">
								<input type="submit" name="leave_message" value="我要留言" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="main-footer">
			<div class="row footer">&copy; Sunshine&#8482;,&nbsp;2013</div>
		</div>
	</div>
</body>
</html>