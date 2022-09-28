<nav class="nav">
  <div class="logo">
    <h2>
      <a href="">ADSI</a>
    </h2>
  </div>

  <div class="button" id="navbar">
    <div class="h_bar_1" id="navbar_1"></div>
    <div class="h_bar_2" id="navbar_2"></div>
    <div class="h_bar_3" id="navbar_3"></div>

    <!-- <div className={Data.navStatus ? `${styles.h_bar_1_change} ${styles.h_bar_1}` : styles.h_bar_1}></div> -->
    <!-- <div className={Data.navStatus ? `${styles.h_bar_2_change} ${styles.h_bar_2}` : styles.h_bar_2}></div> -->
    <!-- <div className={Data.navStatus ? `${styles.h_bar_3_change} ${styles.h_bar_3}` : styles.h_bar_3}></div> -->
  </div>

  <div class="buttons disabled" id="navbar-buttons">
    <a href="index">Home</a>
    <!-- <a href="login">Login</a> -->
    <!-- <a href="signup">Sign up</a> -->
    <!-- <a href="signout">Sign out</a> -->
    <a href="users">Users</a>
    <a href="user_roles">User Roles</a>
    <a href="user_roles_base">User Roles Base</a>
    <a href="cities">Cities</a>
    <a href="courses">Courses</a>
    <a href="student_levels">Student Levels</a>
    <a href="headquarters">Headquarters</a>
    <a href="user_formation_programs">Users in programs</a>
    <a href="formation_programs">Formation Programs</a>
  </div>

  <script>
    document.getElementById('navbar').addEventListener('click', function() {
      function toggleHamburger() {
        const elm1 = document.getElementById('navbar_1');
        const elm2 = document.getElementById('navbar_2');
        const elm3 = document.getElementById('navbar_3');

        elm1.getAttribute('class') == 'h_bar_1_change h_bar_1' ? elm1.classList = 'h_bar_1' : elm1.classList = 'h_bar_1_change h_bar_1';
        elm2.getAttribute('class') == 'h_bar_2_change h_bar_2' ? elm2.classList = 'h_bar_2' : elm2.classList = 'h_bar_2_change h_bar_2';
        elm3.getAttribute('class') == 'h_bar_3_change h_bar_3' ? elm3.classList = 'h_bar_3' : elm3.classList = 'h_bar_3_change h_bar_3';
      }

      toggleHamburger()


      function toggleMenu() {
        const elm = document.getElementById('navbar-buttons');

        elm.getAttribute('class').split(' ')[1] == 'disabled' ? elm.classList = 'buttons actived' : elm.classList = 'buttons disabled';
      }

      toggleMenu();
    });
  </script>
</nav>