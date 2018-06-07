<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal Login system</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <div class="register" id="box">
        <p class="head">Sign up for Free</p>
        <form class="" action="register.php" method="post">
          <div class="field">
            <input type="text" class="input" name="name" placeholder="Full name*" required value="">
          </div>
          <div class="field">
            <input type="number" class="input" name="contact" placeholder="Contact*" value="" required>
          </div>
            <div class="field">
              <input type="email" class="input" name="email" placeholder="Email*" value="" required>
            </div>
            <div class="field">
              <input type="password" class="input" name="password" placeholder="Password*" value="" required>
            </div>
            <div class="field">
              <a class="link1" href="login.php">Already have an account?</a><br>
              <button class="button-submit" type="submit" name="register">Register</button>
            </div>
        </form>
      </div>
  </body>
</html>
