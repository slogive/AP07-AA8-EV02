<?php
$table = 'user_roles';
?>

<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title>User roles</title>
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
        $field = array("id" => $id, "user" => $_POST['user'], "role" => $_POST['role']);

        modify("user_roles", $field, 'id', $id);

        header("Location: users");
      } else {
        $field = array("user" => $_POST['user'], "role" => $_POST['role']);

        insert("user_roles", $field);
      }
    }
    ?>

    <form action="" method="post">
      <label for="user">User</label>
      <select name="user" id="user" <?php echo isset($_GET['put']) ? 'disabled' : '' ?>>
        <?php
        if (isset($_GET['put'])) {
          $___results =  mysqli_fetch_object(dbQuery("SELECT * FROM users WHERE id = $row->user"));

          echo "<option value='$___results->id'>$___results->name</option>";
        } else {
          $__results = dbQuery("SELECT * FROM users");

          while ($_row = mysqli_fetch_object($__results)) {
            echo "<option value='$_row->id'>$_row->name</option>";
          }
        }
        ?>
      </select>

      <label for="role">Role</label>
      <select name="role" id="role">
        <?php
        $__results = dbQuery("SELECT * FROM user_roles_base");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->role) && $_row->id == $row->role ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <div class="form_actions">
        <?php echo isset($_GET['put']) ?
          '<input type="submit" name="submit" value="Edit role"><input onclick="cancel(\'user_roles\')" type="button" value="Cancel">'
          :
          '<input type="submit" name="submit" value="Assign role to user">'
        ?>
      </div>
    </form>

    <div class="table">
      <div class="body c4">
        <div class="header">#</div>
        <div class="header">Name</div>
        <div class="header">Role</div>
        <div class="header">Actions</div>

        <?php
        $result = dbQuery("SELECT *, ur.id AS id, u.id AS user_id, u.name AS user_name FROM user_roles AS ur JOIN users AS u ON ur.user = u.id JOIN user_roles_base AS urb ON ur.role = urb.id");

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div class="row"><?php echo $row->id ?></div>
          <div class="row"><?php echo $row->user_name ?></div>
          <div class="row"><?php echo $row->name ?></div>
          <div class="actions">
            <a href="user_roles?id=<?php echo $row->id ?>&put">
              Modify
            </a>

            <a href="user_roles?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>