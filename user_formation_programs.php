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
      $field = array("formation_program" => $_POST['formation_program'], "user" => $_POST['user']);

      $tbl = "user_formation_programs";

      insert($tbl, $field);
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
      if (isset($_GET['delete'])) {
        delete('user_formation_programs', 'id', $_GET['id']);
      }
    }
    ?>

    <form action="" method="post">
      <label for="formation_program">Formation Program</label>
      <select name="formation_program" id="formation_program">
        <?php
        $_sql = "SELECT * FROM formation_programs";

        $_results = dbQuery($_sql);

        while ($_row = mysqli_fetch_object($_results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <label for="user">User</label>
      <select name="user" id="user">
        <?php
        $__sql = "SELECT * FROM users";

        $__results = dbQuery($__sql);

        while ($_row = mysqli_fetch_object($__results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <input type="submit" name="submit" value="Add user to Formation Program">
    </form>

    <div class="table">
      <div class="body c4">
        <div class="header">#</div>
        <div class="header">Formation Program</div>
        <div class="header">User</div>
        <div class="header">Actions</div>

        <?php
        $result = dbQuery("SELECT *, ufp.id AS ufp_id, u.id AS user_id, u.name AS user_name FROM user_formation_programs AS ufp JOIN users AS u ON ufp.user = u.id JOIN formation_programs AS fp ON ufp.formation_program = fp.id");

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div><?php echo $row->ufp_id ?></div>
          <div><?php echo $row->name ?></div>
          <div><?php echo $row->user_name ?></div>
          <div class="actions">
            <a href="user_formation_programs?id=<?php echo $row->ufp_id ?>&user_id=<?php $row->user_id ?>&put">
              Modify
            </a>

            <a href="user_formation_programs?id=<?php echo $row->ufp_id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>