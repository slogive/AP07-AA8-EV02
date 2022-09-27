<?php
error_reporting(E_ALL);
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
    if (isset($_POST['submit'])) {
      $field = array("name" => $_POST['name'], "surname" => $_POST['surname'], "address" => $_POST['address'], "phone" => $_POST['phone'], "city" => $_POST['city'], "email" => $_POST['email'], "password" => $_POST['password'], "student_level" => $_POST['student_level']);

      insert("users", $field);
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name">

      <label for="surname">Surname</label>
      <input type="text" name="surname" id="surname">

      <label for="address">Address</label>
      <input type="text" name="address" id="address">

      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone">

      <label for="city">City</label>
      <select name="city" id="city">
        <?php
        $_sql = "SELECT * FROM cities";

        $_results = dbQuery($_sql);

        while ($_row = mysqli_fetch_object($_results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <label for="email">Email</label>
      <input type="text" name="email" id="email">

      <label for="password">Password</label>
      <input type="password" name="password" id="password">

      <label for="student_level">Student Level</label>
      <select name="student_level" id="student_level">
        <?php
        $__sql = "SELECT * FROM student_levels";

        $__results = dbQuery($__sql);

        while ($__row = mysqli_fetch_object($__results)) {
        ?>
          <option value="<?php echo $__row->id ?>"><?php echo $__row->name ?></option>
        <?php } ?>
      </select>

      <input type="submit" name="submit" value="Create user">
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
        $sql = "SELECT * FROM users";

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
            <a href="">Modify</a>
            <a href="">Delete</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>