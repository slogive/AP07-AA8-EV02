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
  if (isset($_GET['id'])) {
    if (isset($_GET['delete'])) {
      delete('user_roles', 'id', $_GET['id']);
    }
  }
  ?>

  <?php
  include("./modules/nav.php");
  ?>

  <main class="main">
    <?php
    if (isset($_POST['submit'])) {
      if (isset($_GET['put'])) {
        $id = $_GET['id'];
        $result = selectId('user_roles', 'id', $id);

        $field = array("id" => $id, "user" => $row->user, "role" => $_POST['role']);

        modify("user_roles", $field, 'id', $id);
      } else {
        $field = array("user" => $_POST['user'], "role" => $_POST['role']);

        insert("user_roles", $field);
      }
    }
    ?>

    <form action="" method="post">
      <?php
      if (isset($_GET['id'])) {
        if (isset($_GET['put'])) {
          echo '<label for="id">ID</label>';
          echo '<input type="text" name="id" id="id" value="' . $_GET['id'] . '" disabled>';
        }
      }
      ?>

      <label for="user">User</label>
      <select name="user" id="user" <?php if (isset($_GET['put'])) {
                                      echo 'disabled';
                                    } ?>>
        <?php
        $__sql = "SELECT * FROM users";

        $__results = dbQuery($__sql);

        while ($_row = mysqli_fetch_object($__results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <label for="role">Role</label>
      <select name="role" id="role">
        <?php
        $_sql = "SELECT * FROM user_roles_base";

        $_results = dbQuery($_sql);

        while ($_row = mysqli_fetch_object($_results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <input type="submit" name="submit" value="<?php if (isset($_GET['put'])) {
                                                  echo 'Edit role';
                                                } else {
                                                  echo 'Assign role to user';
                                                } ?>
      ">
    </form>

    <div class="table">
      <div class="body c4">
        <div>#</div>
        <div>Name</div>
        <div>Role</div>
        <div>Actions</div>

        <?php
        $sql = "SELECT *, u.name AS user_name FROM user_roles AS ur JOIN users AS u ON ur.user = u.id JOIN user_roles_base AS urb ON ur.role = urb.id";

        $result = dbQuery($sql);

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