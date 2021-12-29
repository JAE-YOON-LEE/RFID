<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/span.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/bar.css">
   	<div id="admin_box">
	    <ul id="member_list">
				<li>
					<span class="col1">아이디</span>
					<span class="col2">이름</span>
					<span class="col3">이메일</span>
					<span class="col4">펫이름</span>
					<span class="col5">테그이름</span>
					<span class="col6">상태</span>
          <span class="col7">마지막 위치</span>
				</li>
<?php
if (isset($_GET["page"]))
  $page = $_GET["page"];
else
  $page = 1;

	$con = mysqli_connect("localhost", "user1", "12345", "pet_guard");
	$sql = "select * from members where state='X' order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;


  $scale = 20;


	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);
	else
		$total_page = floor($total_record/$scale) + 1;


	$start = ($page - 1) * $scale;

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);

      $row = mysqli_fetch_array($result);

      $num                 = $row["num"];
	    $id                  = $row["id"];
	    $name                = $row["name"];
	    $email               = $row["email"];
      $type                = $row["type"];
      $tag_name            = $row["tag_name"];
      $state               = $row["state"];
      $last_position       = $row["last_position"];


?>


		<li>
			<span class="col1"><?=$id?></a></span>
			<span class="col2"><?=$name?></span>
			<span class="col3">
        <a href="https://nid.naver.com/nidlogin.login?url=http%3A%2F%2Fmail.naver.com%2F">
          <?=$email?></a></span>
			<span class="col4"><?=$type?></span>
			<span class="col5"><?=$tag_name?></span>
      <span class="col6"><?=$state?></span>
      <span class="col7"><?=$last_position?></span>
		</li>

<?php
   	   $number--;
   }

?>
	    </ul>

      <ul id="page_num">
<?php
	if ($total_page>=2 && $page >= 2)
	{
		$new_page = $page-1;
		echo "<li><a href='index.php?page=$new_page'>◀ 이전</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";


   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='index.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;
		echo "<li> <a href='index.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";
?>
			</ul>
