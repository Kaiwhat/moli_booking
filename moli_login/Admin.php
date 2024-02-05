<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}

try {

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>moli</title>
</head>
<body>
    <a href="Logout.php">Logout</a>
</body>
</html>