<?php
include "includes/head.php";
?>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Welcome to Admin
          <small>Author</small>
        </h1>

        <div class="col-xs-6">
          <?php
         insert_categories();
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="cat_title">Add Category</label>
              <input class="form-control" type="text" name="cat_title">
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
            </div>
          </form>
          <?php
          if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
          // edit category form 
          include "includes/editcategories.php";
          }
          ?>


        </div>
        <!--add category form-->

        <div class="col-xs-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category Title</th>
              </tr>
            </thead>
            <tbody>
              <?php
              get_all_categories();
              
              ?>





            </tbody>
          </table>

        </div>
        <?php
        // delete a category
        delete_category();
        

        ?>


      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
include "includes/footer.php";
?>