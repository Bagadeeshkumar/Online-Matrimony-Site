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
  include "nav_u.php";
  $myid = $_SESSION["my_id"];
  ?>
  <section class="main">
    <div class="container">
      <?php if (isset($_GET["success_chg"])) { ?>
        <p class="text-success text-center mt-1"><?php echo $_GET["success_chg"]; ?></p>
      <?php } ?>
      <?php if (isset($_GET["error_chg"])) { ?>
        <p class="text-danger text-center mt-1"><?php echo $_GET["error_chg"]; ?></p>
      <?php } ?>
      <div class="card mx-auto my-3 border rounded">
        <div class="card-header rounded">
          <span>User Details</span>
          <a href="edit.php" type="submit" class="float-right btn btn-sm btn-warning">Edit</a>
        </div>
        <?php
        $view1 = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$myid'");
        $row3 = mysqli_fetch_assoc($view1);
        echo " 
        <img class='card-img-top rounded my-1 mx-auto d-block rounded-circle' src='uploads/" . $row3["img"] . "' style='width: 25%;' onerror='this.onerror=null; this.src=" . $_SESSION["dp"] . "'  alt='profile picture'>
        <div class='card-body'>
          <table class='table'>
            <tbody>
              <thead class='thead-light text-center'>
                  <th colspan='2'>General Information</th> 
              </thead>
              <tr>
                <td>Full Name</td>
                <td>" . $row3["firstname"] . " " . $row3["lastname"] . "</td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td>" . $row3["dob"] . "</td>
              </tr>
              <tr>
                <td>Age</td>
                <td>" . $row3["age"] . "</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>" . $row3["gender"] . "</td>
              </tr>
              <tr>
                <td>Nationality</td>
                <td>" . $row3["nationality"] . "</td>
              </tr>
              <tr>
                <td>Religion</td>
                <td>" . $row3["religion"] . "</td>
              </tr>
              <tr>
                <td>Caste/Sub-Caste</td>
                <td>" . $row3["caste"] . "</td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>" . $row3["phno"] . "</td>
              </tr>
              <thead class='text-center thead-light'>
                  <th colspan='2'>Personal/Family details</th>  
              </thead>
              <tr>
                <td>Father Name</td>
                <td>" . $row3["f_name"] . "</td>
              </tr>
              <tr>
                <td>Mother Name</td>
                <td>" . $row3["m_name"] . "</td>
              </tr>
              <tr>
                <td>Citizenship</td>
                <td>" . $row3["citizenship"] . "</td>
              </tr>
              <tr>
                <td>About</td>
                <td>" . $row3["a_me"] . "</td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td>" . $row3["b_group"] . "</td>
              </tr>
              <tr>
                <td>Marital Status</td>
                <td>" . $row3["m_status"] . "</td>
              </tr>
              <tr>
                <td>Language Known</td>
                <td>" . $row3["l_known"] . "</td>
              </tr>
              <tr>
                <td>Mother Tongue</td>
                <td>" . $row3["m_ton"] . "</td>
              </tr>
              <tr>
                <td>Family Values</td>
                <td>" . $row3["f_val"] . "</td>
              </tr>
              <tr>
                <td>Family Type</td>
                <td>" . $row3["f_type"] . "</td>
              </tr>
              <tr>
                <td>Family Status</td>
                <td>" . $row3["f_status"] . "</td>
              </tr>
              <tr>
                <td>House</td>
                <td>" . $row3["home"] . "</td>
              </tr>
              <tr>
                <td>Father's Occupation</td>
                <td>" . $row3["f_occ"] . "</td>
              </tr>
              <tr>
                <td>Mother's Occupation</td>
                <td>" . $row3["m_occ"] . "</td>
              </tr>
              <tr>
                <td>No of Brothers</td>
                <td>" . $row3["nob"] . "</td>
              </tr>
              <tr>
                <td>No of Brothers Married</td>
                <td>" . $row3["nob_m"] . "</td>
              </tr>
              <tr>
                <td>No of Sisters</td>
                <td>" . $row3["nos"] . "</td>
              </tr>
              <tr>
                <td>Height</td>
                <td>" . $row3["height"] . "</td>
              </tr>
              <tr>
                <td>Weight</td>
                <td>" . $row3["weight"] . "</td>
              </tr>
              <tr>
                <td>Physical Status</td>
                <td>" . $row3["p_status"] . "</td>
              </tr>
              <tr>
                <td>Body Type</td>
                <td>" . $row3["b_type"] . "</td>
              </tr>
              <tr>
                <td>Complexion</td>
                <td>" . $row3["complexion"] . "</td>
              </tr>
              <tr>
                <td>Eating Habits</td>
                <td>" . $row3["e_habits"] . "</td>
              </tr>
              <tr>
                <td>Smoking Habit</td>
                <td>" . $row3["s_habit"] . "</td>
              </tr>
              <tr>
                <td>Drinking Habit</td>
                <td>" . $row3["d_habit"] . "</td>
              </tr>
              <tr>
                <td>Hobbies</td>
                <td>" . $row3["hobby"] . "</td>
              </tr>
              <thead class='thead-light text-center'>
                  <th colspan='2'>Educational/Professional Information</th> 
              </thead>
              <tr>
                <td>Highest Education</td>
                <td>" . $row3["h_edu"] . "</td>
              </tr>
              <tr>
                <td>Employed In</td>
                <td>" . $row3["employ"] . "</td>
              </tr>
              <tr>
              <tr>
                <td>Job</td>
                <td>" . $row3["post"] . "</td>
              </tr>
              <tr>
                <td>Annual Income(in INR)</td>
                <td>" . $row3["a_income"] . "</td>
              </tr>
              <tr>
                <td>Last Job Company</td>
                <td>" . $row3["l_comp"] . "</td>
              </tr>
              <tr>
                <td>Last Job Designation</td>
                <td>" . $row3["l_des"] . "</td>
              </tr>
              <thead class='thead-light text-center'>
                  <th colspan='2'>Location details</th>
              </thead>
              <tr>
                <td>Address</td>
                <td>" . $row3["address"] . "</td>
              </tr>
              <tr>
                <td>District</td>
                <td>" . $row3["dist"] . "</td>
              </tr>
              <tr>
                <td>State</td>
                <td>" . $row3["state"] . "</td>
              </tr>
              <tr>
                <td>Pin Code</td>
                <td>" . $row3["p_code"] . "</td>
              </tr>
            </tbody>";
        ?>
        </table>
      </div>
    </div>
    <div class="mx-auto p-3 border border-primary rounded" id="chg" style="width: 600px; margin-top: 5%;">
      <form action="function_db.php" method="POST">
        <div class="text-center py-1">
          <h2>Change Password</h2>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm-10">
            <input type="password" name="logch_pass" class="form-control" id="inputPassword" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="chgPassword" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" name="chg_pass" class="form-control" id="chgPassword" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="chgcPassword" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" name="chgc_pass" class="form-control" id="chgcPassword" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
            <button type="submit" name="chg_submit" class="btn-block btn btn-primary">Change</button>
          </div>
        </div>
      </form>
    </div>
    </div>
    <div class="footer-copyright mar bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
  </section>
  <?php include "loader.php" ?>
</body>

</html>