<style>
    *{
        font-family: 'courier new';
    }
</style>


<?php
function stars($shape,$line){
switch($shape){
    case "正三角形":
    for($i=0;$i<$line;$i++){

        for($k=0;$k<$line-1-$i;$k++){
            echo "&nbsp";
        }

        for($j=0;$j<(2*$i+1);$j++){
          echo "*";
        }
        echo "<br>";
    }
    break;

  case "倒正三角形":
     for($i = $line; $i >= 1; $i--) {  // 修正起始值為 $line，並由大到小遞減
            // 輸出空格
            for($k = 0; $k < $line - $i; $k++) {  // 空格數量隨 $i 減少
                echo "&nbsp;";
            }

       for($j=0;$j<(2*$i-1);$j++){
        echo "*";
       }
       echo "<br>";
    }
    break;
}
}



// 建立資料庫的連線變數
// @param string $db 資料庫名稱
// @return object

function pdo($db){
    $dsn="mysql:host=localhost;charset=utf8;dbname=$db";
    $pdo=new PDO($dsn,'root','');
    return $pdo;
}






// 回傳指定資料表的所有資料
// @param string $table 資料表名稱
// @return array

function all($table){
    global $pdo;
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


// 回傳指定資料表特定ID的單筆資料
// @param string $table 資料表名稱
// @param integer $id 資料表ID
// @return array

function find($table,$id){
    global $pdo;
    if(is_array($id)){
        $tmp=[]; //清空
        foreach($id as $key => $value){
            // string print f("`%s`='%s',$key,$value");
            $tmp[]="`$key`='$value'";
        }
        $sql="select * from $table where".join("&&",$tmp);
    }else{
       $pdo=pdo('crud');
       $sql="select * from $table where id='$id'";
    }
    $row=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);//query是查詢
    return $row;
}




// 刪除指定條件的資料
// @param string $table 資料表名稱
// @param array $id 條件(數字或陣列)
// @return void //是空的
// @return boolean

function del($table,$id){
    $pdo=pdo('crud');
    if(is_array($id)){
        $tmp=[]; //清空
        foreach($id as $key => $value){
            // string print f("`%s`='%s',$key,$value");
            $tmp[]="`$key`='$value'";
        }
        $sql="delete from $table where".join("&&",$tmp);
    }else{
       $pdo=pdo('crud');
       $sql="delete from $table where id='$id'";
    }
    return $pdo->exec($sql); 

    
}






// 列出陣列內容
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";

}
?>