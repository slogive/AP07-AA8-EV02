<?php
$table = 'user_formation_programs';
?>

<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title>Users in programs</title>
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
        $field = array("id" => $id, "formation_program" => $_POST['formation_program'], "user" => $_POST['user']);

        modify("user_formation_programs", $field, 'id', $id);

        header("Location: users");
      } else {
        $field = array("formation_program" => $_POST['formation_program'], "user" => $_POST['user']);

        insert("user_formation_programs", $field);
      }
    }
    ?>

    <form action="" method="post">
      <label for="formation_program">Formation Program</label>
      <select name="formation_program" id="formation_program">
        <?php
        $__results = dbQuery("SELECT * FROM formation_programs");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->formation_program) && $_row->id == $row->formation_program ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <label for="user">User</label>
      <select name="user" id="user">
        <?php
        $__results = dbQuery("SELECT * FROM users");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->user) && $_row->id == $row->user ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <div class="form_actions">
        <?php echo isset($_GET['put']) ?
          '<input type="submit" name="submit" value="Edit Formation Program for user"><input onclick="cancel(\'user_formation_programs\')" type="button" value="Cancel">'
          :
          '<input type="submit" name="submit" value="Add user to Formation Program">'
        ?>
      </div>
    </form>

    <div class="table">
      <div class="body c4">
        <div class="header">#</div>
        <div class="header">Formation Program</div>
        <div class="header">User</div>
        <div class="header">Actions</div>

        <?php
        $result = dbQuery("SELECT *, ufp.id AS id, u.id AS user_id, u.name AS user_name FROM user_formation_programs AS ufp JOIN users AS u ON ufp.user = u.id JOIN formation_programs AS fp ON ufp.formation_program = fp.id");

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div><?php echo $row->id ?></div>
          <div><?php echo $row->name ?></div>
          <div><?php echo $row->user_name ?></div>
          <div class="actions">
            <a href="user_formation_programs?id=<?php echo $row->id ?>&user_id=<?php $row->user_id ?>&put">
              Modify
            </a>

            <a href="user_formation_programs?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>