<script>
    function success(){
        alert("傳送成功!");
        location.href="index.html";
    }
    function error(){
        alert("你在今天已經傳送超過5次!!");
        location.href="index.html";
    }
</script>
<?php
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$myip = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$myip= $_SERVER['REMOTE_ADDR'];
	}
    $db=new PDO("mysql:host=1.34.6.160;port=3306;dbname=redWeb","redWeb","h6g04bp6jp6");
    $db->exec("set names utf8");
    $n=0;
	$d=explode("-",date("Y-m-d"));
	$d=date("Y-m-d", mktime(0, 0, 0, $d[1], $d[2]+1, $d[0])); 
	$result=$db->prepare("select * from msg where m_time between :time1 and :time2");
	$result->bindValue('time1',date("Y-m'd"));
	$result->bindvalue('time2',$d);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
        if($row['m_ip']==$myip) 
        $n+=1;
    }
    if ($n<5){
        $insert = $db -> prepare("insert into msg(m_title,m_content,m_ip) values(:title,:msg,:ip)");
        $insert ->bindValue('title',$_POST['title']);
        $insert ->bindValue('msg',$_POST['msg']);
        $insert ->bindValue('ip',$myip);
        $insert ->execute();
        echo "<script>success()</script>";
    }else{
        echo "<script>error()</script>";
    }
?>