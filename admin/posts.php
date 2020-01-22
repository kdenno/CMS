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
        <?php
        // get tables
        $source = '';
        if(isset($_GET['source'])) {
          $source = $_GET['source'];

        }
        switch($source) {
          case 'addpost';
          
          include "includes/addpost.php";
        break;
        default;
        include "includes/view_all_posts.php";

        }
        
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