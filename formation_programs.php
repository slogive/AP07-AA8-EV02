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
      $field = array("instructor" => $_POST['instructor'], "course" => $_POST['course'], "headquarter" => $_POST['headquarter']);

      $tbl = "cities";

      insert($tbl, $field);
    }
    ?>

    <form action="" method="post">
      <label for="instructor">Instructor</label>
      <select name="instructor" id="instructor">
        <?php
        $_sql = "SELECT * FROM users";

        $_results = dbQuery($_sql);

        while ($_row = mysqli_fetch_object($_results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <label for="course">Course</label>
      <select name="course" id="course">
        <?php
        $__sql = "SELECT * FROM courses";

        $__results = dbQuery($__sql);

        while ($_row = mysqli_fetch_object($__results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <label for="headquarter">Headquarter</label>
      <select name="headquarter" id="headquarter">
        <?php
        $sql = "SELECT * FROM headquarters";

        $results = dbQuery($sql);

        while ($_row = mysqli_fetch_object($results)) {
        ?>
          <option value="<?php echo $_row->id ?>"><?php echo $_row->name ?></option>
        <?php } ?>
      </select>

      <input type="submit" name="submit" value="Create Formation Program">
    </form>
  </main>
</body>

</html>