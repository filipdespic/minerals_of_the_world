<?php

require_once 'Database.php';
$id = $_GET['id'];
$mineral = Database::getInstance()->getMineral($id);

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
    <div class="comment">
      <h5>Zdravko</h5>
      <p>Sve super, bravo, bravo!</p>
    </div>
    <div class="comment">
      <h5>Mirko</h5>
      <p>Moze to bolje!</p>
    </div>
  </div>

  <div class="commentForm">
    <form>
      <h3>Add a comment</h3>
      <label for="username">Username:</label><br>
      <input type="text" id="username">
      <br>
      <label for="specimen">Comment:</label><br>
      <input type="text" id="specimen">
      <br>
      <input type="submit" value="Submit">
    </form>
  </div>


</body>

</html>