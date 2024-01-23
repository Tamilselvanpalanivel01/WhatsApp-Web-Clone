<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="icon" type="image/x-icon" href="./img/whatsapp.png">
    <style>
        .nav {
    height: 60px;
    width: 100%;
    background-color: white;
    position: relative;
  }

  .nav > .nav-header {
    display: inline;
  }

  .nav > .nav-header > .nav-title {
    display: inline-block;
    font-size: 22px;
    color: #fff;
    padding: 10px 10px 10px 10px;
  }

  .nav > .nav-btn {
    display: none;
  }

  .nav > .nav-links {
    display: inline;
    float: right;
    font-size: 18px;
  }

  .nav > .nav-links > a {
    display: inline-block;
    padding: 13px 10px 13px 10px;
    text-decoration: none;
    color: #000000;
  }

  .nav > .nav-links > a:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }

  .nav > #nav-check {
    display: none;
  }

  @media (max-width: 600px) {
    .nav > .nav-btn {
      display: inline-block;
      position: absolute;
      right: 0px;
      top: 0px;
    }
    .nav > .nav-btn > label {
      display: inline-block;
      width: 50px;
      height: 50px;
      padding: 13px;
    }
    .nav > .nav-btn > label:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }
    .nav > #nav-check:not(:checked) ~ .nav-links {
      display: none;
    }
    .nav > #nav-check:checked ~ .nav-links {
      display: block;
    }
    .nav > .nav-links {
      display: block;
      width: 100%;
      text-align: center;
    }
    .nav > .nav-links > a {
      display: block;
      width: 100%;
      text-align: center;
    }
  }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            margin-bottom: 0; /* Prevent double margin */
        }

        input[type="submit"] {
            background-color: #25D366;
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border: 1px solid #1c1e21;
  border-radius: 50px;
  color: #1c1e21;
  line-height: 16px;
  overflow: hidden;
  padding: 16px 28px;
  position: relative;
  text-align: center;
  transition: color .33s linear .5s, border-color ease-out .5s, background-color .33s linear 0s;
  white-space: pre;
  z-index: 1;
  margin-top: 30px;
}

        input[type="submit"]:hover {
            background-color: #32CD32;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #32CD32;
            text-decoration: none;
        }
        footer {
  background-color: rgb(39, 52, 67);
  position: relative;
  top: 80px;
  width: 101%;
  left: -8px;
}

footer ul {
  list-style: none;
}

.bottom_options {
  display: flex;
  width: 80%;
  line-height: 25px;
  justify-content: space-evenly;
  margin: auto;
}

.bottom_options h4 {
  text-transform: uppercase;
  color: rgba(255, 255, 255, .6);
  font-size: 15px;
}

footer a {
  color: white;
  font-size: 14px;
}

footer a:hover {
  text-decoration: underline;
}

.bottom_line {
  background-color: rgb(36, 46, 58);
  width: 100%;
}

.bottom_line p {
  display: inline-block;
  color: rgba(255, 255, 255, .6);
}

.bottom_line p:nth-of-type(odd) {
  margin-left: 22%;
}

.bottom_line p:nth-of-type(even) {
  margin-left: 8.2%;
}
@media (max-width: 768px) {
    .bottom_options {
        flex-direction: column;
        text-align: center;
    }

    .bottom_options ul {
        margin-bottom: 20px;
    }

    .bottom_options h4 {
        margin-bottom: 10px;
    }

    .bottom_line p {
        display: block;
        text-align: center;
        margin: 8px 0;
    }
}

@media (max-width: 600px) {
    .bottom_options {
        width: 100%;
    }
}
    </style>
</head>
<body>

<?php

