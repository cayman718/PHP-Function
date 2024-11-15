<?php

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */


$sql="UPDATE `member` SET `acc`='{$_POST['acc']}' , 
                           `email`='{$_POST['email']}' ,
                           `pw`='{$_POST['pw']}' ,
                           `tel`='{$_POST['tel']}' 
                           WHERE `id`='{$_POST['id']}'";

/* echo $sql;
exit */

$dsn="mysql:host=localhost;charset=utf8;dbname=crud";
$pdo=new PDO($dsn,'root','');

if($pdo->exec($sql)){

    header("location:success.php?status=1");

}else{

    header("location:success.php?status=0");

}


?>