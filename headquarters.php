<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title></title>
</head>

<body>
  <?php
  include("./modules/nav.php");
  ?>

  <main class="main">
    <?php
    if (isset($_POST['submit'])) {
      $field = array("name" => $_POST['name']);

      $tbl = "headquarters";

      insert($tbl, $field);
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
      if (isset($_GET['delete'])) {
        delete('headquarters', 'id', $_GET['id']);
      }
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Norte">

      <input type="submit" name="submit" value="Create Headquarter">
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