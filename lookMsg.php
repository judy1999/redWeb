<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
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
	width: 106px;
	height: 38px;
	z-index: 1;
	left: 107px;
	top: 330px;
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
	background-color:#F96;
	width:600px;
	height:500px;
	position:absolute;
	left:520px;
	top:250px;
}
</style></head>

<body id="body">
<div id="all">
  <div id="b"><img src="images/b.png" width="324" height="616" border="0" /></div><div id="View"><?php
    $db=new PDO("mysql:host=1.34.6.160;port=3306;dbname=redWeb","redWeb","h6g04bp6jp6");
    $db->exec("set names utf8");
    $result=$db->prepare("select * from msg order by m_time desc");
	$result->execute();
?>
    <div style="color:red;">
        *最多顯示20筆內容!!
    </div>
    <?php
    $n=0;
    $index=0;
    while($row = $result->fetch(PDO::FETCH_ASSOC)){ 
        $n+=1;
        $index=$row['m_id'];
        if ($n>20){
            break;
        }
    ?>
        <table style="width:800px;border:1px solid #333;">
            <tr style="height:30px;">
                <td colspan="2">標題：<?php echo $row['m_title']?></td>
            </tr>
            <tr style="height:30px;">
                <td>留言時間：<?php echo $row['m_time'];?></td>
                <td>留言IP：<?php echo $row['m_ip'];?></td>
            </tr>
            <tr>
                <td colspan="2">留言內容：<br>
                <span  style="font-size:20px;"><?php echo $row['m_content'];?></span></td>
            </tr>
        </table>
    <?php } ?>
    <?php
        $delete = $db -> prepare("delete from msg where m_id>=:index");
        $delete->bindValue('index',$index+25);
        $delete->execute();
    ?></div></iframe>
  <div id="title"><img src="images/title.png" width="508" height="177" /></div>
  <div id="b1"><a href="index.php"><img src="images/home.png" width="100" height="35" /></a></div>
  <div id="b2"><a href="word.html"><img src="images/about.png" width="148" height="35" /></a></div>
  <div id="b3"><a href="msg.html"><img src="images/msg.png" width="148" height="35" /></a></div>
  <div id="b4"><a href="lookMsg.php" target="_parent"><img src="images/lookmsg.png" width="148" height="35" border="0" /></a></div>
  
</div>
</body>
</html>
