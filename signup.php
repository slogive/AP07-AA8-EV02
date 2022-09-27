<!DOCTYPE html>
<html lang="es-CO">

<head>
  <?php
  include("./modules/head.php");
  include("./php/function.php");
  ?>

  <title>Signup</title>
</head>

<body>
  <?php
  include("./modules/nav.php");
  ?>

  <main class="main">
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
      <input type="text" name="city" id="city">

      <label for="email">Email</label>
      <input type="text" name="email" id="email">

      <label for="password">Password</label>
      <input type="text" name="password" id="password">

      <label for="student_level">Student Level</label>
      <input type="text" name="student_level" id="student_level">

      <input type="submit" name="submit" value="Sign up">
    </form>
  </main>
</body>

</html>