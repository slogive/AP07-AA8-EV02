<?php
$table = 'formation_programs';
?>

<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title>Formation Programs</title>
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
        $field = array("id" => $id, "instructor" => $_POST['instructor'], "name" => $_POST["name"], "course" => $_POST['course'], "headquarter" => $_POST['headquarter']);

        modify("formation_programs", $field, 'id', $id);

        header("Location: users");
      } else {
        $field = array("instructor" => $_POST['instructor'], "name" => $_POST["name"], "course" => $_POST['course'], "headquarter" => $_POST['headquarter']);

        insert("formation_programs", $field);
      }
    }
    ?>

    <form action="" method="post">
      <label for="instructor">Instructor</label>
      <select name="instructor" id="instructor">
        <?php
        $__results = dbQuery("SELECT * FROM users");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->instructor) && $_row->id == $row->instructor ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="<?php echo isset($_GET['put']) ? $row->name : ''; ?>" placeholder="Sofware">

      <label for="course">Course</label>
      <select name="course" id="course">
        <?php
        $__results = dbQuery("SELECT * FROM courses");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->course) && $_row->id == $row->course ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <label for="headquarter">Headquarter</label>
      <select name="headquarter" id="headquarter">
        <?php
        $__results = dbQuery("SELECT * FROM headquarters");

        while ($_row = mysqli_fetch_object($__results)) {
          $selected = isset($row->headquarter) && $_row->id == $row->headquarter ? 'selected' : '';

          echo "<option value='$_row->id' $selected>$_row->name</option>";
        }
        ?>
      </select>

      <div class="form_actions">
        <?php echo isset($_GET['put']) ?
          '<input type="submit" name="submit" value="Edit Formation Program"><input onclick="cancel(\'formation_programs\')" type="button" value="Cancel">'
          :
          '<input type="submit" name="submit" value="Create Formation Program">'
        ?>
      </div>
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
        $result = dbQuery("SELECT *, fp.id AS id, fp.name AS formation_program_name, u.name AS instructor, c.name AS course, h.name AS headquarter FROM formation_programs AS fp JOIN users AS u ON fp.instructor = u.id JOIN courses AS c ON fp.course = c.id JOIN headquarters AS h ON fp.headquarter = h.id");

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