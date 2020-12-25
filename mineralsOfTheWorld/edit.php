<?php

require_once 'Database.php';
$id = $_GET['id'];
$mineral = Database::getInstance()->getMineral($id);

if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $locality = $_POST['locality'];
  $price = $_POST['price'];
  $img = $_POST['img'];

  $errors = array();

  if (empty($title)) {
    $errors['title'] = '<br><label class="error">Please Confirm Password.</label><br>';
  }

  if (empty($locality)) {
    $errors['locality'] = '<br><label class="error">Please Confirm Password.</label></br>';
  }

  if (empty($price)) {
    $errors['price'] = '<br><label class="error">Please Confirm Password.</label></br>';
  }

  if (empty($img)) {
    $errors['img'] = '<br><label class="error">Please Confirm Password.</label></br>';
  }

  if (count($errors) == 0) {
    $data = array(
      "title" => $title,
      "locality" => $locality,
      "price" => $price,
      "img" => $img,
    );

    if (Database::getInstance()->updateMineral($data, $id)) {
      header("Location: table.php");
    }
  } // COUNT GRESKE CLOSE
} // POST REQ CLOSE


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update mineral</title>
  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <h2>Welcome to the mineral inserting page! <br>
    Feel free to add all the products you want!</h2>
  <div class="mineralForm">
    <form method="POST">
      <h3>Add a product</h3>
      <label for="username">Username:</label><br>
      <input name="username" type="text" id="username" disabled value="<?php echo $mineral['username']; ?>">
      <br>
      <label for="specimen">Mineral:</label><br>
      <input value="<?php echo $mineral['title'] ?>" name="title" type="text" id="specimen">
      <?php echo $errors['title'] ?? ""; ?>
      <br>
      <label for="locality">Locality:</label><br>
      <input value="<?php echo $mineral['locality'] ?>" name="locality" type="text" id="locality">
      <?php echo $errors['locality'] ?? ""; ?>
      <br>
      <label for="price">Price:</label><br>
      <input value="<?php echo $mineral['price'] ?>" name="price" type="number" id="price">
      <?php echo $errors['price'] ?? ""; ?>
      <br>
      <label for="img">Img:</label><br>
      <input value="<?php echo $mineral['img'] ?>" name="img" type="text" id="img">
      <?php echo $errors['img'] ?? ""; ?>
      <br><br>
      <input type="submit" name="update" value="Submit">
    </form>
  </div>

  <br><br><br>
  <a href="index.php">Home</a>
</body>

</html>