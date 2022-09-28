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

      $tbl = "courses";

      insert($tbl, $field);
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
      if (isset($_GET['delete'])) {
        delete('courses', 'id', $_GET['id']);
      }
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name">

      <input type="submit" name="submit" value="Create course">
    </form>

    <div class="table">
      <div class="body c3">
        <div class="header">#</div>
        <div class="header">Name</div>
        <div class="header">Actions</div>

        <?php
        $sql = "SELECT * FROM courses";

        $result = dbQuery($sql);

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div><?php echo $row->id ?></div>
          <div><?php echo $row->name ?></div>
          <div class="actions">
            <a href="courses?id=<?php echo $row->id ?>&put">
              Modify
            </a>

            <a href="courses?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>