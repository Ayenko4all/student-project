
<!-- mainhead section -->
<?php include "includes/headed.php" ?>
<?php
 if (!is_logged_in()) {
  redirect('login.php');
  $_SESSION['error_flash'] = 'You must logged in to access this page.';
  } 
    $error = [];
    $product_id = escape_string($_GET['attributes']);
    $sel = query("SELECT * FROM tbl_products WHERE product_id = '$product_id' ");
    confirm($sel);
    $row = fetch_array($sel);
    $product_name = $row['product_name']; 

    addAttribute();

?>
<!-- mainhead end here -->

<body>
  <!-- container section start -->
  <section id="container" class="">


     <!--header start-->
     <?php include "includes/header2.php" ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/siderbar.php" ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> PRODUCTS</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Product Attributes</li>
              <li><i class="fa fa-files-o"></i>Add Product Attributes</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Product Attributes Form
              </header>
              <div class="panel-body">
              
                <div class="form">
                  <form class="form-validate form-horizontal" name="add_attribute" id="add_attribute" method="POST" action="">
                  
                       
                          <input class=" form-control" id="title" value="<?=$product_name;?>"  name="product_name" type="text" readonly/><br>
                       

                   <div class="field_wrapper">
                   <div>
                      <input     type="text" name="sku[]" id="sku" value="" placeholder="Sku" style="width:120px;" />
                      <input    type="text" name="size[]" id="size" value="" placeholder="Size" style="width:120px;" />
                      <input    type="text" name="price[]" id="price" value="" placeholder="price" style="width:120px;" />
                      <input    type="text" name="stock[]" id="stock" value="" placeholder="Stock" style="width:120px;" />
                      <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                  </div>
                   
                   </div><br>
                    
                        <button class="btn btn-primary"  name="add_attributes" type="submit">Add Attribute</button>
                        <a class="btn btn-default" href="view_product.php">Cancle</a>
                        
                     
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

      $sql = query("SELECT * FROM tbl_product_attributes WHERE product_id = '$product_id' ");
      confirm($sql);



    ?>
    <!-- View Attribute start -->
    <section id="main-content">
      <section class="wrapper"> 
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Atrribute Table
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Sku</th>
                      <th>Price</th>
                      <th>Size</th>
                      <th>Stock</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no =0; while($attr = fetch_array($sql)): $no++;?>
                    <tr>
                      <td><?=$no;?></td>
                      <td> <input type="text" name="sku" value="<?=$attr['sku'];?>" style="width:80px" class="form-control"></td>
                      <td> <input type="text" name="price" value="<?=$attr['price'];?>"style="width:80px" class="form-control"></td>
                      <td> <input type="text" name="size" value="<?=$attr['size'];?>" style="width:80px" class="form-control"></td>
                      <td> <input type="text" name="stock" value="<?=$attr['stock'];?>" style="width:80px" class="form-control"></td>
                      <td>
                        <div class="btn-group">
                        <button class="btn btn-success" title="Update Attribute"><i class="icon_close_alt2"></i></button>
                          <a class="btn btn-danger" title="Delete Attribute" href="product_attribute.php?delete=<?=$attr['id'];?>"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php endwhile;?>
                  </tbody>
                </table>
              </div>
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
