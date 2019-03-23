
<!-- mainhead section -->
<?php include "includes/headed.php";?>
<!-- mainhead end here -->

<body>
  <!-- container section start -->
  <section id="container" class="">
     <!--header start-->
     <?php include "includes/header2.php";?>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_profile"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="view_admin.php">View Admins</a></li>
              <li><a class="" href="view_user.php">View Users</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Product</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="add_product.php">Add Product</a></li>
              <li><a class="" href="view_product.php">View Product</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Category</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="add_category.php">Add Category</a></li>
              <li><a class="" href="view_category.php">View Category</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <?php
    
    if (isset($_GET['edit'])) {
      
      $editID = escape_string($_GET['edit']);
      $sql = query("SELECT * FROM tbl_products WHERE product_id = '$editID' ");
      confirm($sql);
      while($fetch = fetch_array($sql)){
  
        
        $product_name = escape_string($fetch['product_name']);
        $product_price = escape_string($fetch['product_price']);
        $product_color = escape_string($fetch['product_color']);
        $product_description = escape_string($fetch['product_description']);
        $target_file = escape_string($fetch['product_image']);
        $product_id = escape_string($fetch['product_id']);
        $category_id = escape_string($fetch['category_id']);
        $product_brand = escape_string($fetch['product_brand']);
        $id = escape_string($fetch['id']);
      }
  
      update_product();
      //update image
      if (isset($_POST['imgupdt'])) {
  
        $target_dir = "includes/productImages/";
    
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);		
        
        $sql = query("UPDATE tbl_products SET product_image ='$target_file' WHERE product_id = '$editID' ");
  
      }
  
    }
     
  
  ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> PRODUCTS</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Product</li>
              <li><i class="fa fa-files-o"></i>Add Product</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Product Form
              </header>
              <div class="panel-body">
              <?php addProduct();?>
                <div class="form">
                  <form class="form-validate form-horizontal"  method="post" action="" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Title <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="title" name="product_name" value="<?=$product_name?>" type="text" />
                      </div>
                    </div>
                  
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Category <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <?php $query = query("SELECT * FROM tbl_categories WHERE cat_id != '0' "); confirm($query);  ?>
                        <select  name="category_id" id="category" class="form-control">
                        <option value="<?=$category_id;?>"><?=$category_id;?></option>
                        <?php while($row = fetch_array($query)):?>
                          <option value="<?=$row['id'];?>"><?=$row['category_name'];?></option>
                        <?php endwhile;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Brand <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="brand" name="product_brand" value="<?=$product_brand;?>" type="text" />
                      </div>
                    </div>

                    
                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Color <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="color" name="product_color" value="<?=$product_color;?>"  type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Price <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="price" name="product_price" value="<?=$product_price;?>"  type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2"> Choose File <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="file" name="file" type="file" /><br>
                        <img src="<?=$target_file;?>" alt="" width="100"><br><br>
                        <button class="btn btn-xs " style="color:white; background-color:green;" href="" name="imgupdt">update</button>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Description <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea name="product_description" id="description" class="form-control"><?=$product_description;?></textarea>
                      </div>
                    </div>
                    
                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" name="edit_product" type="submit">Add Product</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
