
<!-- mainhead section -->
<?php include "includes/headed.php";?>
<!-- mainhead end here -->
<?php $sql = query('SELECT * FROM tbl_products WHERE product_id = "'.escape_string($_GET['images']).'" '); 
confirm($sql);

$row = fetch_array($sql);
$product_id =$row['product_id'];


?>
<body>
  <!-- container section start -->
  <section id="container">
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
              <li><a class="" href="archived_attributes.php">Archive Product</a></li>
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

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> PRODUCTS </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Product Images</li>
              <li><i class="fa fa-files-o"></i>Add Product Images</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Product Images Form
              </header>
              <div class="panel-body">
              <?php addImages();?>
                <div class="form">
                  <form class="form-validate form-horizontal"  method="post" action="" enctype="multipart/form-data">

              
                      <input type="hidden" value="<?=$product_id;?>" name="product_id" >
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2"> Choose File <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="file" name="file[]" type="file" multiple="multiple" />
                      </div>
                    </div>                    
                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" name="add_images" type="submit">Add Images</button>
                        <a class="btn btn-default" href="view_product.php" type="button">Cancel</a>
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


    <?php

      $sql = query("SELECT * FROM tbl_product_images WHERE product_id = '$product_id' ");
      confirm($sql);



    ?>


        <!-- View images start -->
    <section id="main-content">
      <section class="wrapper"> 
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Atrribute Table
              </header>
              <?php while($row = fetch_array($sql)):?>
                <div class="col-md-4" style="padding-top:20px;">
                  <div class="row">
                    <div class="">

                      
                      <tr>

                        <td><img src="<?=$row['files'];?>" height="100px"></td>
                        <td><a class="btn btn-success" href="">Edit</a></td>
                      </tr>
                      

                    </div> 
                  </div>
                </div>
              <?php endwhile;?>
            </section>
          </div>
        </div>
        
        <!-- page end-->
      </section>
    </section>
    <!--Viiew Attribute End  -->


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
