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

  <?php
  if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
      delete('user_roles_base', 'id', $_GET['id']);
    }
  }
  ?>

  <main class="main">
    <?php
    if (isset($_POST['submit'])) {
      $field = array("name" => $_POST['name']);

      $tbl = "user_roles_base";

      insert($tbl, $field);
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Admin">

      <input type="submit" name="submit" value="Create user role">
    </form>

    <div class="table">
      <div class="body c3">
        <div>#</div>
        <div>Name</div>
        <div>Actions</div>

        <?php
        $sql = "SELECT * FROM user_roles_base";

        $result = dbQuery($sql);

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div class="row"><?php echo $row->id ?></div>
          <div class="row"><?php echo $row->name ?></div>
          <div class="actions">
            <a href="user_roles_base?id=<?php echo $row->id ?>&put">
              Modify
            </a>

            <a href="user_roles_base?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>