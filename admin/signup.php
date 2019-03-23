<?php include "includes/login_signup_header.php"?>
<?php?>
<body class="login-img3-body">

  <div class="container">
    <center><?php adminSignUP();?></center>
    
    <form class="login-form" action="" method="post"   enctype="multipart/form-data">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="first_name" class="form-control" placeholder="Firt name" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="last_name" class="form-control" placeholder="Last name" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
          <input type="email" name="email" class="form-control" placeholder="email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <select name="admin_level" id="admin_level" class="form-control">
            <option value="">Choose Admin level</option>
            <option value="super_admin">super admin</option>
            <option value="admin">admin</option>
          </select>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_file"></i></span>
          <input type="file" name="file" class="form-control" placeholder="Choose a file">
        </div>

        <button class="btn btn-info btn-lg btn-block" name="admin_singup" type="submit">Signup</button>
        <a href="login.php" class="btn btn-primary btn-lg btn-block" type="submit">Login</a>
        
      </div>
    </form>
   
  </div>


</body>

</html>
