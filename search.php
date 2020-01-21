<?php
include "includes/db.php";
include "includes/header.php";
?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- Blog Posts -->
            <?php
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
              $all_tags = mysqli_query($connection, $query);
              $count = mysqli_num_rows($all_tags);
              if ($count == 0) {
                echo 'No data found for '.$_POST['search'];
              }else {
                while ($row = mysqli_fetch_assoc($all_tags)) { ?>

                  <h2>
                      <a href="#"><?php echo $row['post_title']; ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="index.php"><?php echo $row['post_author']; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date']; ?> at 10:00 PM</p>
                  <hr>
                  <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                  <hr>
                  <p><?php echo $row['post_content']; ?></p>
                  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <hr>
  
              <?php
              }
              

              }
            }
            ?>
            
           
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php
    include "includes/footer.php"
    ?>