<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<style>
        /* Custom style for the profile picture */
        p img {
    max-width: 18%;
    height: 4vw;
    border-radius: 4%;
}    </style>
<?php
SESSION_START();

if (!isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

include('Chat.php');
$chat = new Chat();

if (isset($_SESSION['userid'])) {
    $userId = $_SESSION['userid'];
    $userDetails = $chat->getUserDetails($userId);

    // Display user details
    foreach ($userDetails as $user) {
        echo '<h1>User Details</h1>';
        echo '<p>Username: ' . $user['username'] . '</p>';
        echo '<p>Email: ' . $user['email'] . '</p>';
        echo '<p>Phone Number: ' . $user['phone_number'] . '</p>';
        echo '<p>Avatar: <img src="' . $user['avatar'] . '" alt="Avatar"></p>';
        
        // Add an Edit button
        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userDetailsModal">Edit</button>';
    }
} else {
    // Handle the case where the user is not logged in
    echo "<p>User not logged in.</p>";
}
?>

<!-- Example using Bootstrap modal -->
<div id="userDetailsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- User details will be displayed here -->
            </div>
  
            <div class="modal-body">
                <!-- Form to edit user details will be displayed here -->
                <form method="post" action="edit_user.php" enctype="multipart/form-data">
                    <!-- Add form fields for editing user details -->
                    <div class="form-group">
                        <label for="editUsername">New Username:</label>
                        <input type="text" class="form-control" id="editUsername" name="editUsername" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">New Email:</label>
                        <input type="email" class="form-control" id="editEmail" name="editEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="editPhoneNumber">New Phone Number:</label>
                        <input type="tel" class="form-control" id="editPhoneNumber" name="editPhoneNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="editAvatar">New Profile Picture:</label>
                        <input type="file" class="form-control" id="editAvatar" name="editAvatar">
                    </div>
                    <!-- Add other form fields as needed -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var settingsButton = document.getElementById('editUser');

        if (settingsButton) {
                $('#editUser').modal('show');
        }

    });
    $(document).ready(function () {
        $('#editButton').click(function () {
            $('#editUser').modal('hide');
            $('#editUserModal').modal('show');
        });
    });
</script>


</body>
</html>
