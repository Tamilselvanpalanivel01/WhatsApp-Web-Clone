<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WhatsApp | Secure and Reliable Free Private Messaging and Calling</title>
  <link rel="icon" type="image/x-icon" href="./img/whatsapp.png">
  <link rel="icon" href="title.png ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--for awesome icon-->
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Navbar -->
  <div>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <div style="display: flex; align-items: center;">
          <div><img src="img/whatapp-logo.png" alt="" style="height: 34px;"></div>

        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">

            <div style="display: flex; align-items: center;">
              <div><img src="img/whatapp-logo.png" alt="" style="height: 34px;"></div>

            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body" style="margin-left: auto;">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">About</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- <a href="#" class="login-button">LOGIN <i  style="margin-left: 5px;"></i></a> -->

        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </div>
  <!-- End Navbar -->


  <div>
    <div class="alignKrish">
      <div class="hero-section row">
        <div class="display1 container d-flex fs-1 text-white flex-column custom-class-name">
          <div id="text-msg">
            <h1>Speak freely</h1>
            <h4>With end-to-end encryption, your personal messages and calls are secured. Only you and the person you're
              talking to can read or listen to them, and nobody in between, not even WhatsApp..</h4>
            <a class="login-button" id="login-buttons" onclick= "gotologin()">Login to Whatsapp web<i style=" font-size: 25px;"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <div id="login-container" style="display: none;  width: 40%;z-index: 99; left: 35%; position: absolute; top: 50%;">
    <div class="wrapper">
      <header>Login</header>
      <form action="wa/index.php">
        <div class="field phone">
          <div class="input-area">
            <input type="text" id="phn" placeholder="Phone Number">
            <i class="icon fas fa-phone"></i>

            <i class="error error-icon fas fa-exclamation-circle"></i>
          </div>
          <div class="error error-txt">Phone number can't be blank</div>
        </div>

        <div class="field password">
          <div class="input-area">
            <input type="password" id="logpass" placeholder="Password">
            <i class="icon fas fa-lock"></i>
            <i class="error error-icon fas fa-exclamation-circle"></i>
          </div>
          <div class="error error-txt">Password can't be blank</div>
        </div>
        <div class="pass-txt"><a href="#">Forgot password?</a></div>
        <input type="submit" value="Login" id="gotoweb">
      </form>
      <div class="sign-txt">Not yet member? <a id="logtosignup">Signup now</a></div>
    </div>
  </div>
  </div>
  <div class="container" id="signupContainer"
    style="display: none;width: 40%;z-index: 99; left: 35%; position: absolute; top: 18%;">

    <form action="#" id="newSignupForm">
      <div class="header">
        <span><b>Create Your Account</b></span>
      </div>
      <div class="new-form-control">
        <label>Username</label>
        <input type="text" placeholder="New Username" id="new-username">
     

        <small class="error-message">Error Message</small>
      </div>
      <div class="new-form-control">
        <label>Email</label>
        <input type="text" placeholder="New Email" id="new-email">
      

        <small class="error-message">Error Message</small>
      </div>
      <div class="new-form-control">
        <label>Phone Number</label>
        <input type="tel" placeholder="New Phone Number" id="new-phone-number">
        
        <small class="error-message">Error Message</small>
      </div>

<div class="new-form-control">
  <label>Profile Picture</label>
  <input type="file" id="profile-picture" accept="image/*">
 
  <small class="error-message">Error Message</small>
