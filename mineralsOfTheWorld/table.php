<?php

require_once 'Database.php';
$minerals = Database::getInstance()->getAllMinerals();
$comments = Database::getInstance()->getAllComments();

if (isset($_POST['delete'])) {
  $id = $_POST['mineral_id'];

  if (Database::getInstance()->deleteMineral($id)) {
    header("Location: table.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table</title>
  <link rel="stylesheet" href="table.css">
</head>

<body>
  <table style="width:100%">
    <caption>Mineral Specimens</caption>
    <tr>
      <th>ID</th>
      <th>Mineral</th>
      <th>Locality</th>
      <th>Price</th>
      <th>Image</th>
    </tr>
    <?php foreach ($minerals as $index => $mineral) : ?>
      <tr>
        <td><?php echo ++$index; ?></td>
        <td><?php echo $mineral['title']; ?></td>
        <td><?php echo $mineral['locality']; ?></td>
        <td>$<?php echo $mineral['price']; ?></td>
        <td>
          <img src="<?php echo $mineral['img']; ?>" alt="baryte" id="baryte">
          <button><a href="edit.php?id=<?php echo $mineral['id']; ?>">edit</a></button>
          <form method="POST" style="display: inline;">
            <input type="hidden" name="mineral_id" value="<?php echo $mineral['id']; ?>">
            <button type="submit" name="delete">remove</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>

  <div id="brDiv"></div>

  <table style="width:100%">
    <caption>Comments</caption>
    <tr>
      <th>User</th>
      <th>Comment</th>
      <th>Mineral</th>
    </tr>
    <?php foreach ($comments as $comment) : ?>
      <tr>
        <td><?php echo $comment['username']; ?></td>
        <td><?php echo $comment['content']; ?></td>
        <td><?php echo $comment['title']; ?></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>

  <br><br><br>
  <a href="index.php">Home</a>
</body>

</html>