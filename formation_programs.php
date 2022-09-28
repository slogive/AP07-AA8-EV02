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

      $tbl = "formation_programs";

      insert($tbl, $field);
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
      if (isset($_GET['delete'])) {
        delete('formation_programs', 'id', $_GET['id']);
      }
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

      <label for="name">Course</label>
      <input type="text" name="name" id="name">

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

    <div class="table">
      <div class="body c6">
        <div class="header">#</div>
        <div class="header">Name</div>
        <div class="header">Intructor</div>
        <div class="header">Course</div>
        <div class="header">Headquarter</div>
        <div class="header">Actions</div>

        <?php
        $result = dbQuery("SELECT *, fp.name AS formation_program_name, u.name AS instructor, c.name AS course, h.name AS headquarter FROM formation_programs AS fp JOIN users AS u ON fp.instructor = u.id JOIN courses AS c ON fp.course = c.id JOIN headquarters AS h ON fp.headquarter = h.id");

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div><?php echo $row->id ?></div>
          <div><?php echo $row->formation_program_name ?></div>
          <div><?php echo $row->instructor ?></div>
          <div><?php echo $row->course ?></div>
          <div><?php echo $row->headquarter ?></div>
          <div class="actions">
            <a href="formation_programs?id=<?php echo $row->id ?>&put">
              Modify
            </a>

            <a href="formation_programs?id=<?php echo $row->id ?>&delete">
              Delete
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>
</body>

</html>