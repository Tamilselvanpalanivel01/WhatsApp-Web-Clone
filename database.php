<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "whatsapp";

try {
    $conn = new PDO("mysql:host=$servername;port=3307;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL statements to create tables

    // Table structure for chat_users
    // $sql_chat_users = "CREATE TABLE IF NOT EXISTS `chat_users` (
    //     `userid` int(11) NOT NULL AUTO_INCREMENT,
    //     `username` varchar(255) NOT NULL,
    //     `email` VARCHAR(255) NOT NULL,
    //     `phone_number` VARCHAR(15) NOT NULL,
    //     `password` varchar(255) NOT NULL,
    //     `avatar` varchar(255) NOT NULL,
    //     `current_session` int(11) NOT NULL,
    //     `online` int(11) NOT NULL,
    //     PRIMARY KEY (`userid`)
    // ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

    // $conn->exec($sql_chat_users);
    // echo "Table chat_users created successfully<br>";

    // // Table structure for chat
    // $sql_chat = "CREATE TABLE IF NOT EXISTS `chat` (
    //     `chatid` int(11) NOT NULL AUTO_INCREMENT,
    //     `sender_userid` int(11) NOT NULL,
    //     `receiver_userid` int(11) NOT NULL,
    //     `message` text NOT NULL,
    //     `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    //     `status` int(1) NOT NULL,
    //     PRIMARY KEY (`chatid`)
    // ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

    // $conn->exec($sql_chat);
    // echo "Table chat created successfully<br>";

    // // Table structure for chat_login_details
    // $sql_chat_login_details = "CREATE TABLE IF NOT EXISTS `chat_login_details` (
    //     `id` int(11) NOT NULL AUTO_INCREMENT,
    //     `userid` int(11) NOT NULL,
    //     `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    //     `is_typing` enum('no','yes') NOT NULL,
    //     PRIMARY KEY (`id`)
    // ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

    // $conn->exec($sql_chat_login_details);
    // echo "Table chat_login_details created successfully<br>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
