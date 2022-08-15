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
    <?php include "nav_i.php"; ?>
    <section class="main">
        <img class="img-fluid w-100" src="images/banner-1.jpg">
        <div class="jumbotron jumbotron-fluid bg-white">
            <h1 class="text-center text-danger">Find your Special Someone</h1>
        </div>
        <div class="container text-center">
            <div class="row">
            
                <div class="col-sm-4 bg-white">
                    <a href="registrationpage.php" type="submit"><i class="fa fa-user-plus fa-5x" aria-hidden="true"></i></a>
                    <div>
                        <a href="registrationpage.php" type="submit" class="btn"><h4>Sign Up</h4></a>
                    </div>
                    <div>
                        <p>Register for free & put up your Profile</p>
                    </div>
                </div>
                
                <div class="col-sm-4 bg-white">
                    <a href="registrationpage.php" type="submit"><i class="fa fa-users fa-5x" aria-hidden="true"></i></a>
                    <div>
                        <a href="registrationpage.php" type="submit" class="btn"><h4>Connect</h4></a>
                    </div>
                    <div>
                        <p>Select & Connect with Matches you like</p>
                    </div>
                </div>
                
                <div class="col-sm-4 bg-white">
                    <a href="registrationpage.php" type="submit"><i class="fa fa-smile-o fa-5x" aria-hidden="true"></i></a>
                    <div>
                        <a href="registrationpage.php" type="submit" class="btn"><h4>Married</h4></a>
                    </div>
                    <div>
                        <p>Get Married</p>
                    </div>
                </div>

            </div>
        </div>
        <h1 class="text-center mt-5 text-danger">Millions of happy customers</h1>
        <img class="img-fluid mt-5" width="100%" src="images/banner1.jpg">
        <?php include "footer.php"; ?>
    </section>
    <?php include "loader.php"; ?>
</body>

</html>