<!DOCTYPE html>
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
      <form action="../includes/signup.inc.php" method="post">
        <div class="txt_field">
          <input type="uid" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="email" required>
            <span></span>
            <label>Email</label>
          </div>
        <div class="txt_field">
          <input type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="first_name" required>
            <span></span>
            <label>First name</label>
          </div>
          <div class="txt_field">
            <input type="last_name" required>
            <span></span>
            <label>Last name</label>
          </div>
          <div class="txt_field">
            <input type="country" required>
            <span></span>
            <label>Country</label>
          </div>
          <div class="txt_field">
            <input type="gender" required>
            <span></span>
            <label>Gender</label>
          </div>
          <button class ="submitbutton" type="submit" name ="submit">Sign up</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    <script type="text/javascript">
    </script>
  </body>
</html>
