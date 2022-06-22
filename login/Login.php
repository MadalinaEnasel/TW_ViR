<?php
  session_start();

  if(isset($_POST['login'])){
    $connection = new mysqli('localhost','root','','users');

    $username = $connection->real_escape_string($_POST['usernamePHP']);
    $password = $connection->real_escape_string($_POST['passwordPHP']);

    $data = $connection->query("SELECT * FROM users WHERE username = '$username' AND password='$password'");
    if($data->num_rows > 0){
      $_SESSION['loggedIN'] = '1';
      $_SESSION['username'] = $_POST['usernamePHP'];
      exit('<font color="red">Login success...</font>');
    }
    else
      exit('<font color="green">Login failed...</font>');
  }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
  </head>
  <body>
    <div class="menuBar">
      <div class="left">
          <a href="../Home%20Page/home_page.php"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
          <a class="text--logo" href="../Home%20Page/home_page.php" target="_self">DailyViR</a>
  
  
      </div>
  
  </div>
    <div class="center">
      <h1>Login</h1>
      <form method="post" action="Login.php">
        <div class="txt_field">
          <input type="text" id="username" placeholder="Username...">
        </div>
        <div class="txt_field">
          <input type="password" id ="password" placeholder="Password...">
        </div>
        <input type="button" value="Login" id="login">
        <div class="signup_link">
          Not a member? <a href="../signup/Sign_up.php">Signup</a>
        </div>
      </form>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script type="text/javascript">
        $(document).ready(function (){
          $("#login").on('click', function() {
            var username = $("#username").val();
            var password = $("#password").val();
            if (username == "" || password == "")
              alert('Please check your inputs');
            $.ajax(
              {
                url:'login.php',
                method: 'POST',
                data:{
                  login: 1,
                  usernamePHP: username,
                  passwordPHP: password
                },
                success: function (response){
                  $("#response").html(response);
                  if(response.indexOf('success')>= 0)
                    window.location ='../Home Page/home_page.php';
                },
                dataType: 'text'
              }
            );
          });
        });
      </script>
    </div>
    <p id = "response"></p>
  </body>
</html>
