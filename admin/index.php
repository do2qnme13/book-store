<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <div class="login">

  <h1>LOGIN</h1>

    <?php

    if(isset($_POST['submit'])){
      $username = $_POST['name'];
      $password = $_POST["pwd"];

      if($username=="" || $password == "") {
        echo "<p style=\"color: red; text-align: center; margin-left:-15px\"
        >Please fill username or password</p>";
      }else {
        if($username == 'admin' && $password == "admin123"){
          header("location:home.html");
        }else {
          echo "<p style = \"color:red; text-align: center; margin-left: -15px/\">Incorrect username or password!</p>";
        }
      }
    }


    ?>



    <form method="post">
      <div class="username">
        <label for="name">Username</label>
        <input type="text" name="name" placeholder="Enter Username">
      </div>
      <div class="password">
        <label for="pwd">Password</label>
        <input type="password" name="pwd" placeholder="Enter Password">
      </div>
      <input class="submit-btn" type="submit" name="submit" value="Login">
    </form>
  </div>
</body>
</html>