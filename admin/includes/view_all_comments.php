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
          while ($row = mysqli_fetch_assoc($comments)) {
            $commentid = $row['comment_id'];
            $commentdate = $row['comment_date']; ?>
          <tr>
            <td><?php echo $commentid; ?></td>
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
            <?php 
            $commentpostid = $row['comment_post_id'];
            $responseTo = "SELECT * FROM posts WHERE post_id = $commentpostid  " ;
            $commentpost = mysqli_query($connection, $responseTo);
            while ($row = mysqli_fetch_assoc($commentpost)) { 
              $posttito = $row['post_title'];
              $postid = $row['post_id'];
              echo "<td><a href='../post.php?p_id=$postid'>$posttito</a></td>";

            }?>
            <td><?php echo $commentdate; ?></td>
            <td><a href="comments.php?approve=<?php echo $commentid; ?>">Approve</a></td>
            <td><a href="comments.php?unapprove=<?php echo $commentid; ?>">UnApprove</a></td>
            <td><a href="comments.php?delete=<?php echo $commentid; ?>">Delete</a></td>
          </tr>

          <?php
        }
          
          ?>
          
        </tbody>
        </table>
        <?php
        if(isset($_GET['delete'])) {
          $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comment WHERE comment_id = {$the_comment_id}";
        $delete_query = mysqli_query($connection, $query);
        confirm_query($delete_query);
        header("Location: comments.php");
        }

        if(isset($_GET['approve'])) {
          $the_comment_id = $_GET['approve'];
        $query = "UPDATE comment SET comment_status = 'approve' WHERE comment_id = {$the_comment_id}";
        $update_query = mysqli_query($connection, $query);
        confirm_query($update_query);
        header("Location: comments.php");
        }

        if(isset($_GET['unapprove'])) {
          $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comment SET comment_status = 'unapprove' WHERE comment_id = {$the_comment_id}";
        $update_query = mysqli_query($connection, $query);
        confirm_query($update_query);
        header("Location: comments.php");
        }
        
        ?>