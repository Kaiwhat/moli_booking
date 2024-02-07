<?php
session_start();
include "db_connect.php";

if (isset($_POST['stuId']) && isset($_POST['process'])) {
    $stuId = $_POST['stuId'];
    $process = $_POST['process'];
    try {
        // Your SQL query
        if($process === "0"){
            $query = "UPDATE users SET Pass='已通過' WHERE StuId=:stuId";
        }else if($process === "1"){
            $query = "UPDATE users SET Pass='未通過' WHERE StuId=:stuId";
        }else{
            $query = "UPDATE users SET Pass='待審核' WHERE StuId=:stuId";
        }
        
        
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