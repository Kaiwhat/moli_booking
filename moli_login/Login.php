<?php
session_start();
include "db_connect.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
 
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname) || empty($pass)) {
        echo "failure";
    } else {
        try {

            // Your SQL query
            $query = "SELECT * FROM roots WHERE user_name=:username AND password=:password";

            // Prepare the statement
            $stmt = $conn->prepare($query);
            // Bind parameters
            $stmt->bindParam(':username', $uname);
            $stmt->bindParam(':password', $pass);
            // Execute the statement
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) === 1) {
                $row = $result[0];
                if ($row['user_name'] === $uname && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: Admin.php");
                    exit();
                } else {
                    echo "failure";
                }
            } else {
                echo "failure";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
?>
