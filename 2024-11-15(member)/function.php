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
    $sql="select * from $table where";
    $pdo=$pdo=pdo('crud');
    if(is_array($id)){
        $tmp=[]; //清空
        foreach($id as $key => $value){
            // string print f("`%s`='%s',$key,$value");
            $tmp[]="`$key`='$value'";
        }
         $sql=$sql.join(" && ",$tmp);
        
    }else{
        $sql=$sql . " `id`='$id'";
    }
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    
    return $row;
}





// 刪除指定條件的資料
// @param string $table 資料表名稱
// @param array $id 條件(數字或陣列)
// @return void //是空的
// @return boolean

function del($table,$id){
    $sql="delete from $table where";
    $pdo=$pdo=pdo('crud');
    if(is_array($id)){
        $tmp=[]; //清空
        foreach($id as $key => $value){
            // string print f("`%s`='%s',$key,$value");
            $tmp[]="`$key`='$value'";
        }
        $sql=$sql.join("&&",$tmp);
    }else{
       $sql=$sql." id='$id'";
    }
    return $pdo->exec($sql); 

    
}

//更新指定條件的資料
//@param string $table 資料表名稱
// @param array $array 更新的欄位及內容
// @return array || number $id 條件(數字或陣列)
// @return boolean



function update($table,$array,$id){
    $sql="update $table set";
    $pdo=$pdo=pdo('crud');
    $tmp=[];
    foreach($array as $key => $value){
        $tmp[]="`$key`='$value'";
    }
    $sql=$sql . join(",",$tmp);

    if(is_array($id)){
        $tmp=[];
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        $sql=$sql . " where ".join(" && ",$tmp);

    }else{
        $sql=$sql . " where `id`='$id'";
    }
         return $pdo->exec($sql);



}


//新增資料
//@param string $table 資料表名稱
// @param string $cols 新增的欄位字串
// @return string $values 新增的值字串
// @return boolean


function insert($table,$array){
    $pdo=pdo('crud');
    $sql="insert into $table ";
    $keys=array_keys($array);
    
    $sql=$sql . "(`".join("`,`",$keys)."`) values ('".join("','",$array)."')";
    return $pdo->exec($sql);
} 





// 列出陣列內容
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}




?>