<?php
session_start();
include "../moli_login/db_connect.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../moli_login/index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Moli</title>
</head>
<body>
    <div class="navbar">
        <h1>Hello Moli</h1>
        <a href="/moli_booking-main/moli_login/Logout.php">Logout</a>  
    </div>
    <div class="main">
        <div class="user-list">
            <table>
                <tr>
                    <th>ID</th>
                    <th>From-time</th>
                    <th>Due-time</th>
                    <th>Usage</th>
                    <th>Email</th>
                    <th>Process</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo $row['StuId']; ?></td>
                        <td><?php echo $row['FromTime']; ?></td>
                        <td><?php echo $row['ToTime']; ?></td>
                        <td><?php echo $row['Use_for']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Pass']; ?></td>
                        <td>
                            <button id="Accept">Y</button>
                            <button id="Reject">N</button>
                            <button id="Reject">M</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="calendar" id="calendar">
        <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%234285F4&ctz=Asia%2FTaipei&src=YTA5MDM2MTM4MzRAZ21haWwuY29t&src=Y2xhc3Nyb29tMTE2NTM1NTQ2MTcyNDE1OTk5NzY3QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=emgtdHcudGFpd2FuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%23202124&color=%230B8043" 
        ></iframe>
    </div>
</body>
</html>
