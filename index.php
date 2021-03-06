<?php
  require('config/db.php');
  require('config/config.php');

  // Create Query
  $query = 'SELECT * FROM posts ORDER BY created_at DESC';

  // Get Result
  $result = mysqli_query($conn, $query);

  // Fetch data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  #var_dump($posts);

  // Free result
  mysqli_free_result($result);

  // Close connection
  mysqli_close($conn);
 ?>

 <?php include('includes/header.php') ?>
    <div class="container">

        <?php foreach($posts as $post) : ?>
          <div class="well">
            <h3><?php echo $post['title'] ?></h3>
            <small>Created on <?php echo $post['created_at'] ?> by <?php echo $post['author'] ?></small>
            <p><?php echo $post['body'] ?></p>
            <a class="btn btn-default" href="post.php?id=<?php echo $post['id'] ?>">Read More</a>
          </div>
        <?php endforeach; ?>

    </div>
  <?php include('includes/footer.php') ?>
