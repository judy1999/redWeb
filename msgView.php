<?php
    $db=new PDO("mysql:host=1.34.6.160;port=3306;dbname=redWeb","redWeb","h6g04bp6jp6");
    $db->exec("set names utf8");
    $result=$db->prepare("select * from msg order by m_time desc");
	$result->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

    body {
        background: #f6e4d6;
    }
</style>

<body>
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
        <table style="width:550px;border:1px solid #333;">
            <tr style="height:30px;">
                <td colspan="2">序號:<?php echo $n;?><br>標題：<?php echo $row['m_title']?></td>
            </tr>
            <tr style="height:30px;">
                <td>留言時間：<?php echo $row['m_time'];?></td>
                <td>留言IP：<?php echo $row['m_ip'];?></td>
            </tr>
            <tr>
                <td colspan="2">留言內容：<br>
                <pre  style="font-size:20px;"><?php echo $row['m_content'];?></pre></td>
            </tr>
        </table>
    <?php } ?>
    <?php
        $delete = $db -> prepare("delete from msg where m_id>=:index");
        $delete->bindValue('index',$index+25);
        $delete->execute();
    ?>
</body>

</html>