</div>

      <div class="new-form-control">
        <label>New Password</label>
        <input type="password" placeholder="New Password" id="new-password" autocomplete="off">
        <div class="new-password-validation"></div>
       
        <button id="new-show-password" class="fa-solid fa-eye" type="button"></button>
        <small class="error-message">Error Message</small>
      </div>

      <div class="new-form-control">
        <label>Confirm Password</label>
        <input type="password" id="new-re-password" placeholder="Re-enter Password" autocomplete="off">
        <div class="new-password-validation"></div>
  
        <small class="error-message">Error Message</small>
      </div>

      <div class="new-form-control">
      <button id="submitButton" class="new-send-button" type="submit">Submit</button>

      </div>
      <div class="create-account">
        <span>Already have an account? <a href="#" id="showLoginContainer">Click here</a></span>
      </div>
    </form>

  </div> -->

  <div class="content_body">
    <div class="upper_content">

      <div class="simple_intro">
        <h2>Simple. Secure.<br>Reliable messaging.</h2>
        <p>
          With WhatsApp, you'll get fast, simple, secure messaging
          and calling for free*, available on
          phones all over the world.
          <br>
          <br>
          <span id="highlight_detail">
            * Data charges may apply. Contact your provider for details.
          </span>
        </p>

        <ul class="details_list">
          <li><a href="#"><i class="fab fa-android"></i> &nbsp Android</a></li>
          <li><a href="#"><i class="fab fa-apple"></i> &nbsp Iphone</a></li>
          <li><a href="#"><i class="fas fa-desktop"></i> &nbsp Mac or Windows PC</a></li>
          <li><a href="#"><i class="fab fa-windows"></i> &nbsp Windows Phone</a></li>
        </ul>
      </div>
      <div class="mobile_image">
        <img src="./img/mobile.png" alt="Mobile Whatsapp">
      </div>
    </div>
  </div>

  <div class="content_body">
    <div class="upper_content">

      <div class="simple_intro">
        <h1>Never miss a <br>moment with <br>voice and video<br> calls</h1>
        <p>
          From a group call to classmates to a quick call with mom, feel like you’re in the same room with voice and
          video calls.
          <br>
          <br>

        </p>
      </div>
      <div class="mobile_image">
        <img src="./img/mobile 3.png" alt="Mobile Whatsapp">
      </div>
    </div>

    <div class="lower_content">

      <div class="lower_first">

        <h2>WhatsApp Business App</h2>
        <p>
          <a href="#" class="marked_business">WhatsApp Business</a> is an
          Android app which is free to download, and was built with the small
          business owner in mind. With the app, businesses can interact with customers easily by using
          tools to automate, sort, and quickly respond to messages. If you're a large business,<a href="#"
            class="marked_business"> learn more
            about the WhatsApp Business API</a>.
        </p>
        <br>
        <img src="./img/mobile 2.png" alt="image of mobile">
      </div>
    </div>

    <div class="lower_second">
      <div class="animated_box">
        <div id="box_animation">
          <p>Hello!<i class="fas fa-grin-hearts"></i></p>
        </div>
      </div>

      <p>END-TO-END ENCRYPTION</p>
      <h2>Security By Default</h2>
      <p>
        Some of your most personal moments are shared on WhatsApp, which is why we built end-to-end
        encryption into the latest versions of our app. When end-to-end encrypted, your messages and
        calls are secured so only you and the person you're communicating with can read or listen to
        them, and nobody in between, not even WhatsApp.
      </p>
    </div>

    <div class="content_body">
      <div class="upper_content">
        <div class="simple_intro">
          <h1>Transform<br> your business</h1>
          <p>
            WhatsApp Business helps you reach your customers globally to deliver compelling experiences at scale.
            Showcase your products and services, increase sales, and build relationships all with WhatsApp.
          </p>
        </div>
        <div class="mobile_image">
          <img src="./img/mobile 4.png" alt="Mobile Whatsapp">
        </div>
      </div>
      <div class="separation-line" id="security"></div>
          
      <section class="security-section">
          <div class="container-fluid">
              <div class="row align-items-center justify-content-center">
                  <h1>Security</h1>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="cards">
                          <figure>
                              <img src="img/icons-security-1.svg" alt="security icon">
                              <p><strong>Speaky freely</strong></p>
                              <figcaption>WhatsApp's call feature allows you to talk to your friends and family, even if they are in another country. Like your messages.</figcaption>
                          </figure>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="cards">
                          <figure>
                              <img src="img/icons-security-2.svg" alt="lock icon">
                              <p><strong>Be yourself</strong></p>
                              <figcaption>WhatsApp allows you to verify that the calls you make and the messages you send are protected with end-to-end encryption.</figcaption>
                          </figure>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="cards">
                          <figure>
                              <img src="img/icons-security-3.svg" alt="message icon">
                              <p><strong>Messages that stay with you</strong></p>
                              <figcaption>We believe that your messages should be in your hands only. Therefore.</figcaption>
                          </figure>
                      </div>
                  </div>
              </div>
          </div>
      </section>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- <script src="ajaxdata.js"></script> -->

<script src="js/chat.js"></script>
<script>
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
    </script>
</body>

</html>