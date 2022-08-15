<?php
require "db.php";
session_start();
if (!isset($_SESSION["name"])) {
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
?>

<body>
  <?php
  include "nav_ad.php";
  ?>
  <section class="main">
    <?php
    include "nav_ad.php";
    if (isset($_GET["id"])) {
      $view_id = $_GET["id"];
      $view = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$view_id'");
      $row2 = mysqli_fetch_assoc($view);
      echo " 
    <div class='container'>
      <div class='card mx-auto my-3 border rounded'>
        <div class='card-header rounded'>User Details</div>
        <img class='card-img-top rounded my-1 mx-auto d-block rounded-circle' src='uploads/" . $row2["img"] . "' style='width: 25%;' onerror='this.onerror=null; this.src=" . $_SESSION["dp"] . "'  alt='profile picture'>
        <div class='card-body'>
          <table class='table border'>
            <tbody>
              <thead class='thead-light text-center'>
                  <th colspan='2'>General Information</th> 
              </thead>
              <tr>
                <td>Full Name</td>
                <td>" . $row2["firstname"] . " " . $row2["lastname"] . "</td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td>" . $row2["dob"] . "</td>
              </tr>
              <tr>
                <td>Age</td>
                <td>" . $row2["age"] . "</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>" . $row2["gender"] . "</td>
              </tr>
              <tr>
                <td>Nationality</td>
                <td>" . $row2["nationality"] . "</td>
              </tr>
              <tr>
                <td>Religion</td>
                <td>" . $row2["religion"] . "</td>
              </tr>
              <tr>
                <td>Caste/Sub-Caste</td>
                <td>" . $row2["caste"] . "</td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>" . $row2["phno"] . "</td>
              </tr>
              <thead class='text-center thead-light'>
                  <th colspan='2'>Personal/Family details</th>  
              </thead>
              <tr>
                <td>Father Name</td>
                <td>" . $row2["f_name"] . "</td>
              </tr>
              <tr>
                <td>Mother Name</td>
                <td>" . $row2["m_name"] . "</td>
              </tr>
              <tr>
                <td>Citizenship</td>
                <td>" . $row2["citizenship"] . "</td>
              </tr>
              <tr>
                <td>About</td>
                <td>" . $row2["a_me"] . "</td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td>" . $row2["b_group"] . "</td>
              </tr>
              <tr>
                <td>Marital Status</td>
                <td>" . $row2["m_status"] . "</td>
              </tr>
              <tr>
                <td>Language Known</td>
                <td>" . $row2["l_known"] . "</td>
              </tr>
              <tr>
                <td>Mother Tongue</td>
                <td>" . $row2["m_ton"] . "</td>
              </tr>
              <tr>
                <td>Family Values</td>
                <td>" . $row2["f_val"] . "</td>
              </tr>
              <tr>
                <td>Family Type</td>
                <td>" . $row2["f_type"] . "</td>
              </tr>
              <tr>
                <td>Family Status</td>
                <td>" . $row2["f_status"] . "</td>
              </tr>
              <tr>
                <td>House</td>
                <td>" . $row2["home"] . "</td>
              </tr>
              <tr>
                <td>Father's Occupation</td>
                <td>" . $row2["f_occ"] . "</td>
              </tr>
              <tr>
                <td>Mother's Occupation</td>
                <td>" . $row2["m_occ"] . "</td>
              </tr>
              <tr>
                <td>No of Brothers</td>
                <td>" . $row2["nob"] . "</td>
              </tr>
              <tr>
                <td>No of Brothers Married</td>
                <td>" . $row2["nob_m"] . "</td>
              </tr>
              <tr>
                <td>No of Sisters</td>
                <td>" . $row2["nos"] . "</td>
              </tr>
              <tr>
                <td>Height</td>
                <td>" . $row2["height"] . "</td>
              </tr>
              <tr>
                <td>Weight</td>
                <td>" . $row2["weight"] . "</td>
              </tr>
              <tr>
                <td>Physical Status</td>
                <td>" . $row2["p_status"] . "</td>
              </tr>
              <tr>
                <td>Body Type</td>
                <td>" . $row2["b_type"] . "</td>
              </tr>
              <tr>
                <td>Complexion</td>
                <td>" . $row2["complexion"] . "</td>
              </tr>
              <tr>
                <td>Eating Habits</td>
                <td>" . $row2["e_habits"] . "</td>
              </tr>
              <tr>
                <td>Smoking Habit</td>
                <td>" . $row2["s_habit"] . "</td>
              </tr>
              <tr>
                <td>Drinking Habit</td>
                <td>" . $row2["d_habit"] . "</td>
              </tr>
              <tr>
                <td>Hobbies</td>
                <td>" . $row2["hobby"] . "</td>
              </tr>
              <thead class='thead-light text-center'>
                  <th colspan='2'>Educational/Professional Information</th> 
              </thead>
              <tr>
                <td>Highest Education</td>
                <td>" . $row2["h_edu"] . "</td>
              </tr>
              <tr>
                <td>Employed In</td>
                <td>" . $row2["employ"] . "</td>
              </tr>
              <tr>
              <tr>
                <td>Job</td>
                <td>" . $row2["post"] . "</td>
              </tr>
              <tr>
                <td>Annual Income(in INR)</td>
                <td>" . $row2["a_income"] . "</td>
              </tr>
              <tr>
                <td>Last Job Company</td>
                <td>" . $row2["l_comp"] . "</td>
              </tr>
              <tr>
                <td>Last Job Designation</td>
                <td>" . $row2["l_des"] . "</td>
              </tr>
              <thead class='thead-light text-center'>
                  <th colspan='2'>Location details</th>
              </thead>
              <tr>
                <td>Address</td>
                <td>" . $row2["address"] . "</td>
              </tr>
              <tr>
                <td>District</td>
                <td>" . $row2["dist"] . "</td>
              </tr>
              <tr>
                <td>State</td>
                <td>" . $row2["state"] . "</td>
              </tr>
              <tr>
                <td>Pin Code</td>
                <td>" . $row2["p_code"] . "</td>
              </tr>
            </tbody>
               
          </table>
        </div>
        <div class='card-footer d-flex justify-content-center'>
          <a href='function_db.php?del_id=" . $row2["user_id"] . "' class='btn ml-2 btn-danger'>Delete User</a>
          <a href='admin.php' class='btn ml-2 btn-warning'>Cancel</a>
        </div>
      </div>
    </div>";
    }
    ?>
    <div class="footer-copyright mar bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
  </section>
  <?php include "loader.php"; ?>
</body>

</html>