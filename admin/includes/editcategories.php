<?php
// Edit Category
$cat_to_edit = "";

  $query = "SELECT * FROM categories WHERE cat_id = {$cat_id} ";
  $edit_query = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($edit_query)) {
    $cat_to_edit = $row['cat_title'];
  }

if(isset($_POST['update_cat'])) {
  $cat_title = $_POST['cat_title'];
  $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = '{$cat_id}'";
  $update_query = mysqli_query($connection, $query);

}
?>
<form action="" method="post">
  <div class="form-group">
    <label for="cat_title">Edit Category</label>
    <input class="form-control" type="text" value="<?php echo $cat_to_edit; ?>" name="cat_title">
  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
  </div>
</form>