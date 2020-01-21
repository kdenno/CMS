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
                          if(isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];
                            if($cat_title == '' || empty($cat_title)){
                              echo 'Field can not be empty';
                            

                            }else{
                              $query = "INSERT INTO categories(cat_title) ";
                              $query .= "VALUES ('{$cat_title}')";
                              $create_category_query = mysqli_query($connection, $query);
                              if(!$create_category_query){
                                die('QUERY FAILED '.mysqli_error($connection));

                              }

                            }

                          }

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
                        </div><!--add category form-->

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
                              $query = "SELECT * FROM categories";
                              $categories = mysqli_query($connection, $query);
                              ?>
                              
                                <?php 
                                while($row = mysqli_fetch_assoc($categories)) { ?>
                                <tr>
                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row['cat_title']; ?></td>
                                </tr>

                                <?php 
                              }
                                ?>
                                
                              
                            
                                
                              
                            </tbody>
                          </table>

                        </div>


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
