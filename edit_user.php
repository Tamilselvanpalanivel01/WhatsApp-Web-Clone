<?php
SESSION_START();

if (!isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

include('Chat.php');
$chat = new Chat();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $newUsername = isset($_POST["editUsername"]) ? htmlspecialchars(trim($_POST["editUsername"])) : '';
    $newEmail = isset($_POST["editEmail"]) ? filter_var($_POST["editEmail"], FILTER_SANITIZE_EMAIL) : '';
    $newPhoneNumber = isset($_POST["editPhoneNumber"]) ? filter_var($_POST["editPhoneNumber"], FILTER_SANITIZE_STRING) : '';
    $currentAvatar = isset($_POST["currentAvatar"]) ? $_POST["currentAvatar"] : ''; // Current avatar URL

    // Check if a new avatar is uploaded
    if (isset($_FILES["editAvatar"]) && $_FILES["editAvatar"]["error"] == UPLOAD_ERR_OK) {
        $avatarTmpName = $_FILES["editAvatar"]["tmp_name"];
        $avatarName = basename($_FILES["editAvatar"]["name"]);
        $avatarPath = "userpics/" . $avatarName; // Set your desired upload path

        // Move the uploaded file to the new path
        move_uploaded_file($avatarTmpName, $avatarPath);

        // Update the avatar in the database
        $chat->updateUserAvatar($_SESSION['userid'], $avatarPath);

        // Remove the old avatar file
        if ($currentAvatar != 'default_avatar.jpg') {
            unlink($currentAvatar);
        }
    }

    // Update other user details in the database
    $chat->updateUserDetails($_SESSION['userid'], $newUsername, $newEmail, $newPhoneNumber);

    // Redirect to the profile page
    header("Location: profile.php");
    exit();
} else {
    // Redirect to the profile page if accessed directly without form submission
    header("Location: profile.php");
    exit();
}
?>
