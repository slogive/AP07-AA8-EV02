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
      $field = array("name" => $_POST['name']);

      $tbl = "headquarters";

      insert($tbl, $field);
    }
    ?>

    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Norte">

      <input type="submit" name="submit" value="Create Headquarter">
    </form>

    <div class="table">
      <div class="body c3">
        <div class="header">#</div>
        <div class="header">Name</div>
        <div class="header">Actions</div>

        <?php
        $sql = "SELECT * FROM headquarters";

        $result = dbQuery($sql);

        while ($row = mysqli_fetch_object($result)) {
        ?>
          <div><?php echo $row->id ?></div>
          <div><?php echo $row->name ?></div>
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