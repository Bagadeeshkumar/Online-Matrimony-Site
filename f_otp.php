<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
require "db.php";
session_start();
?>

<body>
    <nav class="navbar navbar-expand-sm mb-5 bg-dark fixed-top">
        <a class="navbar-brand text-warning" href="#">Sai Matrimony</a>
    </nav>
    <section class="main">
        <div class="mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 10%;">
            <form action="function_db.php" method="POST">
                <h2 class="text-center pt-2">OTP verification</h2>
                <?php if (isset($_GET["msg"])) { ?>
                    <div class="text-danger text-center mb-2"><?php echo $_GET["msg"]; ?></div>
                <?php } ?>
                <div class="form-group row">
                    <label for="fotp" class="col-sm-2 col-form-label h1">OTP</label>
                    <div class="col-sm-10">
                        <input type="text" name="fu_otp" class="form-control" id="fotp">
                        <?php if (isset($_GET["fotp_error"])) { ?>
                            <span class="text-danger mt-1"><?php echo $_GET["fotp_error"]; ?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" name="fotp_sub" class="btn-block btn btn-primary">Submit</button>
                        <button type="submit" name="re_fotp" class="btn-block btn btn-danger">Resend</button>
                    </div>
                </div>
        </div>
    </section>
    <?php include "loader.php" ?>
    <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
</body>

</html>