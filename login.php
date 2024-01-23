 <?php 
SESSION_START();
include('header.php');
$loginError = '';
if (!empty($_POST['phone_number']) && !empty($_POST['pwd'])) {
	include ('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['phone_number'], $_POST['pwd']);	
	if(!empty($user)) {
		
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['userid'] = $user[0]['userid'];
		$chat->updateUserOnline($user[0]['userid'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
		$_SESSION['login_details_id'] = $lastInsertId;print_r($_SESSION);
		header("Location:index.php");
	} else {
		$loginError = "";
         echo "<script>alert('Invalid phone number or password!.');</script>";
	}
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col-sm-4 {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 25%;
        }

        h4 {
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
        }
        .form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Responsive adjustments for the input section */
@media (max-width: 768px) {
    .form-group {
        text-align: center;
    }

    label {
        margin-bottom: 5px;
    }

    input {
        width: 80%;
        margin: 0 auto;
    }
}

@media (max-width: 600px) {
    input {
        width: 100%;
    }
}

        .btn {
          
			 background-color: #25D366;
     
  color: red;
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
  position: center;
  text-align: center;
  transition: color .33s linear .5s, border-color ease-out .5s, background-color .33s linear 0s;
  white-space: pre;
  z-index: 1;
  margin-top: 30px; 


        }

        .btn:hover {
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

        a:hover {
            text-decoration: underline;
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
<div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
    <img src="img/whatapp-logo.png" height="50px" width="175px">
    </div>
  </div>
  <div class="nav-btn">
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
        <div class="row">
            <div class="col-sm-4">
                <h4>Chat Login:</h4>
                <form method="post">
                    <div class="form-group">
                        <?php if ($loginError) { ?>
                            <div class="alert alert-warning"><?php echo $loginError; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="tel" class="form-control" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-info">Login</button>
                    <div class="container">
        <p>Not a member? <a href="signup.php">Signup now</a></p>
        <p><a href="forgot_password.php">Forgot Password?</a></p>
    </div>
                </form>
            </div>
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
    </div>

   

</body>

</html>