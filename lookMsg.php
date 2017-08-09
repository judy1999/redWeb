<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看留言</title>
<link rel="icon" href="images/le12345.gif">
<style type="text/css">
#all{
	position:relative;
	width:100%;
	height:768px;
	background-image:url(images/bg.png);
	
	
}


#b {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 1;
	left: 17px;
	top: 77px;
}
iframe{
	position:relative;
	left:500px;
	top:245px;
	}
#title {
	position: absolute;
	width: 537px;
	height: 196px;
	z-index: 1;
	left: 555px;
	top: 38px;
}
#b1{
	position: absolute;
	width: 105px;
	height: 286px;
	z-index: 1;
	left: 123px;
	top: 309px;
}
#b2{
	position: absolute;
	width: 155px;
	height: 38px;
	z-index: 1;
	left: 107px;
	top: 400px;
}
#b3{
	position: absolute;
	width: 150px;
	height: 38px;
	z-index: 1;
	left: 107px;
	top: 470px;
}
#b4{
	position: absolute;
	width: 154px;
	height: 38px;
	z-index: 1;
	left: 107px;
	top: 540px;
}
#body{
	margin:0 0px;	
}
#View{
	width:600px;
	height:500px;
	position:absolute;
	left:520px;
	top:250px;
}
</style></head>

<body id="body">
<div id="all">
  <div id="b"><img src="images/b.png" width="324" height="616" border="0" /></div>
  <iframe src="msgView.php" name="main" width="700" height="500" frameborder="0"></iframe>
  <div id="View"><?php
    $db=new PDO("mysql:host=1.34.6.160;port=3306;dbname=redWeb","redWeb","h6g04bp6jp6");
    $db->exec("set names utf8");
    $result=$db->prepare("select * from msg order by m_time desc");
	$result->execute();
?>
   </div>
  <div id="title"><img src="images/title.png" width="508" height="177" /></div>
  <div id="b1"><a href="index.html"><img src="images/backhmoe.png" width="114" height="307" /></a></div>
</div>
</body>
</html>
