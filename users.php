<?php
$table = 'users';
?>

<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title>Users</title>
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
        $field = array("id" => $id, "name" => $_POST['name'], "surname" => $_POST['surname'], "address" => $_POST['address'], "phone" => $_POST['phone'], "city" => $_POST['city'], "email" => $_POST['email'], "password" => $_POST['password'], "student_level" => $_POST['student_level']);

        modify("users", $field, 'id', $id);

        header("Location: users");
      } else {
        $field = array("name" => $_POST['name'], "surname" => $_POST['surname'], "address" => $_POST['address'], "phone" => $_POST['phone'], "city" => $_POST['city'], "email" => $_POST['email'], "password" => $_POST['password'], "student_level" => $_POST['student_level']);

        insert("users", $field);
      }
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="<?php echo isset($_GET['put']) ? $row->name : ''; ?>" placeholder="Milton">

      <label for="surname">Surname</label>
      <input type="text" name="surname" id="surname" value="<?php echo isset($_GET['put']) ? $row->surname : ''; ?>" placeholder="Moncada">

      <label for="address">Address</label>
      <input type="text" name="address" id="address" value="<?php echo isset($_GET['put']) ? $row->address : ''; ?>" placeholder="MZ B CS # 12">

      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" value="<?php echo isset($_GET['put']) ? $row->phone : ''; ?>" placeholder="3045903445">

      <label for="city">City</label>
      <select name="city" id="city">
        <?php
        $__results = dbQuery("SELECT * FROM cities");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->city) && $_row->id == $row->city ? 'selected' : '';

          echo "<option value='$_row->city' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?php echo isset($_GET['put']) ? $row->email : ''; ?>" placeholder="milton@email.com">

      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="<?php echo isset($_GET['put']) ? $row->password : ''; ?>" placeholder="123456789">

      <label for="student_level">Student Level</label>
      <select name="student_level" id="student_level">
        <?php
        $__results = dbQuery("SELECT * FROM student_levels");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->student_level) && $_row->id == $row->student_level ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <div class="form_actions">
        <?php echo isset($_GET['put']) ?
          '<input type="submit" name="submit" value="Edit user"><input onclick="cancel(\'users\')" type="button" value="Cancel">'
          :
          '<input type="submit" name="submit" value="Create user">'
        ?>
      </div>
    </form>

    <div class="table">
      <div class="body c9">
        <div class="header">#</div>
        <div class="header">Name</div>
        <div class="header">Surname</div>
        <div class="header">Address</div>
        <div class="header">Phone</div>
        <div class="header">City</div>
        <div class="header">Email</div>
        <div class="header">Student Level</div>
        <div class="header">Actions</div>

        <?php
        $sql = "SELECT *, u.id AS id, u.name AS name, c.id AS city_id, c.name AS city, sl.id AS student_level_id, sl.name AS student_level FROM users AS u JOIN cities AS c ON u.city = c.id JOIN student_levels AS sl ON u.student_level = sl.id";

        $result = dbQuery($sql);

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div class="row"><?php echo $row->id ?></div>
          <div class="row"><?php echo $row->name ?></div>
          <div class="row"><?php echo $row->surname ?></div>
          <div class="row"><?php echo $row->address ?></div>
          <div class="row"><?php echo $row->phone ?></div>
          <div class="row"><?php echo $row->city ?></div>
          <div class="row"><?php echo $row->email ?></div>
          <div class="row"><?php echo $row->student_level ?></div>
          <div class="actions">
            <a href="?id=<?php echo $row->id ?>&put">
              Modify
            </a>

            <a href="users?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>