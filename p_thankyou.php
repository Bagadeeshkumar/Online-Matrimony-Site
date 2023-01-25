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

      <div class="card-header">Thank you for became <h3>premium member</h3>

      </div>

      <div class="card-body">

        <h5 class="card-title">Dear user,</h5>

        <p class="card-text">

        <ul>

          <li>welcome to online matrimony, Now you are premium member, Hence

            <ul>

              <li>You can access the searching and matching feature</li>

              <li>Your profile are boost up to the other user based on their preference</li>

              <li>You can able to see the entire detail of the other user</li>

            </ul>

          </li>

        </ul>

        </p>

      </div>

      <div class="card-footer text-center">

        <form action="function_db.php" method="POST">

          <button name="pre_user" type="submit" class="btn btn-danger">Continue</button>

        </form>

      </div>

    </div>

  </section>

  <?php include 'loader.php'; ?>

  <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

</body>



</html>