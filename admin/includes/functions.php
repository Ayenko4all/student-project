<?php

/* Helper functino */




function sanitize($dirty){
  return htmlentities($dirty,ENT_QUOTES, 'UTF-8');
}

function is_logged_in(){
	if (isset($_SESSION['logged']) && $_SESSION['logged'] > 0) {
		return true;
	}
	return  false;
}


function has_permission(){
  global $conn;
  $admin = $_SESSION['admin_level'];
  //echo $admin;
  $permission = 'admin';
  $sql = query("SELECT * FROM tbl_admin WHERE admin_level = '$permission' ");
  confirm($sql);
  $result = fetch_array($sql);
  $res =  $result['admin_level'];
  
    if($res != $admin){
      //echo 'no';
    }else{
      redirect('index.php');
      $_SESSION['error_flash'] = 'ACCESS DENIED ONLY SUPER ADMIN CAN VIEW THIS PAGE.';
    }
  
}


function login_error_redirect(){
	$_SESSION['error_flash'] = 'You must logged in.';
	redirect('login.php');

}

function query($sql){
  global $conn;

  return mysqli_query($conn, $sql);
}

function confirm($result){
  global $conn;
  if (!$result) {
    die("QUERY FAILED ". mysqli_error($conn));
  }
}

function escape_string($string){
  global $conn;

  return mysqli_real_escape_string($conn, $string);
}

function fetch_array($result){
  return mysqli_fetch_array($result);
}

function redirect($location){
  header("location: $location");
}

function set_message($msg){
  if(!empty($msg)){
    $_SESSION['message'] = $msg;
  }else{
    $msg = "";
  }
}

function display_message(){
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}

function displayError($error){
  $display = '<ul class="bg-light">';
  foreach($error as $error){
    $display .= '<p class="text-danger">'.$error.'</p>';
  }
  $display .='</ul>';
  return $display;
}

/* End of helper function */


/* Backend Query */

