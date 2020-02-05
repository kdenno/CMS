<table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Comment</th>
              <th>Email</th>
              <th>Status</th>
              <th>In Response To</th>
              <th>Date</th>
              <th>Approve</th>
              <th>Unapprove</th>
              
              <th>Delete</th>
            </tr>
          </thead>
        
        <tbody>
          <?php 
          $query = "SELECT * FROM comment";
          $comments = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($comments)) { ?>
          <tr>
            <td><?php echo $row['comment_id']; ?></td>
            <td><?php echo $row['comment_author']; ?></td>
            <td><?php echo $row['comment_content']; ?></td>
          <!-- <td><?php $cat_query = "SELECT * FROM categories WHERE cat_id = {$row['post_category_id']}";
          $cats = mysqli_query($connection, $cat_query);
          while ($catrow = mysqli_fetch_assoc($cats)) {
            $cat_id = $catrow['cat_id'];
            $cat_title = $catrow['cat_title'];

          }
          echo $cat_title; ?></td> -->
        
            <td><?php echo $row['comment_email']; ?></td>
            <td><?php echo $row['comment_status']; ?></td>
            <td></td>
            <td><?php echo $row['comment_date']; ?></td>
            <td><a href="posts.php?source=edit_post&p_id=<?php echo $row['comment_id']; ?>">Approve</a></td>
            <td><a href="posts.php?delete=<?php echo $row['comment_id']; ?>">UnApprove</a></td>
            <td><a href="posts.php?delete=<?php echo $row['comment_id']; ?>">Delete</a></td>
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