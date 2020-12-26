<?php

require_once 'Database.php';
$id = $_GET['id'];
$mineral = Database::getInstance()->getMineral($id);

$comments = Database::getInstance()->getAllCommentsForMineral($id);

if (isset($_POST['insert-comment'])) {

  $username = $_POST['username'];
  $content = $_POST['content'];

  $errors = array();

  if (empty($username)) {
    $errors['username'] = '<br><label class="error">Please Confirm Password.</label><br>';
  }

  if (empty($content)) {
    $errors['content'] = '<br><label class="error">Please Confirm Password.</label></br>';
  }

  if (count($errors) == 0) {
    $data = array(
      "username" => $username,
      "content" => $content,
      "mineral_id" => $id,
    );

    if (Database::getInstance()->insertComment($data)) {
      header("Location: post.php?id=$id");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post</title>
  <link rel="stylesheet" href="post.css">
</head>

<body>
  <img src="<?php echo $mineral['img']; ?>" alt="Baryte">
  <p>username: <?php echo $mineral['username']; ?></p><br>
  <p>mineral: <?php echo $mineral['title']; ?></p><br>
  <p>locality: <?php echo $mineral['locality']; ?></p><br>
  <p>price: $<?php echo $mineral['price']; ?></p><br>
  <br><br><br>

  <div class="comments">
    <h1>Comments</h1>
    <?php echo sizeof($comments) == 0 ? "No comments" : ""; ?>
    <?php foreach ($comments as $comment) : ?>
      <div class="comment">
        <h5>User: <?php echo $comment['username']; ?></h5>
        <p><?php echo $comment['content']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="commentForm">
    <form method="POST">
      <h3>Add a comment</h3>
      <label for="username">Username:</label><br>
      <input name="username" type="text" id="username">
      <br><br>
      <label for="specimen">Comment:</label><br>
      <input name="content" type="text" id="specimen">
      <br><br>
      <input name="insert-comment" type="submit" value="Submit">
    </form>
  </div>


  <br><br><br>
  <a href="index.php">Home</a>

</body>

</html>