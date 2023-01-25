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

  <?php include 'nav_u.php'; ?>

  <section class="main">

    <?php
    $myid = $_SESSION['my_id'];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $view2 = mysqli_query(
            $conn,
            "SELECT * FROM user WHERE user_id = '$id'"
        );

        $row4 = mysqli_fetch_assoc($view2);

        $id = $row4['user_id'];

        echo " 

    <div class='container'>

      <div class='card mx-auto my-3 border rounded'>

        <div class='card-header rounded'>User Details</div>

          <img class='card-img-top rounded my-1 mx-auto d-block rounded-circle' src='uploads/" .
            $row4['img'] .
            "' style='width: 25%;' onerror='this.onerror=null; this.src=" .
            $_SESSION['dp'] .
            "'  alt='profile picture'>

          <div class='card-body'>

            <table class='table'>

            <tbody>

              <thead class='thead-light text-center'>

                  <th colspan='2'>General Information</th> 

              </thead>

              <tr>

                <td>Full Name</td>

                <td>" .
            $row4['firstname'] .
            ' ' .
            $row4['lastname'] .
            "</td>

              </tr>

              <tr>

                <td>Date of Birth</td>

                <td>" .
            $row4['dob'] .
            "</td>

              </tr>

              <tr>

                <td>Age</td>

                <td>" .
            $row4['age'] .
            "</td>

              </tr>

              <tr>

                <td>Gender</td>

                <td>" .
            $row4['gender'] .
            "</td>

              </tr>

              <tr>

                <td>Nationality</td>

                <td>" .
            $row4['nationality'] .
            "</td>

              </tr>

              <tr>

                <td>Religion</td>

                <td>" .
            $row4['religion'] .
            "</td>

              </tr>

              <tr>

                <td>Caste/Sub-Caste</td>

                <td>" .
            $row4['caste'] .
            "</td>

              </tr>

              <tr>

                <td>Phone Number</td>

                <td>" .
            $row4['phno'] .
            "</td>

              </tr>

              <thead class='text-center thead-light'>

                  <th colspan='2'>Personal/Family details</th>  

              </thead>

              <tr>

                <td>Father Name</td>

                <td>" .
            $row4['f_name'] .
            "</td>

              </tr>

              <tr>

                <td>Mother Name</td>

                <td>" .
            $row4['m_name'] .
            "</td>

              </tr>

              <tr>

                <td>Citizenship</td>

                <td>" .
            $row4['citizenship'] .
            "</td>

              </tr>

              <tr>

                <td>About</td>

                <td>" .
            $row4['a_me'] .
            "</td>

              </tr>

              <tr>

                <td>Blood Group</td>

                <td>" .
            $row4['b_group'] .
            "</td>

              </tr>

              <tr>

                <td>Marital Status</td>

                <td>" .
            $row4['m_status'] .
            "</td>

              </tr>

              <tr>

                <td>Language Known</td>

                <td>" .
            $row4['l_known'] .
            "</td>

              </tr>

              <tr>

                <td>Mother Tongue</td>

                <td>" .
            $row4['m_ton'] .
            "</td>

              </tr>

              <tr>

                <td>Family Values</td>

                <td>" .
            $row4['f_val'] .
            "</td>

              </tr>

              <tr>

                <td>Family Type</td>

                <td>" .
            $row4['f_type'] .
            "</td>

              </tr>

              <tr>

                <td>Family Status</td>

                <td>" .
            $row4['f_status'] .
            "</td>

              </tr>

              <tr>

                <td>House</td>

                <td>" .
            $row4['home'] .
            "</td>

              </tr>

              <tr>

                <td>Father's Occupation</td>

                <td>" .
            $row4['f_occ'] .
            "</td>

              </tr>

              <tr>

                <td>Mother's Occupation</td>

                <td>" .
            $row4['m_occ'] .
            "</td>

              </tr>

              <tr>

                <td>No of Brothers</td>

                <td>" .
            $row4['nob'] .
            "</td>

              </tr>

              <tr>

                <td>No of Brothers Married</td>

                <td>" .
            $row4['nob_m'] .
            "</td>

              </tr>

              <tr>

                <td>No of Sisters</td>

                <td>" .
            $row4['nos'] .
            "</td>

              </tr>

              <tr>

                <td>Height</td>

                <td>" .
            $row4['height'] .
            "</td>

              </tr>

              <tr>

                <td>Weight</td>

                <td>" .
            $row4['weight'] .
            "</td>

              </tr>

              <tr>

                <td>Physical Status</td>

                <td>" .
            $row4['p_status'] .
            "</td>

              </tr>

              <tr>

                <td>Body Type</td>

                <td>" .
            $row4['b_type'] .
            "</td>

              </tr>

              <tr>

                <td>Complexion</td>

                <td>" .
            $row4['complexion'] .
            "</td>

              </tr>

              <tr>

                <td>Eating Habits</td>

                <td>" .
            $row4['e_habits'] .
            "</td>

              </tr>

              <tr>

                <td>Smoking Habit</td>

                <td>" .
            $row4['s_habit'] .
            "</td>

              </tr>

              <tr>

                <td>Drinking Habit</td>

                <td>" .
            $row4['d_habit'] .
            "</td>

              </tr>

              <tr>

                <td>Hobbies</td>

                <td>" .
            $row4['hobby'] .
            "</td>

              </tr>

              <thead class='thead-light text-center'>

                  <th colspan='2'>Educational/Professional Information</th> 

              </thead>

              <tr>

                <td>Highest Education</td>

                <td>" .
            $row4['h_edu'] .
            "</td>

              </tr>

              <tr>

                <td>Employed In</td>

                <td>" .
            $row4['employ'] .
            "</td>

              </tr>

              <tr>

              <tr>

                <td>Job</td>

                <td>" .
            $row4['post'] .
            "</td>

              </tr>

              <tr>

                <td>Annual Income(in INR)</td>

                <td>" .
            $row4['a_income'] .
            "</td>

              </tr>

              <tr>

                <td>Last Job Company</td>

                <td>" .
            $row4['l_comp'] .
            "</td>

              </tr>

              <tr>

                <td>Last Job Designation</td>

                <td>" .
            $row4['l_des'] .
            "</td>

              </tr>

              <thead class='thead-light text-center'>

                  <th colspan='2'>Location details</th>

              </thead>

              <tr>

                <td>Address</td>

                <td>" .
            $row4['address'] .
            "</td>

              </tr>

              <tr>

                <td>District</td>

                <td>" .
            $row4['dist'] .
            "</td>

              </tr>

              <tr>

                <td>State</td>

                <td>" .
            $row4['state'] .
            "</td>

              </tr>

              <tr>

                <td>Pin Code</td>

                <td>" .
            $row4['p_code'] .
            "</td>

              </tr>

            </tbody>

            </table>

          </div>

          <div class='card-footer d-flex justify-content-center'>";

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
                    $row4['user_id'] .
                    '" class="btn text-white btn-sm btn-success">Accept</a>';
            } elseif (
                ($req1['receiver'] == $myid or $req1['sender'] == $myid) &&
                $req1['status'] == 1
            ) {
                echo '<a class="btn btn-sm btn-success text-white">Connected</a>';
            }
        } else {
            echo '<a href="function_db.php?receiver=' .
                $row4['user_id'] .
                '" class="btn text-white btn-sm btn-success">send request</a>';
        }

        echo " 

           <a href='function_db.php?matu_id=" .
            $row4['user_id'] .
            "' class='text-white btn ml-2 btn-primary'>Scores</a>

           <a href='userhome.php' class='text-white btn ml-2 btn-warning'>Cancel</a>

          </div>

      </div>

    </div>";
    }

    if (isset($_GET['per']) && isset($_GET['smsg'])) {
        $percent = $_GET['per'];

        $smsg = $_GET['smsg'];

        echo '

    <script>

        $(document).ready(function(){

            $("#matchu").modal({backdrop: "static"}, "show");

        });

    </script>

    ';
    }
    ?>

    <div class="container">

      <div class="modal fade" tabindex="-1" id="matchu">

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

    <div class="footer-copyright mar bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

  </section>

  <?php include 'loader.php'; ?>

</body>



</html>