<?php

require 'db.php';

session_start();

if (!isset($_SESSION['name'])) {
    header('Location:index.php');
}

$myid = $_SESSION['my_id'];
?>

<!DOCTYPE html>

<html lang="en">

<?php include 'header.php'; ?>

<body>

    <?php include 'nav_u.php'; ?>

    <section class="main">

        <?php
        $view4 = mysqli_query(
            $conn,
            "SELECT * FROM user WHERE user_id = '$myid'"
        );

        $row5 = mysqli_fetch_assoc($view4);

        $msg = isset($_GET['msg']) ? $_GET['msg'] : 'Please fill the full form';

        echo '

        <div class="mx-auto p-3 border border-primary rounded container" style="margin-top: 10%; margin-bottom: 5%;">

            <form action="function_db.php" method="POST" enctype="multipart/form-data">

                <div class="text-center">

                    <h2 class="p-2">Update your Profile</h2>

                    <p class="text-danger">' .
            $msg .
            '</p>

                </div>

                <h3 class="pb-2 text-primary">General Information</h3>

                <div class="form-group row">

                    <label for="Fname" class="col-sm-2 col-form-label">Full Name</label>

                    <div class="d-inline-flex col-sm-10">

                        <input type="text" name="fi_name" class="form-control" id="Fname" value="' .
            $row5['firstname'] .
            '" required>

                        <input type="text" name="l_name" class="form-control ml-3" id="Fname" value="' .
            $row5['lastname'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="dob" class="col-sm-2 col-form-label">Date of birth</label>

                    <div class="col-sm-10">

                        <input type="date" name="dob" class="form-control" id="dob" value="' .
            $row5['dob'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="age">Age</label>

                    <div class="col-sm-10">

                        <select name="age" class="form-control" id="age" required>

                        <option value="19">19</option>

                        <option value="20">20</option>

                        <option value="21">21</option>

                        <option value="22">22</option>

                        <option value="23">23</option>

                        <option value="24">24</option>

                        <option value="25">25</option>    

                        <option value="26">26</option>

                        <option value="27">27</option>

                        <option value="28">28</option>

                        <option value="29">29</option>

                        <option value="30">30</option>

                        <option value="31">31</option>

                        <option value="32">32</option>

                        <option value="33">33</option>

                        <option value="34">34</option>

                        <option value="35">35</option>

                        <option value="36">36</option>

                        <option value="37">37</option>

                        <option value="38">38</option>

                        <option value="39">39</option>

                        <option value="40">40</option>

                        <option value="41">41</option>

                        <option value="42">42</option>

                        <option value="43">43</option>

                        <option value="44">44</option>

                        <option value="45">45</option>

                        <option value="46">46</option>

                        <option value="47">47</option>

                        <option value="48">48</option>

                        <option value="49">49</option>

                        <option value="50">50</option>

                        <option value="51">51</option>

                        <option value="52">52</option>

                        <option value="53">53</option>

                        <option value="54">54</option>

                        <option value="55">55</option>

                        <option value="56">56</option>

                        <option value="57">57</option>

                        <option value="58">58</option>

                        <option value="59">59</option>

                        <option value="60">60</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0">Gender</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="gender" required id="male" value="Male">

                            <label class="form-check-label" for="male">Male</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female">

                            <label class="form-check-label" for="female">Female</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="gender" id="others_gen" value="Others">

                            <label class="form-check-label" for="others_gen">others</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0">Nationality</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="nation" required id="indian" value="Indian">

                            <label class="form-check-label" for="indian">Indian</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="nation" id="others_nation" value="Others">

                            <label class="form-check-label" for="others_nation">Others</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="religion">Religion</label>

                    <div class="col-sm-10">

                        <select name="rel" class="form-control" id="religion" required>

                            <option value="Hindu">Hindu</option>    

                            <option value="Muslim">Muslim</option>    

                            <option value="Christian">Christian</option>    

                            <option value="Sikh">Sikh</option>    

                            <option value="Jain">Jain</option>    

                            <option value="Parsi">Parsi</option>    

                            <option value="Buddhist">Buddhist</option>    

                            <option value="Inter Religion">Inter Religion</option>    

                            <option value="No Religious Belief">No Religious Belief</option>    

                            <option value="Others">Others</option>    

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="caste" class="col-sm-2 col-form-label">Caste/Sub-Caste</label>

                    <div class="col-sm-10">

                        <input type="text" name="caste" class="form-control" id="caste" value="' .
            $row5['caste'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="ph_no" class="col-sm-2 col-form-label">Phone Number</label>

                    <div class="col-sm-10">

                        <input type="text" name="ph_no" class="form-control" id="ph_no" value="' .
            $row5['phno'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="customFile" class="col-sm-2 col-form-label">Image</label>

                    <div class="custom-file col-sm-9 ml-3">

                        <input type="file" name="file" class="custom-file-input form-control" id="customFile" required>

                        <label class="custom-file-label" for="customFile">Choose Image</label>

                    </div>

                </div>



                <h3 class="pb-2 text-primary">Personal/Family details</h3>

                <div class="form-group row">

                    <label for="f_name" class="col-sm-2 col-form-label">Father Name</label>

                    <div class="col-sm-10">

                        <input type="text" name="f_name" class="form-control" id="f_name" value="' .
            $row5['f_name'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="m_name" class="col-sm-2 col-form-label">Mother Name</label>

                    <div class="col-sm-10">

                        <input type="text" name="m_name" class="form-control" id="m_name" value="' .
            $row5['m_name'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="citizen" class="col-sm-2 col-form-label">Citizenship</label>

                    <div class="col-sm-10">

                        <input type="text" name="citizen" class="form-control" id="citizen" value="' .
            $row5['citizenship'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="about" class="col-sm-2 col-form-label">About me</label>

                    <div class="col-sm-10">

                        <textarea name="a_me" class="form-control" rows="5" id="about" value="' .
            $row5['a_me'] .
            '" required></textarea>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="blood" class="col-sm-2 col-form-label">Blood Group</label>

                    <div class="col-sm-10">

                        <input name="b_grp" type="text" class="form-control" value="' .
            $row5['b_group'] .
            '" id="blood" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="status">Marital Status</label>

                    <div class="col-sm-10">

                        <select name="m_status" class="form-control" id="status" required>

                            <option value="Never Married">Never Married</option>    

                            <option value="Widowed">Widowed</option>    

                            <option value="Divorced">Divorced</option>    

                            <option value="Awaiting Divorce">Awaiting Divorce</option>    

                        </select> 

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="l_known">Languages Known</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="l_known" id="ind" required value="Only Indian">

                            <label class="form-check-label" for="ind">Only Indian</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="l_known" id="ind+eng" value="Indian + English">

                            <label class="form-check-label" for="ind+eng">Indian + English</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="l_known" id="ind+forn" value="Indian + Foreign Language">

                            <label class="form-check-label" for="ind+forn">Indian + Foreign Language</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="mton">Mother Tongue</label>

                    <div class="col-sm-10">

                        <select name="m_ton" class="form-control" id="mton" required>

                            <option value="Tamil">Tamil</option>    

                            <option value="English">English</option>

                            <option value="Hindi">Hindi</option>

                            <option value="Bengali">Bengali</option>

                            <option value="Marathi">Marathi</option>

                            <option value="Telugu">Telugu</option>

                            <option value="Gujarati">Gujarati</option>

                            <option value="Urdu">Urdu</option>

                            <option value="Kannada">Kannada</option>

                            <option value="Odia">Odia</option>

                            <option value="Malayalam">Malayalam</option>

                            <option value="Punjabi">Punjabi</option>

                            <option value="Sanskrit">Sanskrit</option>

                            <option value="Other">Other</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="f_values">Family Values</label>

                    <div class="col-sm-10">

                        <select name="f_values" class="form-control" id="f_values" required>

                            <option value="Orthodox">Orthodox</option>     

                            <option value="Liberal">Liberal</option>     

                            <option value="Traditional">Traditional</option>     

                            <option value="Modern">Modern</option>     

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" name="f_type">Family Type</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="f_type" id="joint" value="Joint" required>

                            <label class="form-check-label" for="joint">Joint</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="f_type" id="nuclear" value="Nuclear">

                            <label class="form-check-label" for="nuclear">Nuclear</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="f_type" id="other_f_type" value="Others">

                            <label class="form-check-label" for="other_f_type">Others</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="f_status">Family Status</label>

                    <div class="col-sm-10">

                        <select name="f_status" class="form-control" id="f_status" required>

                            <option value="Lower Middle Class">Lower Middle Class</option>

                            <option value="Middle Class">Middle Class</option>

                            <option value="Upper Middle">Upper Middle Class</option>

                            <option value="Rich">Rich</option>

                            <option value="Affluent">Affluent</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="house" class="col-sm-2 col-form-label pt-0">House</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="h_status" id="own_house" value="own" required>

                            <label class="form-check-label" for="own_house">Own House</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="h_status" id="rent" value="rent">

                            <label class="form-check-label" for="rent">Rental House</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="f_occ">Father\'s Occupation</label>

                    <div class="col-sm-10">

                        <select name="f_occ" class="form-control" id="f_occ" required>

                            <option value="Government Job">Government Job</option>

                            <option value="Private Job">Private Job</option>

                            <option value="Business">Business</option>

                            <option value="Retired">Retired</option>

                            <option value="Others">Others</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="m_occ">Mother\'s Occupation</label>

                    <div class="col-sm-10">

                        <select name="m_occ" class="form-control" id="m_occ" required>

                            <option value="Housewife">House Wife</option>

                            <option value="Government Job">Government Job</option>

                            <option value="Private Job">Private Job</option>

                            <option value="Business">Business</option>

                            <option value="Retired">Retired</option>

                            <option value="Others">Others</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="nob">No of Brothers</label>

                    <div class="col-sm-10">

                        <select name="nob" class="form-control" id="nob" required>

                            <option value="0">0</option>

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="4">4</option>

                            <option value="5">5</option>

                            <option value=">5">>5</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="nobm">No of Brothers Married</label>

                    <div class="col-sm-10">

                        <select name="nob_m" class="form-control" id="nobm" required>

                            <option value="0">0</option>

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="4">4</option>

                            <option value="5">5</option>

                            <option value=">5">>5</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="nos">No of Sisters</label>

                    <div class="col-sm-10">

                        <select name="nos" class="form-control" id="nos" required>

                            <option value="0">0</option>

                            <option value="1">1</option>

                            <option value="2">2</option>

                            <option value="3">3</option>

                            <option value="4">4</option>

                            <option value="5">5</option>

                            <option value=">5">>5</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="height">Height</label>

                    <div class="col-sm-10">

                        <select name="height" class="form-control" id="height" required>

                            <option value="4\'0 Feet">4\'0" Feet</option>

                            <option value="4\'1 Feet">4\'1" Feet</option>

                            <option value="4\'2 Feet">4\'2" Feet</option>

                            <option value="4\'3 Feet">4\'3" Feet</option>

                            <option value="4\'4 Feet">4\'4" Feet</option>

                            <option value="4\'5 Feet">4\'5" Feet</option>

                            <option value="4\'6 Feet">4\'6" Feet</option>

                            <option value="4\'7 Feet">4\'7" Feet</option>

                            <option value="4\'8 Feet">4\'8" Feet</option>

                            <option value="4\'9 Feet">4\'9" Feet</option>

                            <option value="4\'10 Feet">4\'10" Feet</option>

                            <option value="4\'11 Feet">4\'11" Feet</option>

                            <option value="5\'0 Feet">5\'0" Feet</option>

                            <option value="5\'1 Feet">5\'1" Feet</option>

                            <option value="5\'2 Feet">5\'2" Feet</option>

                            <option value="5\'3 Feet">5\'3" Feet</option>

                            <option value="5\'4 Feet">5\'4" Feet</option>

                            <option value="5\'5 Feet">5\'5" Feet</option>

                            <option value="5\'6 Feet">5\'6" Feet</option>

                            <option value="5\'7 Feet">5\'7" Feet</option>

                            <option value="5\'8 Feet">5\'8" Feet</option>

                            <option value="5\'9 Feet">5\'9" Feet</option>

                            <option value="5\'10 Feet">5\'10" Feet</option>

                            <option value="5\'11 Feet">5\'11" Feet</option>

                            <option value="6\'0 Feet">6\'0" Feet</option>

                            <option value="6\'1 Feet">6\'1" Feet</option>

                            <option value="6\'2 Feet">6\'2" Feet</option>

                            <option value="6\'3 Feet">6\'3" Feet</option>

                            <option value="6\'4 Feet">6\'4" Feet</option>

                            <option value="6\'5 Feet">6\'5" Feet</option>

                            <option value="more than 6\'5 Feet">more than 6\'5" Feet</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="weight">Weight</label>

                    <div class="col-sm-10">

                        <select name="weight" class="form-control" id="weight" required>

                            <option value="Below 40kg">Below 40kg</option>    

                            <option value="41-45kg">41-45kg</option>

                            <option value="46-50kg">46-50kg</option>

                            <option value="51-55kg">51-55kg</option>

                            <option value="56-60kg">56-60kg</option>

                            <option value="61-65kg">61-65kg</option>

                            <option value="66-70kg">66-70kg</option>

                            <option value="71-75kg">71-75kg</option>

                            <option value="76-80kg">76-80kg</option>

                            <option value="81-85kg">81-85kg</option>

                            <option value="86-90kg">86-90kg</option>

                            <option value="91-95kg">91-95kg</option>

                            <option value="96-100kg">96-100kg</option>

                            <option value="Above 100kg">Above 100kg</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0">Physical Status</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="p_status" id="p_status_n" value="Normal" required>

                            <label class="form-check-label" for="p_status_n">Normal</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="p_status" id="p_status_pc" value="Physically Challenged">

                            <label class="form-check-label" for="p_status_pc">Physically Challenged</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="p_status" id="p_status_parc" value="Partially Challenged">

                            <label class="form-check-label" for="p_status_parc">Partially Challenged</label>

                        </div>

                    </div>

                </div> 



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="b_type">Body Type</label>

                    <div class="col-sm-10">

                        <select name="b_type" class="form-control" id="b_type" required>

                            <option value="Slim">Slim</option>

                            <option value="Athletic">Athletic</option>

                            <option value="Average">Average</option>

                            <option value="Heavy">Heavy</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="colour">Complexion</label>

                    <div class="col-sm-10">

                        <select name="color" class="form-control" id="colour" required>

                            <option value="very Fair">very Fair</option>

                            <option value="Fair">Fair</option>

                            <option value="Wheatish Brown">Wheatish Brown</option>

                            <option value="Wheatish">Wheatish</option>

                            <option value="Dark">Dark</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="e-habits">Eating Habits</label>

                    <div class="col-sm-10">

                        <select name="food" class="form-control" id="e-habits" required>

                            <option value="Vegetarian">Vegetarian</option>

                            <option value="Non Vegetarian">Non Vegetarian</option>

                            <option value="Egg Only">Egg Only</option>

                            <option value="Fish Only">Fish Only</option>

                            <option value="Jain Food">Jain Food</option>

                            <option value="Others">Others</option>

                        </select>

                    </div>

                </div>

                

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0">Smoking Habit</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="s_habit" id="y" value="Yes" required>

                            <label class="form-check-label" for="y">Yes</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="s_habit" id="sometime" value="sometime">

                            <label class="form-check-label" for="sometime">Occassionally</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="s_habit" id="n" value="No">

                            <label class="form-check-label" for="n">No</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0">Drinking Habit</label>

                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="d_habit" id="y" value="Yes" required>

                            <label class="form-check-label" for="y">Yes</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="d_habit" id="sometime" value="sometime">

                            <label class="form-check-label" for="sometime">Occassionally</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="d_habit" id="n" value="No">

                            <label class="form-check-label" for="n">No</label>

                        </div>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="hobby_form">Hobbies</label>

                    <div class="col-sm-10">

                        <select name="hobby" class="form-control" id="hobby_form" required>

                        <option value="Acting">Acting</option>

                        <option value="Dancing">Dancing</option>

                        <option value="Painting">Painting</option>

                        <option value="Arts/Handicrafts">Arts/Handicrafts</option>

                        <option value="Fishing">Fishing</option>

                        <option value="Pets">Pets</option>

                        <option value="Gardening/Landscaping">Gardening/Landscaping</option>

                        <option value="Photography">Photography</option>

                        <option value="Cooking">Cooking</option>

                        <option value="Music">Music</option>

                        <option value="Collections">Collections</option>

                        <option value="Film Making">Film Making</option>

                        <option value="Palmistry">Palmistry</option>

                        <option value="Astrology">Astrology</option>

                        <option value="Astronomy">Astronomy</option>

                        <option value="Nature">Nature</option>

                        <option value="Puzzles/Crosswords">Puzzles/Crosswords</option>

                        <option value="Others">Others</option>

                        </select>

                    </div>

                </div>



                <h3 class="pb-2 text-primary">Educational/Professional Information</h3>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="h_education">Highest Education</label>

                    <div class="col-sm-10">

                        <select name="edu" class="form-control" id="h_education" required>

                            <option value="PHD">PHD</option>

                            <option value="M.Phil">M.Phil</option>

                            <option value="Post Graduate">Post Graduate</option>

                            <option value="Graduate">Graduate</option>

                            <option value="Diploma">Diploma</option>

                            <option value="High School">High School</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="employed">Employed In</label>

                    <div class="col-sm-10">

                        <select name="employ" class="form-control" id="employed" required>

                            <option value="Unemployed">Unemployed</option>

                            <option value="Government Job">Government Job</option>

                            <option value="Private Job">Private Job</option>

                            <option value="Business Alone">Business Alone</option>

                            <option value="Business In Partnership">Business In Partnership</option>

                            <option value="Self Defence">Self Defence</option>

                            <option value="Self Employed">Self Employed</option>

                            <option value="Freelancer">Freelancer</option>

                            <option value="Others">Others</option>

                        </select>

                    </div>

                </div>

                

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="employed">Profession Area</label>

                    <div class="col-sm-10">

                        <select name="profession" class="form-control" id="employed" required>

                            <option value="Accounting, Banking & Finance">Accounting, Banking & Finance</option>

                            <option value="Administration & HR">Administration & HR</option>

                            <option value="Advertising, Media & Entertainment">Advertising, Media & Entertainment</option>

                            <option value="Agriculture">Agriculture</option>

                            <option value="Airline & Aviation">Airline & Aviation</option>

                            <option value="Architecture & Design">Architecture & Design</option>

                            <option value="Artists, Animators & Web Designers">Artists, Animators & Web Designers</option>

                            <option value="BPO, KPO & Customer Support">BPO, KPO & Customer Support</option>

                            <option value="Beauty, Fashion & Jewellery Designers">Beauty, Fashion & Jewellery Designers</option>

                            <option value="Civil Services/Law Enforcement">Civil Services/Law Enforcement</option>

                            <option value="Corporate Professionals">Corporate Professionals</option>

                            <option value="Defence">Defence</option>

                            <option value="Education & Training">Education & Training</option>

                            <option value="Engineering">Engineering</option>

                            <option value="Hotel & Hospitality">Hotel & Hospitality</option>

                            <option value="IT & Software Engineering">IT & Software Engineering</option>

                            <option value="Legal">Legal</option>

                            <option value="Medical & Healthcare">Medical & Healthcare</option>

                            <option value="Merchant Navy">Merchant Navy</option>

                            <option value="Non Working">Non Working</option>

                            <option value="Others">Others</option>

                            <option value="Sales & Marketing">Sales & Marketing</option>

                            <option value="Science">Science</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="income">Annual Income(in INR)</label>

                    <div class="col-sm-10">

                        <select name="income" class="form-control" id="income" required>

                            <option value="0-1 lakh">0-1 lakh</option>

                            <option value="1-2 lakh">1-2 lakh</option>

                            <option value="2-3 lakh">2-3 lakh</option>

                            <option value="3-4 lakh">3-4 lakh</option>

                            <option value="4-5 lakh">4-5 lakh</option>

                            <option value="5-6 lakh">5-6 lakh</option>

                            <option value="6-7 lakh">6-7 lakh</option>

                            <option value="7-8 lakh">7-8 lakh</option>

                            <option value="8-9 lakh">8-9 lakh</option>

                            <option value="9-10 lakh">9-10 lakh</option>

                            <option value="10-12 lakh">10-12 lakh</option>

                            <option value="12-14 lakh">12-14 lakh</option>

                            <option value="14-16 lakh">14-16 lakh</option>

                            <option value="16-18 lakh">16-18 lakh</option>

                            <option value="18-20 lakh">18-20 lakh</option>

                            <option value="20-25 lakh">20-25 lakh</option>

                            <option value="25-30 lakh">25-30 lakh</option>

                            <option value="30-35 lakh">30-35 lakh</option>

                            <option value="35-40 lakh">35-40 lakh</option>

                            <option value="40-45 lakh">40-45 lakh</option>

                            <option value="45-50 lakh">45-50 lakh</option>

                            <option value="50-55 lakh">50-55 lakh</option>

                            <option value="55-60 lakh">55-60 lakh</option>

                            <option value="60-65 lakh">60-65 lakh</option>

                            <option value="65-70 lakh">65-70 lakh</option>

                            <option value="70-75 lakh">70-75 lakh</option>

                            <option value="75-80 lakh">75-80 lakh</option>

                            <option value="80-85 lakh">80-85 lakh</option>

                            <option value="85-90 lakh">85-90 lakh</option>

                            <option value="90-95 lakh">90-95 lakh</option>

                            <option value="95 lakh to 1cr">95 lakh to 1cr</option>

                            <option value="more than 1cr">more than 1cr</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="ljc" class="col-sm-2 col-form-label">Last Job Company</label>

                    <div class="col-sm-10">

                        <input name="company" type="text" class="form-control" id="ljc" value="' .
            $row5['l_comp'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="ljd" class="col-sm-2 col-form-label">Last Job Designation</label>

                    <div class="col-sm-10">

                        <input name="position" type="text" class="form-control" id="ljd" value="' .
            $row5['l_des'] .
            '" required>

                    </div>

                </div>

                



                <h3 class="pb-2 text-primary">Location details</h3>



                <div class="form-group row">

                    <label for="address" class="col-sm-2 col-form-label">Address</label>

                    <div class="col-sm-10">

                        <textarea name="address" class="form-control" rows="5" id="address" value="' .
            $row5['address'] .
            '" required></textarea>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="dist" class="col-sm-2 col-form-label">District</label>

                    <div class="col-sm-10">

                        <input name="dist" type="text" class="form-control" id="dist" value="' .
            $row5['dist'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="location_form">State</label>

                    <div class="col-sm-10">

                        <select name="state" class="form-control" id="location_form" required>

                        <option value="Andhra Pradesh">Andhra Pradesh</option>

                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>

                        <option value="Assam">Assam</option>

                        <option value="Bihar">Bihar</option>

                        <option value="Chhattisgarh">Chhattisgarh</option>

                        <option value="Goa">Goa</option>

                        <option value="Gujarat">Gujarat</option>

                        <option value="Haryana">Haryana</option>

                        <option value="Himachal Pradesh">Himachal Pradesh</option>

                        <option value="Jharkhand">Jharkhand</option>

                        <option value="Karnataka">Karnataka</option>

                        <option value="Kerala">Kerala</option>

                        <option value="Madhya Pradesh">Madhya Pradesh</option>

                        <option value="Maharashtra">Maharashtra</option>

                        <option value="Manipur">Manipur</option>

                        <option value="Meghalaya">Meghalaya</option>

                        <option value="Mizoram">Mizoram</option>

                        <option value="Nagaland">Nagaland</option>

                        <option value="Odisha">Odisha</option>

                        <option value="Punjab">Punjab</option>

                        <option value="Rajasthan">Rajasthan</option>

                        <option value="Sikkim">Sikkim</option>

                        <option value="Tamil Nadu">Tamil Nadu</option>

                        <option value="Telangana">Telangana</option>

                        <option value="Tripura">Tripura</option>

                        <option value="Uttar Pradesh">Uttar Pradesh</option>

                        <option value="Uttarakhand">Uttarakhand</option>

                        <option value="West Bengal">West Bengal</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="code" class="col-sm-2 col-form-label">Pin Code</label>

                    <div class="col-sm-10">

                        <input name="pcode" type="text" class="form-control" id="code" value="' .
            $row5['p_code'] .
            '" required>

                    </div>

                </div>

                

                

                <h3 class="pb-2 text-primary">Filter with your Preference</h3>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="prefer_form">I\'m looking for a</label>

                    <div class="col-sm-10">

                        <select name="p_need" class="form-control" id="prefer_form" required>

                        <option value="Female">Woman</option>

                        <option value="Male">Man</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="age">Age</label>

                    <div class="col-sm-10">

                        <select name="p_age" class="form-control" id="age" required>

                            <option value="19">19</option>

                            <option value="20">20</option>

                            <option value="21">21</option>

                            <option value="22">22</option>

                            <option value="23">23</option>

                            <option value="24">24</option>

                            <option value="25">25</option>    

                            <option value="26">26</option>

                            <option value="27">27</option>

                            <option value="28">28</option>

                            <option value="29">29</option>

                            <option value="30">30</option>

                            <option value="31">31</option>

                            <option value="32">32</option>

                            <option value="33">33</option>

                            <option value="34">34</option>

                            <option value="35">35</option>

                            <option value="36">36</option>

                            <option value="37">37</option>

                            <option value="38">38</option>

                            <option value="39">39</option>

                            <option value="40">40</option>

                            <option value="41">41</option>

                            <option value="42">42</option>

                            <option value="43">43</option>

                            <option value="44">44</option>

                            <option value="45">45</option>

                            <option value="46">46</option>

                            <option value="47">47</option>

                            <option value="48">48</option>

                            <option value="49">49</option>

                            <option value="50">50</option>

                            <option value="51">51</option>

                            <option value="52">52</option>

                            <option value="53">53</option>

                            <option value="54">54</option>

                            <option value="55">55</option>

                            <option value="56">56</option>

                            <option value="57">57</option>

                            <option value="58">58</option>

                            <option value="59">59</option>

                            <option value="60">60</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="p_status">Marital Status</label>

                    <div class="col-sm-10">

                        <select name="p_status" class="form-control" id="p_status" required>

                            <option value="Never Married">Never Married</option>    

                            <option value="Widowed">Widowed</option>    

                            <option value="Divorced">Divorced</option>    

                            <option value="Awaiting Divorce">Awaiting Divorce</option>    

                        </select>

                    </div>

                </div>





                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="p_religion">Religion</label>

                    <div class="col-sm-10">

                        <select name="p_rel" class="form-control" id="p_religion" required>

                            <option value="Hindu">Hindu</option  >    

                            <option value="Muslim">Muslim</option >    

                            <option value="Christian">Christian</option  >    

                            <option value="Sikh">Sikh</option   >    

                            <option value="Jain">Jain</option   >    

                            <option value="Parsi">Parsi</option  >    

                            <option value="Buddhist">Buddhist</option   >    

                            <option value="Inter Religion">Inter Religion</option >    

                            <option value="No Religious Belief">No Religious Belief</option>    

                            <option value="Others">Others</option>    

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label for="p_caste" class="col-sm-2 col-form-label">Caste/Sub-Caste</label>

                    <div class="col-sm-10">

                        <input name="p_caste" type="text" class="form-control" id="p_caste" value="' .
            $row5['p_caste'] .
            '" required>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label pt-0" for="p_mton">Mother Tongue</label>

                    <div class="col-sm-10">

                        <select name="p_mton" class="form-control" id="p_mton" required>

                            <option value="Tamil">Tamil</option>    

                            <option value="English">English</option>

                            <option value="Hindi">Hindi</option>

                            <option value="Bengali">Bengali</option>

                            <option value="Marathi">Marathi</option>

                            <option value="Telugu">Telugu</option>

                            <option value="Gujarati">Gujarati</option>

                            <option value="Urdu">Urdu</option>

                            <option value="Kannada">Kannada</option>

                            <option value="Odia">Odia</option>

                            <option value="Malayalam">Malayalam</option>

                            <option value="Punjabi">Punjabi</option>

                            <option value="Sanskrit">Sanskrit</option>

                            <option value="Other">Other</option>

                        </select>

                    </div>

                </div>



                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="employed">Profession Area</label>

                    <div class="col-sm-10">

                        <select name="p_profession" class="form-control" id="employed" required>

                            <option value="Accounting, Banking & Finance">Accounting, Banking & Finance</option>

                            <option value="Administration & HR">Administration & HR</option>

                            <option value="Advertising, Media & Entertainment">Advertising, Media & Entertainment</option>

                            <option value="Agriculture">Agriculture</option>

                            <option value="Airline & Aviation">Airline & Aviation</option>

                            <option value="Architecture & Design">Architecture & Design</option>

                            <option value="Artists, Animators & Web Designers">Artists, Animators & Web Designers</option>

                            <option value="BPO, KPO & Customer Support">BPO, KPO & Customer Support</option>

                            <option value="Beauty, Fashion & Jewellery Designers">Beauty, Fashion & Jewellery Designers</option>

                            <option value="Civil Services/Law Enforcement">Civil Services/Law Enforcement</option>

                            <option value="Corporate Professionals">Corporate Professionals</option>

                            <option value="Defence">Defence</option>

                            <option value="Education & Training">Education & Training</option>

                            <option value="Engineering">Engineering</option>

                            <option value="Hotel & Hospitality">Hotel & Hospitality</option>

                            <option value="IT & Software Engineering">IT & Software Engineering</option>

                            <option value="Legal">Legal</option>

                            <option value="Medical & Healthcare">Medical & Healthcare</option>

                            <option value="Merchant Navy">Merchant Navy</option>

                            <option value="Non Working">Non Working</option>

                            <option value="Others">Others</option>

                            <option value="Sales & Marketing">Sales & Marketing</option>

                            <option value="Science">Science</option>

                        </select>

                    </div>

                </div>';
        ?>

        <div class="d-flex justify-content-center">

            <button type="submit" name="chg_info_sub" class="btn btn-primary">Update</button>

            <a href="userhome.php" class="ml-2 btn btn-danger">Cancel</a>

        </div>

        <p class="text-center text-danger">Please check twice before submitting, wrong information leads to deletion of account</p>

        </form>

        </div>



        <div class="footer-copyright mar bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>

    </section>

    <?php include 'loader.php'; ?>

</body>



</html>