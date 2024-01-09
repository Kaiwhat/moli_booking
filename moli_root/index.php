<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "molibooking";

try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Your SQL query
    $query = "SELECT * FROM users";
    
    // Prepare the statement
    $stmt = $conn->prepare($query);
    // Execute the statement
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Display fetched data
    foreach ($result as $row) {
        foreach ($row as $columnName => $columnValue) {
            echo $columnValue . " ";
        }
        echo "<br>";
    }
}
catch(PDOException $e) {
    echo "錯誤：" . $e->getMessage();
}

// 關閉連接
$conn = null;
?>