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

    <div class="card mx-auto text-white rounded bg-success mb-3" style="width: 600px; margin-top:5%;">

      <div class="card-header">Greetings!</div>

      <div class="card-body">

        <h5 class="card-title">Dear user,</h5>

        <p class="card-text">

        <ul>

          <li>welcome to online matrimony, here you are going to pick your partner who is born to you.</li>

          <li>Here the features for searching and matching are absolutely free.</li>

          <li>But the advantage of buying premium user is:

            <ul>

              <li>Your Profile can be boosted to top based on their preference</li>

              <li>You can able to view the entire detail of the user</li>

            </ul>

          </li>

          <li>Pricing</li>

          <ul>

            <li>monthly plan - 500 rupees</li>

            <li>Annual plan - 5000 rupees</li>

          </ul>

        </ul>

        </p>

      </div>

      <div class="card-footer text-center">

        <a href="p_thankyou.php" type="submit" class="btn btn-danger">Buy now</a>

        <a href="thankyou.php" type="submit" class="btn btn-danger">Later</a>

      </div>

    </div>

  </section>

  <?php include 'loader.php'; ?>

  <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

</body>



</html>