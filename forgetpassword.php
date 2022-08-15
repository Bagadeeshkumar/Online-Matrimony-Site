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
    <nav class="navbar navbar-expand-sm bg-dark fixed-top">
        <a class="navbar-brand text-warning" href="#">Sai Matrimony</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-warning" href="index.php"><i class="fa fa-home fa-x mr-1"></i>Home</a>
            </li>
        </ul>
    </nav>
    <section class="main">
        <div class="mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 5%;">
            <form action="function_db.php" method="POST">
                <h2 class="text-center py-3">Forget Password</h2>
                <div class="form-group row">
                    <label for="funame" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="f_email" class="form-control" id="funame" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" name="f_sub" class="btn-block btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
    <?php
    include "loader.php";
    ?>
</body>

</html>