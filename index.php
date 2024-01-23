<?php 
session_start();
include('header.php');
?>

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" type="image/x-icon" href="./img/whatsapp.png">
<title>WhatsApp Web</title>
<script src="js/chat.js"></script>
<style>
/* Add your styles here */
</style>

<div class="container">		
    <br>		
    <?php if(isset($_SESSION['userid'])) { ?> 	
        <div class="chat">	
            <div id="frame">		
                <div id="sidepanel">
                    <div id="profile">
                        <?php
                        include ('Chat.php');
                        $chat = new Chat();
                        $loggedUser = $chat->getUserDetails($_SESSION['userid']);
                        echo '<div class="wrap">';
                        $currentSession = '';
                        foreach ($loggedUser as $user) {
                            $currentSession = $user['current_session'];
                            echo '<img id="profile-img" src="'.$user['avatar'].'" class="online" alt="" />';
                            echo '<p>'.$user['username'].'</p>';
                            echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
                            echo '<div id="status-options">';
                            echo '<ul>';
                            echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
                            echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
                            echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
                            echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
                            echo '</ul>';
                            echo '</div>';
                            echo '<div id="expanded">';			
                            echo '<a href="logout.php" style="color:white">Logout </a>';
                            
                            echo '</div>';
                            
                        }
                        echo '</div>';
                        ?>
                    </div>
                    <div id="search">
                        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                        <input type="text" placeholder="Search contacts..." />					
                    </div>
                    <div id="contacts">	
                        <?php
                        echo '<ul>';
                        $chatUsers = $chat->chatUsers($_SESSION['userid']);
                        foreach ($chatUsers as $user) {
                            $status = 'offline';						
                            if($user['online']) {
                                $status = 'online';
                            }
                            $activeUser = '';
                            if($user['userid'] == $currentSession) {
                                $activeUser = "active";
                            }
                            echo '<li id="'.$user['userid'].'" class="contact '.$activeUser.'" data-touserid="'.$user['userid'].'" data-tousername="'.$user['username'].'">';
                            echo '<div class="wrap">';
                            echo '<span id="status_'.$user['userid'].'" class="contact-status '.$status.'"></span>';
                            echo '<img src="'.$user['avatar'].'" alt="" />';
                            echo '<div class="meta">';
                            echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$chat->getUnreadMessageCount($user['userid'], $_SESSION['userid']).'</span></p>';
                            echo '<p class="preview"><span id="isTyping_'.$user['userid'].'" class="isTyping"></span></p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</li>'; 
                        }
                        echo '</ul>';
                        ?>
                    </div>
                    <div id="bottom-bar">	
                        <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
                        <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
					
                    </div>
                </div>			
                <div class="content" id="content"> 
                    <div class="contact-profile" id="userSection">	
                        <?php
                        $userDetails = $chat->getUserDetails($currentSession);
                        foreach ($userDetails as $user) {										
                            echo '<img src="'.$user['avatar'].'" alt="" />';
                            echo '<p>'.$user['username'].'</p>';
                        }	
                        ?>						
                    </div>
                    <div class="messages" id="conversation">		
                        <?php
                        echo $chat->getUserChat($_SESSION['userid'], $currentSession);						
                        ?>
                    </div>
                    <div class="message-input" id="replySection">				
                        <div class="message-input" id="replyContainer">
                            <div class="wrap">
                                <input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Type a message..." />
                                <button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
                            </div>
                        </div>					
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- Add code for when the user is not logged in -->
    <?php } ?>
</div>
<script>
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
        document.addEventListener('DOMContentLoaded', function() {
        var settingsButton = document.getElementById('settings');

        if (settingsButton) {
            settingsButton.addEventListener('click', function() {
                // Redirect to profile.php
                window.location.href = 'profile.php';
                
            });
        }
    });

    </script>