function adminSignUP(){

  global $conn;

  $error = [];

  if (isset($_POST['admin_singup'])) {
    $first_name = escape_string($_POST['first_name']);
    $first_name = sanitize($_POST['first_name']);
    $last_name = escape_string($_POST[
    'last_name']);
     $email= escape_string($_POST['email']);
     $password = escape_string($_POST['password']);
     $confirm_password = escape_string($_POST['confirm_password']);
     $phone_number= escape_string($_POST['phone_number']);
     $admin_level= escape_string($_POST['admin_level']);
     $address = escape_string($_POST['address']);
     $hashPass = password_hash($password, PASSWORD_DEFAULT);
     $unid = md5(uniqid(rand(), true));

     /* if(empty($first_name) || empty($first_name) || empty($first_name) || empty($first_name) ){
       $error[] = "Please fill all filed";
     } */
     $required = array('first_name','last_name','email','password','confirm_password','phone_number','address','admin_level');
     foreach($required as $field){
      if($_POST[$field] == ''){
        $error[] = "Please all field are required!";
        break;
      }
     }

     //check if email already exist
     $emailQuery = query("SELECT * FROM tbl_admin WHERE email = '$email' ");
     confirm($emailQuery);
     
     $emailCount = mysqli_num_rows($emailQuery);
     if($emailCount != 0){
        $error[] = 'Email already taken';
     }

     if(strlen($password) < 6){
       $error[] = 'Password must at least be 6 characters';
     }

     if($password != $confirm_password){
       $error[] = 'Password not match';
     }

     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $error[] = 'Enter a valid email';
     }

     //file upload
     $target_dir = "includes/uploads/";
     $target_file = $target_dir . basename($_FILES["file"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     // Check if image file is a actual image or fake image
     if(isset($_POST["file"])) {
         $check = getimagesize($_FILES["file"]["tmp_name"]);
         if($check !== false) {
             $error[] = "File is an image - " . $check["mime"] . ".";
             $uploadOk = 1;
         } else {
             $error[] = "File is not an image.";
             $uploadOk = 0;
         }
     }
     // Check if file already exists
     if (file_exists($target_file)) {
         $error[] = "Sorry, file already exists.";
         $uploadOk = 0;
     }
     // Check file size
     if ($_FILES["file"]["size"] > 500000) {
         $error[] = "Sorry, your file is too large.";
         $uploadOk = 0;
     }
     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
               
     if (!empty($error)){
        echo displayError($error);
     } else {
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
      $query = query("INSERT INTO tbl_admin (admin_id,first_name,last_name,email,password,phone_number,admin_level,address,file) 
                      VALUES('$unid','$first_name','$last_name','$email','$hashPass','$phone_number','$admin_level','$address',' $target_file')");
          confirm($query);
            redirect('login.php');
           $_SESSION['success_flash'] = 'ADMIN  REGISTRATION  SUCCESSFUL.';
          
     }
  }


}

function adminLogin(){
  global $conn;
  //$error = array();
  $error = [];
  if (isset($_POST['admin_login'])) {
    $email= escape_string($_POST['email']);
    $password = escape_string($_POST['password']);

     if(empty($email) || empty($password) ){
       $error[] = "Please fill all filed";
     } 

     //check if email already exist
     $adminQuery = query("SELECT * FROM tbl_admin WHERE email = '$email' ");
     confirm($adminQuery);
     $row = fetch_array($adminQuery);
     $emailCount = mysqli_num_rows($adminQuery);
     if($emailCount < 1){
        $error[] = 'User not found';
     }

     if (!password_verify($password, $row['password'])) {
       $error[] = 'User not found';
     }

     //echo error out
     if(!empty($error)){
       echo displayError($error);
     }else {
       //login admin in
      $adminID = $row['admin_id'];
      $_SESSION['admin_level'] = $row['admin_level'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['admin_id'] = $row['admin_id'];
      $_SESSION['logged'] = true;
      $date = date("Y-m-d H:i:s");
      query("UPDATE tbl_admin SET last_login = '$date' WHERE admin_id = '$adminID' ");
      redirect('index.php');
      $_SESSION['success_flash'] = 'WELCOME  TO  ADMIN   PANEL  '.$row['first_name'];
     }
    
  }
}


function addCategory(){

  $error = [];

  if (isset($_POST['addCategory'])) {
    $category_name = escape_string($_POST['category_name']);
    $cat_level = escape_string($_POST['cat_level']);

    if ($cat_level == '' || $category_name == '') {
      $error[] = 'All field are required';
    }

    if (!empty($error)) {
      echo displayError($error);
    } else {
      $sql = query("INSERT INTO tbl_categories (cat_id,category_name) VALUES('$cat_level','$category_name')");
      confirm($sql);
      $_SESSION['success_flash'] = 'Category was added';
      redirect("view.category");
    }
  }
}

function changePassword(){

  $error = [];
  $admin  = $_SESSION['admin_id']; 
  if (isset($_POST['change_password'])) {
    $current_password = escape_string($_POST['current_password']);
    $new_password = escape_string($_POST['new_password']);
    $cpassword = escape_string($_POST['cpassword']);

    if (empty($current_password)  || empty($new_password)  || empty($cpassword)) {
      $error[] = 'All field are required';
    }
    if ($new_password != $cpassword) {
      $error[]= 'new_password not match  confirm_password';
    }
    if(strlen($new_password) < 6){
      $error[] = 'Password must at least be 6 characters';
    }
    $sql = query("SELECT * FROM tbl_admin WHERE admin_id = '$admin' ");
    confirm($sql);
    $row = fetch_array($sql);
    if (!password_verify($current_password, $row['password'])) {
      $error[] = 'Current password is not correct';
    }
    if (!empty($error)) {
      echo displayError($error);
    }else{
      $hashPass = password_hash($new_password, PASSWORD_DEFAULT);
      query("UPDATE tbl_admin SET password = '$hashPass' WHERE admin_id = '$admin' ");
      redirect("change_password.php");
      $_SESSION['success_flash'] = 'Your password was changed';
    }
  }
}


function addProduct(){

  $error = [];

  if (isset($_POST['add_product'])) {
    
    $delete_product = '0';
    $product_name = escape_string($_POST['product_name']);
    $product_price = escape_string($_POST['product_price']);
    $product_brand = escape_string($_POST['product_brand']);
    $product_description = escape_string($_POST['product_description']);
    $category_id = escape_string($_POST['product_category']);
    $product_brand = escape_string($_POST['product_brand']);
    $product_color = escape_string($_POST['product_color']);
    $delete_product = '0';

    $required = array('product_name','product_price','product_brand','product_description','product_category');
    foreach ($required  as  $value) {
      if ($_POST[$value] == '') {
        $error[] = 'All field are required';
      }
      break;
    }

    if (!is_numeric($product_price)) {
      $error[] = 'Price must be in numeric value';
    }

    //file upload
    $target_dir = "includes/productImages/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["file"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $error[] = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error[] = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $error[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        $error[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    $product_id = rand();
    if (!empty($error)) {
      echo displayError($error);
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file); 
      $sql = query("INSERT INTO tbl_products (product_id,category_id,product_name,product_price,product_brand,product_color,product_description,product_image,delete_product) VALUES('$product_id','$category_id','$product_name','$product_price','$product_brand','$product_color','$product_description','$target_file','$delete_product' ) ");
      confirm($sql);
      //redirect('view_product.php');
      $_SESSION['success_flash'] = 'Product was added';
    }


  }



}

function update_product(){


  if (isset($_POST['edit_product'])) {
      
    $editID = escape_string($_GET['edit']);
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_color = $_POST['product_color'];
    $product_description = $_POST['product_description'];
    $category_id = $_POST['category_id'];
    $product_brand = $_POST['product_brand'];

    $required = ['product_name','product_price','product_color','product_description','category_id','product_brand'];
    foreach ($required as $value) {
      if($_POST[$value] == ''){
        $error[] = "Please all field are required!";
        break;
      }
    }

    

    if (!empty($error)) {
      echo displayError($error);
    } else{
      
      $insert = query("UPDATE tbl_products SET category_id = '$category_id',  product_name = '$product_name', product_price = '$product_price', product_brand = '$product_brand', product_color = '$product_color',product_description = '$product_description' WHERE product_id = '$editID' ");
      confirm($insert);
     
      $_SESSION['success_flash'] = 'Product was updated';
       header("Location: view_product.php");
    }

  }

}

function addAttribute(){

  if(isset($_POST['add_attributes'])){

    $product_id = escape_string($_GET['attributes']);
    $sku = $_POST['sku'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
  
      foreach($sku  as $key => $val){

        if (!is_numeric($price[$key])) {
          $error[] = 'Please enter a numeric value for Price ';
        }

        if (!is_numeric($stock[$key])) {
          $error[] = 'Please enter a numeric value for Price ';
        }

        if (empty($sku[$key]) || empty($size[$key]) || empty($price[$key]) || empty($stock[$key])) {
         $error[] = 'Provide all field';
        }
        
        if (!empty($error)) {
          echo displayError($error);
        } else{

        $sql = query("INSERT INTO tbl_product_attributes (product_id,sku,price,size,stock) VALUES('$product_id','$sku[$key]','$price[$key]','$size[$key]','$stock[$key]') ");
        confirm($sql);
        }
      }
    
    
  }

}


function addImages(){

  $error = [];
  if (isset($_POST['add_images'])) {

    
    $uploadOk = 1;
    $product_id = escape_string($_GET['images']);
  
    $target_dir = "includes/addImages/";

    $extension = array("jpeg","jpg","png","gif");
  
    foreach($_FILES["file"]["tmp_name"] as $key => $val){
      
      
      $name = $target_dir.$_FILES["file"]["name"][$key];
      $temp = $_FILES["file"]["tmp_name"][$key];
      
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      if(in_array($ext, $extension) == false){
        $UploadOk = 0;
        array_push($error, $name." is invalid file type.");
      }

      if (file_exists($name) == true) {

        $error[] = "File already exit.";
        $UploadOk = 0;
        
      }

      if ($_FILES["file"]["size"][$key] > 500000) {
        $error[] = "Sorry, your file is too large.";
        $uploadOk = 0;
      }
    
     

      if (empty($_FILES["file"]["name"][$key])) {
        
        $error[] = 'Please choose a file';
      }
      
      if (!empty($error)) {

        echo displayError($error);

      }else{
         
        move_uploaded_file($temp, $name); 
      
        $sql = query("INSERT INTO tbl_product_images (product_id,files) VALUES('$product_id','$name')");
        confirm($sql);
        //$_SESSION['success_flash'] = 'Image uploaded successfully';
        //redirect("view_product.php");
      }
    }  
  }
}






















