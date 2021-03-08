<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
require "db.php";
session_start();
?>

<body style="padding: 0px;">
    <?php include "nav_i.php"; ?>
    <section class="main">
        <img class="img-fluid" width="100%" src="images/banner-1.jpg">
        <div class="jumbotron jumbotron-fluid bg-white">
            <h1 class="text-center text-danger">Find your Special Someone</h1>
        </div>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-4 bg-white"><a href="registrationpage.php" type="submit"><i class="fa fa-user-plus fa-5x" aria-hidden="true"></i></a></div>
                <div class="col-sm-4 bg-white"><a href="registrationpage.php" type="submit"><i class="fa fa-users fa-5x" aria-hidden="true"></i></a></div>
                <div class="col-sm-4 bg-white"><a href="registrationpage.php" type="submit"><i class="fa fa-smile-o fa-5x" aria-hidden="true"></i></a></div>
            </div>
            <div class="row">
                <div class="col-sm-4"><a href="registrationpage.php" type="submit" class="btn">
                        <h4>Sign Up</h4>
                    </a></div>
                <div class="col-sm-4"><a href="registrationpage.php" type="submit" class="btn">
                        <h4>Connect</h4>
                    </a></div>
                <div class="col-sm-4"><a href="registrationpage.php" type="submit" class="btn">
                        <h4>Married</h4>
                    </a></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p>Register for free & put up your Profile</p>
                </div>
                <div class="col-sm-4">
                    <p>Select & Connect with Matches you like</p>
                </div>
                <div class="col-sm-4">
                    <p>Get Married</p>
                </div>
            </div>
        </div>
        <h1 class="text-center mt-5 text-danger">Millions of happy customers</h1>
        <img class="img-fluid mt-5" width="100%" src="images/banner1.jpg">
        <div id="con" class="bg-info text-white">
            <h1 class="text-center">Contact</h1>
            <div class="row  m-4">
                <div class="col-md-5">
                    Call us : +91 98345 98234
                    <div>Telephone : 04549 267356</div>
                </div>
                <div class="col-md-4">
                    <a href="#"><i class=" text-white fa fa-telegram fa-3x mr-4" aria-hidden="true"></i></a>
                    <a href="#"><i class=" text-white fa fa-facebook-official fa-3x mr-4" aria-hidden="true"></i></a>
                    <a href="#"><i class=" text-white fa fa-instagram fa-3x mr-4" aria-hidden="true"></i></a>
                    <a href="#"><i class=" text-white fa fa-twitter fa-3x" aria-hidden="true"></i></a>
                </div>
                <div>Email : matrimonybka@gmail.com</div>
            </div>
            <div class="footer-copyright bg-dark text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
        </div>
    </section>
    <?php include "loader.php"; ?>
</body>

</html>