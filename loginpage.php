<?php

require "db.php";

session_start();

?>

<!DOCTYPE html>

<html lang="en">

<?php

include "header.php";

?>



<body>

    <nav class="navbar navbar-expand-sm mb-5 bg-dark fixed-top">

        <a class="navbar-brand text-warning" href="#">Sai Matrimony</a>

    </nav>



    <section class="main">

        <!-- Loginform -->

        <div class="mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 5%;">

            <form action="function_db.php" method="POST">

                <h2 class="text-center py-3">Login Form</h2>

                <div class="form-group row">

                    <label for="uname" class="col-sm-2 col-form-label pt-0">Username or Email</label>

                    <div class="col-sm-10">

                        <input type="text" name="log_name" class="form-control" value="" id="uname" placeholder="Username/Email" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>

                    <div class="col-sm-10">

                        <input type="password" name="log_pass" class="form-control" value="" id="inputPassword" placeholder="Password" required>

                        <?php if (isset($_GET["error"])) { ?>

                            <span class="text-danger mt-1"><?php echo $_GET["error"]; ?></span>

                        <?php } ?>

                        <?php if (isset($_GET["fsuccess"])) { ?>

                            <span class="text-danger mt-1"><?php echo $_GET["fsuccess"]; ?></span>

                        <?php } ?>

                    </div>

                </div>



                <div class="form-group row">

                    <div class="col-sm-10 offset-sm-2">

                        <label class="form-check-label"><input name="remember" value="1" type="checkbox">Remember me</label>

                    </div>

                </div>



                <div class="form-group row">

                    <div class="col-sm-10 offset-sm-2">

                        <button type="submit" name="log_submit" class="btn-block btn btn-primary">Login</button>

                    </div>

                </div>



                <div class="form-group row">

                    <div class="col-sm-10 offset-sm-2 text-center">

                        <a type="button" href="registrationpage.php" class="btn btn-success">Register</a>

                        <a type="button" href="index.php" class="btn btn-danger">Cancel</a>

                    </div>

                </div>

            </form>

        </div>

    </section>



    <div class="fixed-bottom mar footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

    <?php

    if (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {

        $email = $_COOKIE['email'];

        $pass = $_COOKIE['pass'];

        echo "<script>

                        document.getElementById('uname').value ='$email';

                        document.getElementById('inputPassword').value='$pass';

                    </script>";

    }

    include "loader.php";

    ?>

</body>



</html>