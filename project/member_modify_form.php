<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>수정 화면</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/members.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/bar.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body>
	<header>
    	<?php include "header.php";?>
    </header>
		<?php
			if (!$userid )
			{
				echo("<script>
						alert('로그인 후 이용해주세요!');
						history.go(-1);
						</script>
					");
				exit;
			}
		?>
<?php
   	$con = mysqli_connect("localhost", "user1", "12345", "pet_guard");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
		$type = $row["type"];
		$tag_name = $row["tag_name"];
		$state = $row["state"];

    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
?>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$userid?>
				        </div>
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input
							       type="text" name="email2" value="<?=$email2?>">
				        </div>
			       	</div>
							<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">반려동물 이름</div>
				        <div class="col2">
							<input type="text" name="type" value="<?=$type?>">
				        </div>
			       	</div>
							<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">테그 넘버</div>
				        <div class="col2">
							<input type="text" name="tag_name" value="<?=$tag_name?>">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div>
        </div>
	</section>
	<footer style="background-color: #000000; color: #ffffff">
    	<?php include "footer.php";?>
    </footer>
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
