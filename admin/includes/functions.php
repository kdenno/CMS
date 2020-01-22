<?php
function confirm_query($result) {
  global $connection;
  if(!$result) {
    die('QUERY FAILED '. mysqli_error($connection));

  }

}
function insert_categories()
{
  global $connection;
  if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    if ($cat_title == '' || empty($cat_title)) {
      echo 'Field can not be empty';
    } else {
      $query = "INSERT INTO categories(cat_title) ";
      $query .= "VALUES ('{$cat_title}')";
      $create_category_query = mysqli_query($connection, $query);
      if (!$create_category_query) {
        die('QUERY FAILED ' . mysqli_error($connection));
      }
    }
  }
}
function get_all_categories()
{
  global $connection;
  $query = "SELECT * FROM categories";
  $categories = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($categories)) { ?>
    <tr>
      <td><?php echo $row['cat_id']; ?></td>
      <td><?php echo $row['cat_title']; ?></td>
      <td><a href="categories.php?delete=<?php echo $row['cat_id']; ?>">Delete</a></td>
      <td><a href="categories.php?edit=<?php echo $row['cat_id']; ?>">Edit</a></td>
    </tr>

<?php
  }
}

function delete_category() {
  global $connection;
  if (isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$cat_id} ";
    $delete_query = mysqli_query($connection, $query);
    // refresh page
    header("Location: categories.php");
  }
}
?>