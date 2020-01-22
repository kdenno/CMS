<table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>Image</th>
              <th>Tags</th>
              <th>Comments</th>
              <th>Date</th>
            </tr>
          </thead>
        
        <tbody>
          <?php 
          $query = "SELECT * FROM posts";
          $posts = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($posts)) { ?>
          <tr>
            <td><?php echo $row['post_id']; ?></td>
            <td><?php echo $row['post_author']; ?></td>
            <td><?php echo $row['post_title']; ?></td>
            <td><?php echo $row['post_category_id']; ?></td>
            <td><?php echo $row['post_status']; ?></td>
            <td><?php echo $row['post_image']; ?></td>
            <td><?php echo $row['post_tags']; ?></td>
            <td><?php echo $row['post_comment_count']; ?></td>
            <td><?php echo $row['post_date']; ?></td>
            <td><a href="posts.php?delete=<?php echo $row['post_id']; ?>">Delete</a></td>
          </tr>

          <?php
        }
          
          ?>
          
        </tbody>
        </table>
        <?php
        if(isset($_GET['delete'])) {
          $the_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
        confirm_query($delete_query);
        }
        
        ?>