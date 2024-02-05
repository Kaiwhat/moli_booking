<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "molibooking";

$conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
// 設置 PDO 錯誤模式為例外
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!$conn) {
	echo "Connection failed!";
}