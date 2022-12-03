<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    </head>
    
    <body>

    <img src="images/bg.png" alt="" class="bg_img_index">

<?php
 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>



<div class="container">
    <div class="row">
        <h2>OLLC WEB-BASE LIBRARY APPLICATION</h2>
        <div class="login_btn_wrapper">
            <button id="loginBtn" class="activeBtn">Login</button>
            <button id="loginBtnAdmin">Login Admin</button>
        </div>
        
        <div class="error_msg">
            <h4><?php echo $msg?></h4>
        </div>
        <div class="student_form">
            <form action="login_server_page.php" method="get">
                
                <input type="text" name="login_email" placeholder="Your Email" required/>

                <br>

                <input type="password" name="login_pasword"  placeholder="Your Password" required/>
                
                
                <input type="submit" class="btnSubmit" value="Login" />

                <br>

                <a href="create_acc.php">Sign up</a>
            </form>
        </div>

        <div class="admin_form">
            <form action="loginadmin_server_page.php" method="get">
                
                <input type="text" name="login_email" placeholder="Your Email " />

                <br>

                <input type="password" name="login_pasword"  placeholder="Your Password " />
                
                <br>

                <input type="submit" class="btnSubmit" value="Login" />
                
            </form>
        </div>
    </div>
</div>



        



        <script src="" async defer></script>
        <script src="js/index.js"></script>
    </body>
</html>