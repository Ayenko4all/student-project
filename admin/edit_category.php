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
    <?php include "includes/siderbar.php";?>
    <!--sidebar end-->
  <?php
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = query("SELECT * FROM tbl_categories WHERE id = '$id' ");
    confirm($query);
    $row = fetch_array($query);
    $mainCatName = $row['category_name'];
    $mainId = $row['id'];
    $mainCatid = $row['cat_id'];

    $sql = query("SELECT * FROM tbl_categories WHERE id = '$id' AND cat_id != '0' ");
    confirm($sql);
    $row2 = fetch_array($sql);
    $rowfetchName = $row2['category_name'];
    $rowId = $row2['id'];
    $rowfetchId = $row2['cat_id'];

    $sql2 = query("SELECT * FROM tbl_categories WHERE id = '$rowfetchId' ");
    confirm($sql2);
    $row3 = fetch_array($sql2);
    $fetchName = $row3['category_name'];
    $fetchId = $row3['id'];
    $fetchCatId = $row3['cat_id'];

    if (isset($_POST['editCat'])) {
     
      $category_name = escape_string($_POST['category_name']);
      $cat_level = escape_string($_POST['cat_level']);
  
      $insertSql = query("UPDATE tbl_categories SET category_name = '$category_name', cat_id = '$cat_level' WHERE id = '$id' ");
      confirm($insertSql);
      
    }
  }
  
  


  ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Title</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Form Title</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Title
              </header>
              <div class="panel-body">
             
                <div class="form">
                  <form class="form-validate form-horizontal " method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Category name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="category_name" name="category_name" value="<?=$mainCatName;?>" type="text" />
                      </div>
                    </div>
                   <?php if( $rowfetchId):?>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Parent Level <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <?php $catSql = query("SELECT * FROM tbl_categories WHERE cat_id = '0' "); confirm($catSql);  ?>
                        <select name="cat_level" id="cat_level" class="form-control">
                        <option value="<?=$fetchId?>"><?=$fetchName;?></option>
                          <?php while($row = fetch_array($catSql)):
                            $mainCat_id = $row['id'];
                            $mainCat_name = $row['category_name'];
                            ?>
                          <option value="<?=$mainCat_id;?>"><?=$mainCat_name;?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                    </div>
                    <?php endif;?>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" name="editCat" type="submit">Add Category</button>
                      <a class="btn btn-default" href="view_category.php">Cancle</a>
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