if (isset($_POST["submit"])) {
    $targetDirectory = "userpics/";
    $targetFile = $targetDirectory . basename($_FILES["avatar"]["name"]);

    $username = $_POST["fname"];
    $email = $_POST["email"];
    $phone_number = $_POST['phone_number'];
    $password = $_POST["password"];

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 1;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, file already exists.');</script>";
        $uploadOk = 0;
    }

    // Check file size (you can adjust this value)
    if ($_FILES["avatar"]["size"] > 5000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can add more if needed)
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    } else {

        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {

            $servername = "localhost";
            $username_db = "root";
            $password_db = "";
            $dbname = "whatsapp";

            try {
                $conn = new PDO("mysql:host=$servername;port=3307;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Check if the user already exists in the database
                $stmt_check_user = $conn->prepare("SELECT COUNT(*) FROM chat_users WHERE username = :username OR email = :email OR phone_number = :phone_number");
                $stmt_check_user->bindParam(':username', $username);
                $stmt_check_user->bindParam(':email', $email);
                $stmt_check_user->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
                $stmt_check_user->execute();

                $user_exists = $stmt_check_user->fetchColumn();

                if ($user_exists > 0) {
                    echo "<script>alert('User with the same username, email, or phone number already exists. Please use different credentials.');</script>";
                } else {
                    // Insert user information into the database
                    $stmt = $conn->prepare("INSERT INTO chat_users (username, email, phone_number, password, avatar) 
                    VALUES (:username, :email, :phone_number, :password, :avatar)");

                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':avatar', $targetFile);
                    $stmt->execute();

                    echo "<script>alert('User registered successfully.');</script>";

                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            } finally {
                // Close the statement
                $stmt_check_user = null;

                // Close the database connection
                $conn = null;
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}
?>


 <div class="nav">
        <div class="nav-header">
            <div class="nav-title">
                <img src="img/whatapp-logo.png" height="50px" width="160px">
            </div>
        </div>
        <div class="nav-btn">
            <input type="checkbox" id="nav-check">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="#">Features</a>
            <a href="#">Contact</a>
            <a href="#">About</a>
        </div>
    </div>


<div class="container">
    <h2>Create Account</h2>
    <form method="post" enctype="multipart/form-data" autocomplete="on" >
        <label for="fname">Username:</label>
        <input type="text" id="fname" name="fname" required autocomplete="given-name">
        <div id="fname-error" class="error-message"></div>

       
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required autocomplete="email">
        <div id="email-error" class="error-message"></div>
       
        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number"  title="Please enter a valid 10-digit phone number">
        <div id="phone_number-error" class="error-message"></div>

        <label for="avatar">Profile Picture</label>
        <input type="file" id="avatar" name="avatar" accept="image/*" required autocomplete="on">
        <div id="avatar-error" class="error-message"></div>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required autocomplete="new-password">
        <div id="password-error" class="error-message"></div>

        <input type="submit" name="submit" value="Submit" onsubmit="return validateForm()">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>
<footer>
      <br>
      <div class="bottom_options">
        <ul>
          <h4>whatsapp</h4>
          <li><a href="#">Features</a></li>
          <li><a href="#">Security</a></li>
          <li><a href="#">Download</a></li>
          <li><a href="#">WhatsApp Web</a></li>
          <li><a href="#">business</a></li>
        </ul>
        <ul>
          <h4>company</h4>
          <li><a href="#">About</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Brand Center</a></li>
          <li><a href="#">Get In Touch</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
        <ul>
          <h4>download</h4>
          <li><a href="#">Mac/PC</a></li>
          <li><a href="#">Android</a></li>
          <li><a href="#">iPhone</a></li>
          <li><a href="#">Windows
              Phone</a></li>
          <li><a href="#">Nokia</a></li>
        </ul>
        <ul>
          <h4>help</h4>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Twiter</a></li>
          <li><a href="#">Facebook</a></li>
        </ul>
      </div>
      <div class="bottom_line">
        <p>2023 &copy; WhatsApp Inc</p>
        <p><a href="#"> Privacy &amp; Terms</a></p>
      </div>
    </footer>
    <script>
    function validateForm() {
        // Reset previous error messages
        resetErrors();

        // Validate each field
        if (!validateName('fname')) return false;
        if (!validateName('lname')) return false;
        if (!validateEmail('email')) return false;
        if (!validatePhoneNumber('phone_number')) return false;
        if (!validateFile('avatar')) return false;
        if (!validatePassword('password')) return false;

        // Perform AJAX submission
        submitForm();

        // Prevent default form submission
        return false;
    }

    function resetErrors() {
        // Clear previous error messages
        var errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(function (element) {
            element.textContent = '';
        });
    }

    function validateName(fieldName) {
        var nameInput = document.getElementById(fieldName);
        var nameError = document.getElementById(fieldName + '-error');
        var nameRegex = /^[A-Za-z]+$/;

        if (!nameInput.value.match(nameRegex)) {
            nameError.textContent = 'Invalid ' + fieldName + '. Use only letters.';
            return false;
        }

        return true;
    }

    function validateEmail(emailField) {
        var emailInput = document.getElementById(emailField);
        var emailError = document.getElementById(emailField + '-error');
        var emailRegex = /^\S+@\S+\.\S+$/;

        if (!emailInput.value.match(emailRegex)) {
            emailError.textContent = 'Invalid email address.';
            return false;
        }

        return true;
    }

    function validatePhoneNumber(phoneField) {
        var phoneInput = document.getElementById(phoneField);
        var phoneError = document.getElementById(phoneField + '-error');

        if (phoneInput.validity.patternMismatch) {
            phoneError.textContent = 'Please enter a valid 10-digit phone number.';
            return false;
        }

        return true;
    }

    function validateFile(fileField) {
        var fileInput = document.getElementById(fileField);
        var fileError = document.getElementById(fileField + '-error');

        if (fileInput.files.length === 0) {
            fileError.textContent = 'Please choose a file.';
            return false;
        }

        return true;
    }

    function validatePassword(passwordField) {
        var passwordInput = document.getElementById(passwordField);
        var passwordError = document.getElementById(passwordField + '-error');

        // Add password validation logic here
        // For example, check if it meets certain criteria

        return true;
    }

    function submitForm() {
        // Get form data
        var formData = new FormData(document.getElementById('signupForm'));

        // Create and configure an XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        // Define the function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Handle success (e.g., show a success message)
                        alert(response.success);
                    } else {
                        // Handle errors (e.g., display error messages)
                        alert(response.error);
                    }
                }
            }
        };

        // Send the form data
        xhr.send(formData);
    }
</script>

</body>
</html>
