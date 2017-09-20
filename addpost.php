<?php
  require('config/db.php');
  require('config/config.php');

  // Check for Submit
  if(isset($_POST['submit'])){
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    $query = "INSERT INTO posts(title, body, author) VALUES('$title', '$body',' $author')";

    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'Error: '.mysqli_error($conn);
    }

  }

 ?>

 <?php include('includes/header.php') ?>
    <div class="container">
      <h1>Add Post</h1>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label>Author</label>
          <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
          <label>Body</label>
          <textarea name="body" class="form-control"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-success">
      </form>
    </div>
  <?php include('includes/footer.php') ?>