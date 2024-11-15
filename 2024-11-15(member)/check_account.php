<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=crud";
$pdo=new PDO($dsn,'root','');


if(!isset($_POST['acc'])){
    header("location:login.php");
    exit();
}


$acc=$_POST['acc'];
$pw=$_POST['pw'];


//$sql="select * from `member` where `acc`='$acc' && `pw`=$pw ";
$sql="select count(id) from `member` where `acc`='$acc' && `pw`='$pw'";
//echo $sql;
$row=$pdo->query($sql)->fetchColumn();




if($row>=1){
    
    //$_SESSION['login']=$acc;
    //echo "<br><a href='login2.php'>回首頁</a>";
    header("location:success.php");
}else{
    header("location:login.php?err=1");

}




?>