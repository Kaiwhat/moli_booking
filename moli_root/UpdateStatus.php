<?php
session_start();
include "db_connect.php";

if (isset($_POST['stuId'])) {
    $stuId = $_POST['stuId'];
    try {
        // Your SQL query
        $query = "UPDATE users SET Pass='通過' WHERE StuId=:stuId";
        
        // Prepare the statement
        $stmt = $conn->prepare($query);
        // Bind parameter
        $stmt->bindParam(':stuId', $stuId);
        // Execute the statement
        $stmt->execute();
        
        echo "SQL 操作成功";
    } catch(PDOException $e) {
        echo "錯誤：" . $e->getMessage();
    }
} else {
    echo "未收到有效的学生ID";
}
?>