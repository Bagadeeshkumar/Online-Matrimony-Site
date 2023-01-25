<?php

require 'db.php';

session_start();

if (!isset($_SESSION['name'])) {
    header('Location:index.php');
}
?>

<!DOCTYPE html>

<html lang="en">

<?php include 'header.php'; ?>



<body>

    <nav class="navbar navbar-expand-sm bg-dark fixed-top">

        <a class="navbar-brand text-warning" href="#">Sai Matrimony</a>

    </nav>

    <section class="main">

        <div class="mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 5%;">

            <form action="function_db.php" method="POST">

                <div class="text-center py-1">

                    <h2>Change Password</h2>

                    <?php if (isset($_GET['success_chg'])) { ?>

                        <span class="text-success mt-1"><?php echo $_GET[
                            'success_chg'
                        ]; ?></span>

                    <?php } ?>

                </div>

                <div class="form-group row">

                    <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>

                    <div class="col-sm-10">

                        <input type="password" name="log_adpass" class="form-control" id="inputPassword" placeholder="Password" required>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="chgPassword" class="col-sm-2 col-form-label">New Password</label>

                    <div class="col-sm-10">

                        <input type="password" name="chg_adpass" class="form-control" id="chgPassword" placeholder="Password" required>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="chgcPassword" class="col-sm-2 col-form-label">Confirm Password</label>

                    <div class="col-sm-10">

                        <input type="password" name="chgc_adpass" class="form-control" id="chgcPassword" placeholder="Password" required>

                        <?php if (isset($_GET['error_chg'])) { ?>

                            <span class="text-danger mt-1"><?php echo $_GET[
                                'error_chg'
                            ]; ?></span>

                        <?php } ?>

                    </div>

                </div>

                <div class="form-group row">

                    <div class="d-flex justify-content-center col-sm-6 offset-sm-2">

                        <button type="submit" name="chg_adsubmit" class="btn-block btn btn-primary">Change</button>

                        <a href="admin.php" class="ml-2 btn btn-danger">Cancel</a>

                    </div>

                </div>

            </form>

        </div>

    </section>

    <?php include 'loader.php'; ?>

    <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

</body>



</html>