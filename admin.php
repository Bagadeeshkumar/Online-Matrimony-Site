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

    <?php
    include 'nav_ad.php';

    include 'db.php';
    ?>

    <section class="main">

        <div class="container">

            <?php if (isset($_GET['msg'])) { ?>

                <span class="text-danger mt-1"><?php echo $_GET[
                    'msg'
                ]; ?></span>

            <?php } ?>

            <h3>All Users in your Website</h3>

            <table class="table border rounded mt-5">

                <tbody>

                    <thead class="thead-light text-center">

                        <th colspan="2">Premium memebers</th>

                    </thead>

                    <?php
                    $run = mysqli_query(
                        $conn,
                        "SELECT * FROM user WHERE status = 'P'"
                    );

                    while ($row = mysqli_fetch_assoc($run)) {
                        echo '

                                        <tr>

                                            <td><img class="rounded rounded-circle" src="uploads/' .
                            $row['img'] .
                            '" style="width: 5%;" onerror="this.onerror=null; this.src=' .
                            $_SESSION['dp'] .
                            '"  alt="profile picture">' .
                            ' ' .
                            $row['firstname'] .
                            ' ' .
                            $row['lastname'] .
                            '</td>

                                            <td>

                                                <div class="d-flex justify-content-center">

                                                    <a href="adminview.php?id=' .
                            $row['user_id'] .
                            '" class="btn btn-sm ml-2 btn-warning">view Details</a>

                                                </div>

                                            </td>

                                        </tr>';
                    }
                    ?>

                    <thead class="text-center thead-light">

                        <th colspan="2">Free memebers</th>

                    </thead>

                    <?php
                    $run1 = mysqli_query(
                        $conn,
                        "SELECT * FROM user WHERE status = 'F'"
                    );

                    while ($row1 = mysqli_fetch_assoc($run1)) {
                        echo '

                                     <tr>

                                         <td><img class="rounded rounded-circle" src="uploads/' .
                            $row1['img'] .
                            '" style="width: 5%;" onerror="this.onerror=null; this.src=' .
                            $_SESSION['dp'] .
                            '"  alt="profile picture">' .
                            ' ' .
                            $row1['firstname'] .
                            ' ' .
                            $row1['lastname'] .
                            '</td>

                                         <td>

                                             <div class="d-flex justify-content-center">

                                                 <a href="adminview.php?id=' .
                            $row1['user_id'] .
                            '" class="btn btn-sm ml-2 btn-warning">view Details</a>

                                             </div>

                                         </td>

                                     </tr>';
                    }
                    ?>

                </tbody>

            </table>

        </div>

        <div class="mar footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

    </section>

    <?php include 'loader.php'; ?>

</body>



</html>