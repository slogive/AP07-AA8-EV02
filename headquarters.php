<?php
$table = 'headquarters';
?>

<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title>Headquarters</title>
</head>

<body>
  <?php
  include("./modules/nav.php");
  ?>

  <main class="main">
    <?php
    if (isset($_GET['put'])) {
      $id = $_GET['id'];
      selectId($table, 'id', $id);
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
      if (isset($_GET['delete'])) {
        delete($table, 'id', $_GET['id']);
      }
    }
    ?>

    <?php
    if (isset($_POST['submit'])) {
      if (isset($_GET['put'])) {
        $id = $_GET['id'];
        $field = array("id" => $id, "name" => $_POST['name']);

        modify("headquarters", $field, 'id', $id);

        header("Location: users");
      } else {
        $field = array("name" => $_POST['name']);

        insert("headquarters", $field);
      }
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="<?php echo isset($_GET['put']) ? $row->name : ''; ?>" placeholder="Norte">

      <div class="form_actions">
        <?php echo isset($_GET['put']) ?
          '<input type="submit" name="submit" value="Edit Headquarter"><input onclick="cancel(\'headquarters\')" type="button" value="Cancel">'
          :
          '<input type="submit" name="submit" value="Create Headquarter">'
        ?>
      </div>
    </form>

    <div class="table">
      <div class="body c3">
        <div class="header">#</div>
        <div class="header">Name</div>
        <div class="header">Actions</div>

        <?php
        $sql = "SELECT * FROM headquarters";

        $result = dbQuery($sql);

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div><?php echo $row->id ?></div>
          <div><?php echo $row->name ?></div>
          <div class="actions">
            <a href="headquarters?id=<?php echo $row->id ?>&put">
              Modify
            </a>

            <a href="headquarters?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>