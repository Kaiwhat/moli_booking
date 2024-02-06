<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../moli_login/index.php");
    exit();
}

try {
    // Your SQL query
    $query = "SELECT * FROM users WHERE Pass LIKE '待審核'";
    
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
    <script>
        function sendSQL(stuId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "UpdateStatus.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("SQL 指令已发送到服务器");
                    } else {
                        alert("请求失败：" + xhr.status);
                    }
                }
            };
            xhr.send("stuId=" + stuId);
        }

    </script>
</head>
<body>
    <div class="navbar">
        <h1>Hello Moli</h1>
        <a href="/moli_booking-main/moli_login/Logout.php">Logout</a>
    </div>
    <div class="main">
        <div class="user-list">
            <table class="fixed_headers">
                <thead>
                    <th>ID</th>
                    <th>From-time</th>
                    <th>Due-time</th>
                    <th>Usage</th>

                    <th>Process</th>
                    <th>Action</th>
                </thead>
                <?php foreach ($result as $row): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['StuId']; ?></td>
                            <td><?php echo $row['FromTime']; ?></td>
                            <td><?php echo $row['ToTime']; ?></td>
                            <td><?php echo $row['Use_for']; ?></td>

                            <td><?php echo $row['Pass']; ?></td>
                            <td>
                                <?php
                                // 将日期时间字符串转换为指定格式
                                    $fromTime = explode(" ", $row['FromTime']);
                                    $Thatdate = date('Ymd', strtotime($fromTime[0]));
                                    $NewFromTime = date('His', strtotime($fromTime[1]));
                                    $NewToTime = date('His', strtotime($row['ToTime']));
                                ?>
                                <a class="confirm-btn" href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Event&details=<?php echo $row['StuId'] . ' ' . $row['Use_for']; ?>&dates=<?php echo $Thatdate . 'T' . $NewFromTime . '/' . $Thatdate . 'T' . $NewToTime; ?>&location=Room237" onclick="sendSQL('<?php echo $row['StuId']; ?>')">Y</a>
                                <button class="refused-btn">N</button>
                            </td>
                        </tr>
                    </tbody>
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
