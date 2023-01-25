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

    <!-- Registeration form -->

    <section class="main">

        <div class=" mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 5%;">

            <form action="function_db.php" method="POST">

                <h3 class="text-center py-1">Registeration Form</h3>

                <div class="form-group row">

                    <label for="uname" class="col-sm-2 col-form-label">Username</label>

                    <div class="col-sm-10">

                        <input type="text" name="reg_name" class="form-control" id="uname" placeholder="Username" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="inputmail" class="col-sm-2 col-form-label">Email</label>

                    <div class="col-sm-10">

                        <input type="email" name="reg_mail" class="form-control" id="inputmail" placeholder="Email" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>

                    <div class="col-sm-10">

                        <input type="password" name="reg_pass" class="form-control" id="inputPassword" placeholder="Password" required>

                        <?php if (isset($_GET['error'])) { ?>

                            <span class="text-danger mt-1"><?php echo $_GET[
                                'error'
                            ]; ?></span>

                        <?php } ?>

                    </div>

                </div>



                <div class="form-group row">

                    <div class="col-sm-10 offset-sm-2">

                        <button type="submit" name="reg_submit" class="btn-block btn btn-primary">Continue</button>

                    </div>

                </div>



                <div class="form-group row">

                    <div class="col-sm-10 offset-sm-2 text-center">

                        <a type="button" class="btn btn-danger" href="index.php">Cancel</a>

                        Already have an account? <a href="loginpage.php" class="text-success">Login</a>

                    </div>

                </div>



            </form>

        </div>

    </section>

    <?php include 'loader.php'; ?>

    <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

</body>



</html>