<?php

  if(isset($_POST['signup'])){
    $connection = new mysqli('localhost','root','','users');

    $username = $connection->real_escape_string($_POST['usernamePHP']);

    $data = $connection->query("SELECT * FROM users WHERE username = '$username'");

    if($data->num_rows > 0){
      echo("This user already exists!");
      exit('<font color="red">User already exists...</font>');
    }
    else
    {
      $_SESSION['loggedIN'] = '1';
      $_SESSION['username'] = $username;
      echo("Creating user");
      $password = $connection->real_escape_string($_POST['passwordPHP']);
      $email = $connection->real_escape_string($_POST['emailPHP']);
      $first_name = $connection->real_escape_string($_POST['firstnamePHP']);
      $last_name = $connection->real_escape_string($_POST['lastnamePHP']);
      $country = $connection->real_escape_string($_POST['countryPHP']);
      $gender = $connection->real_escape_string($_POST['genderPHP']);

      $data2 = $connection->query("INSERT INTO users (`username`, `password`, `first_name`, `last_name`, `email`, `country`, `gender`) VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$country', '$gender');");
      exit('<font color="green">User created...</font>');
    }
  }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Sign_up.css">
  </head>
  <body>
    <div class="menuBar">
      <div class="left">
          <a href="../Home%20Page/home_page.html"><img class="logo" src="camera.png" alt="The src doesn't exist"></a>
          <a class="text--logo" href="../Home%20Page/home_page.html" target="_self">DailyViR</a>
  
          <div role="search" class="search">
              <label for="search"> </label><input type="search"  id="search" name="search" placeholder="Search...">
              <a href="../Home%20Page/home_page.html"><img src="search.png" class="search__icon" alt="The src doesn't exist"></a>
          </div>
  
          <a><img src="menu.png" class="menu__icon" alt="The src doesn't exist"></a>
  
  
      </div>
  
      <div class="right">
  
          <a href="user_profile.html"><img src="image.png" class="profile-account" alt="The src doesn't exist"></a>
  
          <a href="notifications.html"><img src="notifications.png" class="notifications__icon"
                                            alt="The src doesn't exist"></a>
  
          <a href="../Upload%20Video/upload_video.html"><img src="upload_video.png" class="upload__icon"
                                                             alt="The src doesn't exist"></a>
  
          <a class="trendingButton" href="../Trending/trending.html" target="_self">Trending</a>
  
      </div>
  </div>
    <div class="center">
      <h1>Sign up</h1>
      <form action="sign_up.php" method="post">
        <div class="txt_field">
          <input type="text" id="username" placeholder="Username...">
        </div>
        <div class="txt_field">
            <input type="text" id="email" placeholder="Email...">
        </div>
        <div class="txt_field">
          <input type="password" id ="password" placeholder="Password...">
        </div>
        <div class="txt_field">
            <input type="text" id="first_name" placeholder="First name...">
        </div>
        <div class="txt_field">
            <input type="text" id="last_name" placeholder="Last name...">
        </div>
        <div class="txt_field">
            <input type="text" id="country" placeholder="Country...">
        </div>
        <div class="txt_field">
            <input type="text" id="gender" placeholder="Gender...">
        </div>
        <input type="button" value="Signup" id="signup">
      </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function (){
          $("#signup").on('click', function() {
            var username = $("#username").val();
            var password = $("#password").val();
            var email = $("#email").val();
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var country = $("#country").val();
            var gender = $("#gender").val();

            if (username == "" || password == "" || email == "" || first_name == "" || last_name == "" || country == "" || gender == "")
              alert('Please check your inputs');
            $.ajax(
              {
                url:'sign_up.php',
                method: 'POST',
                data:{
                  signup: 1,
                  usernamePHP: username,
                  passwordPHP: password,
                  emailPHP: email,
                  firstnamePHP: first_name,
                  lastnamePHP: last_name,
                  countryPHP: country,
                  genderPHP: gender
                },
                success: function (response){
                  $("#response").html(response);
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
