<?php include "includes/headed.php";?>
<?php
 if (!is_logged_in()) {
  redirect('login.php');
  $_SESSION['error_flash'] = 'You must logged in to access this page.';
} 
?>
<!-- mainhead end here -->

<body>
  <!-- container section start -->
  <section id="container" class="">


     <!--header start-->
     <?php include "includes/header2.php";?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/siderbar.php";?>
    <!--sidebar end-->
    <?php $sql = query("SELECT * FROM tbl_products WHERE delete_product = '0' ");confirm($sql);?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> PRODUCTS</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Products</li>
              <li><i class="fa fa-th-list"></i> View Products</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
        
       
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Product Table
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Image</th>
                      <th>Featured</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 0; while($row = fetch_array($sql)):
                    $no++;
                    $product_name = $row['product_name'];
                    $category_name = $row['category_id'];
                    $product_price = $row['product_price'];
                    $product_brand = $row['product_brand'];
                    $product_description = $row['product_description'];
                    $product_image = $row['product_image'];
                    $product_id = $row['product_id'];
                    $product_color = $row['product_color'];
                    $date_created = $row['date_created'];
                    ?>
                    <tr>
                      <td><?=$no;?></td>
                      <td><?=$product_name?></td>
                      <td><?=$product_price?></td>
                      <td><?=$date_created?></td>
                      <td><img src="<?=$product_image?>" alt="product_image" srcset="" width="50"></td>
                      
                      <?php
                      //for featured
                      if (isset($_GET['featured'])) {
                        $featured_id = (int)$_GET['id'];
                        $featured = (int)$_GET['featured'];
                        $featuredQuery = query( "UPDATE tbl_products SET featured = '$featured' WHERE product_id = '$featured_id' ");
                        
                      }
                      ?>


                      <td>
                      <a href="view_product.php?featured=<?=(($row['featured'] == 0)?'1':'0');?>&id=<?=$row['product_id'];?>" class="btn btn-xs btn-default "><span class="glyphicon glyphicon-<?=(($row['featured'] ==1)?'minus':'plus');?>"></span>
				                  </a>&nbsp <?=(($row['featured'] == 1)?'Featured Product':'');?>
                      </td>

                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" title="View more info" href="view=<?=$product_id?>"><i class="icon_info_alt" data-toggle="modal" data-target="#exampleModal"></i></a>
                          <a class="btn btn-default" title="Edit product" href="edit_product.php?edit=<?=$product_id?>"><i class="icon_pencil-edit_alt"></i></a> 
                          <a class="btn btn-secondary" title="Add product images" href="add_product_images.php?images=<?=$product_id?>"><i class="icon_pencil-edit_alt"></i></a>                
                         
                          <a class="btn btn-success" title="Add Product Attribute" href="product_attributes.php?attributes=<?=$product_id?>"><i class="icon_plus"></i></a>
                          <a class="btn btn-danger" title="Delete Product" href="delete/delete_product.php?delete=<?=$product_id?>"><i class="icon_close_alt2"></i></a>
                        </div>
                      </td>
                    </tr>
                   
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><center><h3><?=$product_name?></h3></center></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p><h6 style="color:black;">Description:</h6><?=$product_description;?></p>
                              <p><h6 style="color:black;">Category Name:</h6><?=$category_name?></p>
                              <p><h6 style="color:black;">Product Color:</h6><?=$product_color?></p>
                              <p><h6 style="color:black;">Product brand:</h6><?=$product_brand?></p>
                              <p><img src="<?=$product_image?>" alt="product_image" srcset="" width="100"></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal end -->




                </div>
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
    <!--main content end-->
    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
