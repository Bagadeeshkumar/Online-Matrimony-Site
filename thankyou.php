<?php

require 'db.php';

session_start();
?>

<!DOCTYPE html>

<html lang="en">

<?php include 'header.php'; ?>



<body>

  <nav class="navbar navbar-expand-sm mb-5 bg-dark fixed-top">

    <a class="navbar-brand text-warning" href="#">Sai Matrimony</a>

  </nav>

  <section class="main">

    <div class="card mx-auto text-white rounded bg-success mb-3" style="width: 600px; margin-top:10%;">

      <div class="card-header">Thank you for registering in our matrimony website</div>

      <div class="card-body">

        <h5 class="card-title">Dear user,</h5>

        <p class="card-text">

        <ul>

          <li>

            <h3>welcome to online matrimony</h3>

          </li>

          <li>Now you are Free member</li>

          <li>Here you can access the feature of searching and matching</li>

          <li>But you are not able to see the information of the User</li>

        </ul>

        </p>

      </div>

      <div class="card-footer d-flex justify-content-center">

        <a href="plan.php" type="submit" class="btn btn-danger">Become a premium member</a>

        <form action="function_db.php" method="POST">

          <button name="f_user" type="submit" class="ml-2 btn btn-danger">Continue</button>

        </form>

      </div>

    </div>

  </section>

  <?php include 'loader.php'; ?>

  <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

</body>



</html>