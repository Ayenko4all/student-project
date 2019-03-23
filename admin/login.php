<?php include "includes/login_signup_header.php"?>


      <center>
      <?php adminLogin(); ?>
      </center> 
    <form class="login-form" method="post">
    
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mail"></i></span>
          <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" name="admin_login" type="submit">Login</button>
        <a href="signup.php" class="btn btn-info btn-lg btn-block" type="submit">Signup</a>
      </div>
    </form>
   
  </div>


</body>

</html>
