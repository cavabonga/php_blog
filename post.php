<?php
  require('config/db.php');
  require('config/config.php');

  // Check for Submit
  if(isset($_POST['delete'])){
    // Get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM posts WHERE id={$delete_id}";

    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'Error: '.mysqli_error($conn);
    }

  }

  // Get ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // Create Query
  $query = 'SELECT * FROM posts WHERE id= '. $id;

  // Get Result
  $result = mysqli_query($conn, $query);

  // Fetch data
  $post = mysqli_fetch_assoc($result);
  #var_dump($posts);

  // Free result
  mysqli_free_result($result);

  // Close connection
  mysqli_close($conn);
 ?>

 <?php include('includes/header.php') ?>
    <div class="container">
      <h1 class="text-center"><?php echo $post['title'] ?></h1>

      <small>Created on <?php echo $post['created_at'] ?> by <?php echo $post['author'] ?></small>
      <p><?php echo $post['body'] ?></p>
      <a class="btn btn-default" href="<?php echo ROOT_URL ?>">Back</a>
      <hr>
      <form class="pull-right" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $post['id'] ?>">
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
      </form>
      <a href="<?php echo ROOT_URL ?>editpost.php?id=<?php echo $post['id'] ?>" class="btn btn-default">Edit</a>
    </div>
  <?php include('includes/footer.php') ?>
