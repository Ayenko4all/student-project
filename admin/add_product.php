
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
                        <input class=" form-control" id="title" name="product_name" type="text" />
                      </div>
                    </div>
                  
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Category <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <?php $query = query("SELECT * FROM tbl_categories WHERE cat_id != '0' "); confirm($query);  ?>
                        <select  name="product_category" id="category" class="form-control">
                        <option value="">Choose Category</option>
                        <?php while($row = fetch_array($query)):?>
                          <option value="<?=$row['id'];?>"><?=$row['category_name'];?></option>
                        <?php endwhile;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Brand <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="brand" name="product_brand" type="text" />
                      </div>
                    </div>

                    
                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-2">Color <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="color" name="product_color" type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Price <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="price" name="product_price" type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2"> Choose File <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="file" name="file" type="file" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Description <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea name="product_description" id="description" class="form-control"></textarea>
                      </div>
                    </div>
                    
                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" name="add_product" type="submit">Add Product</button>
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
