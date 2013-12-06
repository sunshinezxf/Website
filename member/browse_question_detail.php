<?php
session_start ();
include_once '../database/connect.php';
include_once '../object/question.class.php';
$question_id = $_GET ['question_id'];
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
		$sql = "select * from question where q_id=:q_id";
		$result = $connection->prepare ( $sql );
		$result->execute ( array (
				':q_id' => $question_id 
		) );
		$temp = $result->fetch ( PDO::FETCH_ASSOC );
		$question = new question ( $temp ['q_id'], $temp ['q_title'], $temp ['q_category'], $temp ['q_description'], $temp ['q_username'], $temp ['q_path'], $temp ['q_like'] );
		?>
		<div class="module grid-layout content question_detail">
			<div class="title"><?php echo $question->get_question_title()?></div>
			<div class="tag"><?php echo $question->get_question_category()?></div>
			<div class="description"><?php echo $question->get_question_description()?></div>
			<div class="picture">
				<img alt="Picture"
					src="<?php echo "../".$question->get_question_path()?>" />
			</div>
		</div>
	</div>
</body>
</html>