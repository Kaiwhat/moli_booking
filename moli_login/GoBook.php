<?php

session_start(); 
include "../moli_root/db_connect.php";

try {
    // 獲取從表單 POST 過來的資料
    if(isset($_POST["submit"])) {
        $stuid = $_POST["stuid"];
        $fromtime = $_POST["fromtime"];
        $totime = $_POST["totime"];
        $usage = $_POST["usage"];
        $email = $_POST["email"];

        // 準備 SQL 語句以插入資料
        $sql = "INSERT INTO users (StuId, FromTime, ToTime, Use_for, Email, Pass) VALUES (:stuid, :fromtime, :totime, :usage, :email, '待審核')";
        
        // 使用準備語句，防止 SQL 注入攻擊
        $stmt = $conn->prepare($sql);
        
        // 繫結參數並執行語句
        $stmt->bindParam(':stuid', $stuid);
        $stmt->bindParam(':fromtime', $fromtime);
        $stmt->bindParam(':totime', $totime);
        $stmt->bindParam(':usage', $usage);
        $stmt->bindParam(':email', $email);
        
        // 執行準備好的語句
        $stmt->execute();

        echo "資料已成功插入到資料庫中";
    }
}
catch(PDOException $e) {
    echo "錯誤：" . $e->getMessage();
}

// 關閉連接
$conn = null;
?>
