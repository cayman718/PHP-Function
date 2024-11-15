<?php
include "./function.php";



if(!isset($_POST['acc'])){
    header("location:login.php");
    exit();
}


$acc=$_POST['acc'];
$pw=$_POST['pw'];


//$sql="select * from `member` where `acc`='$acc' && `pw`=$pw ";
//$sql="select count(id) from `member` where `acc`='$acc' && `pw`='$pw'";
//echo $sql;
$row=find('member',['acc'=>$acc,'pw'=>$pw]);
dd($row);



if($row>=1){
    
    //$_SESSION['login']=$acc;
    //echo "<br><a href='login2.php'>回首頁</a>";
    header("location:success.php");
}else{
    header("location:login.php?err=1");

}




?>