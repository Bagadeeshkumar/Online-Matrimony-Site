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

<body class="bg-danger">
    <?php include 'nav_u.php'; ?>
    <section class="main">
        <img class="img-fluid mt-0" width="100%" src="images/banner-3.jpg" style="margin-top: 0px;">
        <div class="container">
            <h2 class="text-center mt-3 text-white">Match by your Preference</h2>
            <?php
            $myid = $_SESSION['my_id'];
            if (isset($_GET['fri_msg'])) {
                $msg = $_GET['fri_msg'];
                echo '<p class="text-center text-white">' . $msg . '</p>';
            }
            ?>
            <div class="row">
                <?php
                //search
                if (isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $matches = mysqli_fetch_assoc(
                        mysqli_query(
                            $conn,
                            "SELECT * FROM user WHERE user_id = '$myid'"
                        )
                    );
                    $gen = $matches['gender'];
                    $name = $matches['firstname'];
                    $s_sql = mysqli_query(
                        $conn,
                        "SELECT * FROM user WHERE ((user_id  LIKE '$search%' OR username LIKE '$search%' OR firstname LIKE '$search%') AND user_id != '$myid' AND username != 'admin' AND gender != '$gen')"
                    );
                    if (mysqli_num_rows($s_sql) > 0) {
                        while ($row20 = mysqli_fetch_assoc($s_sql)) {
                            $id = $row20['user_id'];
                            $status =
                                $row20['status'] == 'P'
                                    ? 'Premium Member'
                                    : 'Free Member';
                            echo '
                                <div class="col-sm-4">
                                    <div class="card my-5 bg-light border rounded" style="height: 90%;">
                                        <div class="card-header">' .
                                $row20['username'] .
                                '</div>
                                        <img class="card-img-top rounded my-1 mx-auto d-block rounded-circle" src="uploads/' .
                                $row20['img'] .
                                '" style="width: 25%;" onerror="this.onerror=null; this.src=' .
                                $_SESSION['dp'] .
                                '"  alt="profile picture">
                                        <div class="card-body">
                                            <h5 class="card-title">' .
                                $status .
                                '</h5>
                                            <p class="card-text">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Full Name</td>
                                                            <td>' .
                                $row20['firstname'] .
                                ' ' .
                                $row20['lastname'] .
                                '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age</td>
                                                            <td>' .
                                $row20['age'] .
                                '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last Job Company</td>
                                                            <td>' .
                                $row20['l_comp'] .
                                '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last Job Designation</td>
                                                            <td>' .
                                $row20['l_des'] .
                                '</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </p>
                                            <div class="card-footer d-flex justify-content-center">
                                            ';
                            $req = mysqli_query(
                                $conn,
                                "SELECT * FROM friend WHERE ((sender = $myid AND receiver = $id) OR (sender = $id AND receiver = $myid))"
                            );
                            if (mysqli_num_rows($req) > 0) {
                                $req1 = mysqli_fetch_assoc($req);
                                if (
                                    $req1['sender'] == $myid &&
                                    $req1['receiver'] == $id &&
                                    $req1['status'] == 0
                                ) {
                                    echo '<a class="btn text-white btn-sm btn-primary">Pending</a>';
                                } elseif (
                                    $req1['receiver'] == $myid &&
                                    $req1['sender'] == $id &&
                                    $req1['status'] == 0
                                ) {
                                    echo '<a href="function_db.php?sender=' .
                                        $row20['user_id'] .
                                        '" class="btn text-white btn-sm btn-success">Accept</a>';
                                } elseif (
                                    ($req1['receiver'] == $myid or
                                        $req1['sender'] == $myid) &&
                                    $req1['status'] == 1
                                ) {
                                    echo '<a class="btn btn-sm btn-success text-white">Connected</a>';
                                }
                            } else {
                                echo '<a href="function_db.php?receiver=' .
                                    $row20['user_id'] .
                                    '" class="btn text-white btn-sm btn-success">send request</a>';
                            }

                            echo '
                                            <a href="function_db.php?mat_id=' .
                                $row20['user_id'] .
                                '" class="btn text-white btn-sm ml-2 btn-primary">Scores</a>';
                            if ($_SESSION['my_status'] == 'P') {
                                echo '<a href="userview.php?id=' .
                                    $row20['user_id'] .
                                    '" class="btn text-white btn-sm ml-2 btn-warning">View Details</a>';
                            } else {
                                echo '<a class="btn text-white btn-sm ml-2 btn-warning" data-backdrop="static" data-toggle="modal" data-target="#info">View Details</a>';
                            }
                            echo '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                    } else {
                        if ($myid == $search or $name == $search) {
                            echo '<p class="text-white text-center h2">You cannot search your Profile!</p>';
                        } else {
                            echo '<p class="text-white text-center h2">Search Not Found!</p>';
                        }
                    }
                }

                //match by preference
                else {
                    $match = mysqli_fetch_assoc(
                        mysqli_query(
                            $conn,
                            "SELECT * FROM user WHERE user_id = $myid"
                        )
                    );
                    $gen = $match['gender'];
                    $age = $match['p_age'];
                    $cas = $match['p_caste'];
                    $rel = $match['p_religion'];
                    $job = $match['p_post'];
                    $run3 = mysqli_query(
                        $conn,
                        "SELECT * FROM user WHERE ((age = '$age' OR religion = '$rel' OR caste = '$cas' OR post = '$job') AND user_id != '$myid' AND gender != '$gen') ORDER BY status DESC"
                    );
                    if (mysqli_num_rows($run3) > 0) {
                        while ($row3 = mysqli_fetch_assoc($run3)) {
                            $id = $row3['user_id'];
                            $status =
                                $row3['status'] == 'P'
                                    ? 'Premium Member'
                                    : 'Free Member';
                            echo '
                                <div class="col-sm-4">
                                    <div class="card my-5 bg-light border rounded" style="height: 90%;">
                                        <div class="card-header">' .
                                $row3['username'] .
                                '</div>
                                        <img class="card-img-top rounded my-1 mx-auto d-block rounded-circle" src="uploads/' .
                                $row3['img'] .
                                '" style="width: 25%;" onerror="this.onerror=null; this.src=' .
                                $_SESSION['dp'] .
                                '"  alt="profile picture">
                                        <div class="card-body">
                                            <h5 class="card-title">' .
                                $status .
                                '</h5>
                                            <p class="card-text">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Full Name</td>
                                                            <td>' .
                                $row3['firstname'] .
                                ' ' .
                                $row3['lastname'] .
                                '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Age</td>
                                                            <td>' .
                                $row3['age'] .
                                '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last Job Company</td>
                                                            <td>' .
                                $row3['l_comp'] .
                                '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Last Job Designation</td>
                                                            <td>' .
                                $row3['l_des'] .
                                '</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </p>
                                            <div class="card-footer d-flex justify-content-center">
                                            ';
                            $req = mysqli_query(
                                $conn,
                                "SELECT * FROM friend WHERE ((sender = $myid AND receiver = $id) OR (sender = $id AND receiver = $myid))"
                            );
                            if (mysqli_num_rows($req) > 0) {
                                $req1 = mysqli_fetch_assoc($req);
                                if (
                                    $req1['sender'] == $myid &&
                                    $req1['receiver'] == $id &&
                                    $req1['status'] == 0
                                ) {
                                    echo '<a class="btn text-white btn-sm btn-primary">Pending</a>';
                                } elseif (
                                    $req1['receiver'] == $myid &&
                                    $req1['sender'] == $id &&
                                    $req1['status'] == 0
                                ) {
                                    echo '<a href="function_db.php?sender=' .
                                        $row3['user_id'] .
                                        '" class="btn text-white btn-sm btn-success">Accept</a>';
                                } elseif (
                                    ($req1['receiver'] == $myid or
                                        $req1['sender'] == $myid) &&
                                    $req1['status'] == 1
                                ) {
                                    echo '<a class="btn btn-sm btn-success text-white">Connected</a>';
                                }
                            } else {
                                echo '<a href="function_db.php?receiver=' .
                                    $row3['user_id'] .
                                    '" class="btn text-white btn-sm btn-success">send request</a>';
                            }
                            $_SESSION['s_id'] = $row3['user_id'];
                            echo '
                                            <a href="function_db.php?mat_id=' .
                                $row3['user_id'] .
                                '" class="btn text-white btn-sm ml-2 btn-primary">Scores</a>';
                            if ($_SESSION['my_status'] == 'P') {
                                echo '<a href="userview.php?id=' .
                                    $row3['user_id'] .
                                    '" class="btn text-white btn-sm ml-2 btn-warning">View Details</a>';
                            } else {
                                echo '<a class="btn text-white btn-sm ml-2 btn-warning" data-backdrop="static" data-toggle="modal" data-target="#info">View Details</a>';
                            }
                            echo '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                    } else {
                        echo '<p class="text-danger text-center h2">Match Not Found!</p>';
                    }
                }
                if (isset($_GET['per']) && isset($_GET['smsg'])) {
                    $percent = $_GET['per'];
                    $smsg = $_GET['smsg'];
                    echo '
                        <script>
                            $(document).ready(function(){
                                $("#match").modal({backdrop: "static"}, "show");
                            });
                        </script>
                        ';
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="modal fade" tabindex="-1" id="match">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-primary">Scores</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                        </div>
                        <div class="modal-body">
                            <table class="table border rounded">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="rounded-circle round bg-primary">
                                                <p class="text-center text-white"><?php echo $percent; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-center pt-3 font-weight-bold"><?php echo $smsg; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Information -->
        <div class="container">
            <div class="modal fade" tabindex="-1" id="info">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-primary">Note</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-danger">Please Upgrade your free membership to premium membership to see the details of the user</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright mar bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
    </section>
    <?php include 'loader.php'; ?>
</body>

</html>