<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>
    <link rel="stylesheet" href="styles.css">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            width: 50%;
            margin:10px;
        }
        .login-container input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style> -->
</head>
<body>
    <?php
    if(isset($_GET['err'])){
        echo "<h3 style='color:red;text-align:center'>帳號或密碼錯誤</h3>";
    }
    // session_start();
    if(!isset($_COOKIE['login'])){
    ?>
        <div class="register-container">
        <form  action="check_account.php" method="post" class="register-form">
            <h2>登入帳戶</h2>
            
            <input type="text" name="acc" placeholder="帳號" required>
            
            <input type="email" name="email" placeholder="電子郵件" required>
            
            <input type="password" name="pw" placeholder="密碼" required>
            
            <input type="text" name="tel" placeholder="電話" required>
            
            <button type="submit" class="submit-btn">登入</button>
            
            
        </form>
    </div>
    <?php
}else{
?>
        <div>
            你已登入
        </div>
<?php
}
?>
    
    
    

    
</body>
</html>
