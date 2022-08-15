<!-- request display -->
<div class="container">
    <div class="modal fade" tabindex="-1" id="req_mod">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Requests</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <table class="table border rounded">
                        <tbody>
                            <?php
                                $myid = $_SESSION["my_id"];
                                $run8 = mysqli_query($conn,"SELECT * FROM friend WHERE (receiver = $myid AND status = 0)");
                                $count_req = mysqli_num_rows($run8);
                                if($count_req>0){
                                    while($row8 = mysqli_fetch_assoc($run8)){ 
                                        $run9 = mysqli_query($conn, "SELECT * FROM user WHERE user_id =".$row8["sender"]);
                                        while($row9 = mysqli_fetch_assoc($run9)){
                                            echo '
                                                <tr>
                                                    <td><img class="rounded rounded-circle" src="uploads/'.$row9["img"].'" style="width: 15%;" onerror="this.onerror=null; this.src='.$_SESSION["dp"].'"  alt="profile picture">'.' '.$row9["firstname"].' '.$row9["lastname"].'</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="function_db.php?sender='.$row9["user_id"].'" class="btn text-white btn-sm btn-success">Accept</a>
                                                            <a href="function_db.php?del='.$row9["user_id"].'" class="ml-2 btn text-white btn-sm btn-success">Decline</a>';
                                                            if($_SESSION["my_status"] == "P"){
                                                                echo '<a href="userview.php?id='.$row9["user_id"].'" class="btn text-white btn-sm ml-2 btn-warning">View Details</a>';
                                                            }
                                                            else{
                                                                echo '<a class="btn text-white btn-sm ml-2 btn-warning" data-backdrop="static" data-dismiss="modal" data-toggle="modal" data-target="#info">View Details</a>';
                                                            }
                                                            echo'
                                                        </div>
                                                    </td>
                                                </tr>'; 
                                        }     
                                    } 
                                } 
                                else{
                                    echo '<h2 class="text-danger text-center">No more requests!</h2>';
                                }         
                            ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sent request display -->
<div class="container">
    <div class="modal fade" tabindex="-1" id="s_req_mod">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sent Requests</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <table class="table border rounded">
                        <tbody>
                            <?php
                                $myid = $_SESSION["my_id"];
                                $run16 = mysqli_query($conn,"SELECT * FROM friend WHERE (sender = $myid AND status = 0)");
                                $count_sreq = mysqli_num_rows($run16);
                                if($count_sreq>0){
                                    while($row16 = mysqli_fetch_assoc($run16)){ 
                                        $run17 = mysqli_query($conn, "SELECT * FROM user WHERE user_id =".$row16["receiver"]);
                                        while($row17 = mysqli_fetch_assoc($run17)){
                                            echo '
                                                <tr>
                                                    <td><img class="rounded rounded-circle" src="uploads/'.$row17["img"].'" style="width: 15%;" onerror="this.onerror=null; this.src='.$_SESSION["dp"].'"  alt="profile picture">'.' '.$row17["firstname"].' '.$row17["lastname"].'</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="function_db.php?c_req='.$row17["user_id"].'" class="ml-2 btn text-white btn-sm btn-danger">Cancel Request</a>';
                                                            if($_SESSION["my_status"] == "P"){
                                                                echo '<a href="userview.php?id='.$row17["user_id"].'" class="btn text-white btn-sm ml-2 btn-warning">View Details</a>';
                                                            }
                                                            else{
                                                                echo '<a class="btn text-white btn-sm ml-2 btn-warning" data-backdrop="static" data-dismiss="modal" data-toggle="modal" data-target="#info">View Details</a>';
                                                            }
                                                            echo'
                                                        </div>
                                                    </td>
                                                </tr>'; 
                                        }     
                                    } 
                                } 
                                else{
                                    echo '<h2 class="text-danger text-center">No Sent Requests!</h2>';
                                }         
                            ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- connection list -->
<div class="container">
    <div class="modal fade" tabindex="-1" id="con_mod">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Connected List</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <table class="table border rounded">
                        <tbody>
                            <?php
                                $myid = $_SESSION["my_id"];
                                $run15 = mysqli_query($conn,"SELECT * FROM friend WHERE ((receiver = $myid OR sender = $myid) AND status = 1)");
                                $count_con = mysqli_num_rows($run15);
                                if($count_con>0){
                                     while($row15 = mysqli_fetch_assoc($run15)){
                                        $to_id = $row15["receiver"];
                                        $from_id =$row15["sender"];
                                        $run10 = mysqli_query($conn, "SELECT * FROM user WHERE (user_id = $to_id OR user_id = $from_id) AND (user_id != $myid)");
                                        while($row10 = mysqli_fetch_assoc($run10)){
                                                echo '
                                                    <tr>
                                                        <td><img class="rounded rounded-circle" src="uploads/'.$row10["img"].'" style="width: 15%;" onerror="this.onerror=null; this.src='.$_SESSION["dp"].'"  alt="profile picture">'.' '.$row10["firstname"].' '.$row10["lastname"].'</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="function_db.php?rem='.$row10["user_id"].'" class="ml-2 btn text-white btn-sm btn-success">Remove</a>';
                                                                if($_SESSION["my_status"] == "P"){
                                                                    echo '<a href="userview.php?id='.$row10["user_id"].'" class="btn text-white btn-sm ml-2 btn-warning">View Details</a>';
                                                                }
                                                                else{
                                                                    echo '<a class="btn text-white btn-sm ml-2 btn-warning" data-backdrop="static" data-dismiss="modal" data-toggle="modal" data-target="#info">View Details</a>';
                                                                }
                                                                echo'
                                                            </div>
                                                        </td>
                                                    </tr>';  
                                        }
                                    }                                        
                                }       
                                else{
                                    echo '<h2 class="text-danger text-center">No Connections!</h2>';
                                }                
                            ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="fixed-top navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand text-warning" href="userhome.php">Sai Matrimony</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_u" aria-expanded="false">
        <span class="fa fa-bars text-warning" aria-hidden="true"></span>
    </button>

    <div id="nav_u" class="collapse navbar-collapse">
        <form class="form-inline" action="userhome.php" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="By username or id" required>
                <div class="input-group-append">
                    <button class="btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-warning" href="userhome.php"><i class="fa fa-home fa-x mr-1"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="#" data-backdrop="static" data-toggle="modal" data-target="#req_mod"><span><?php 
                                                                                                                                    if(!empty($count_req)){
                                                                                                                                        echo '<span class="badge badge-danger px-1">'.$count_req.'</span>';
                                                                                                                                    } 
                                                                                                                                    else{
                                                                                                                                        echo '<i class="fa fa-user-times fa-x mr-1"></i>';
                                                                                                                                    }
                                                                                                                                ?></span></i> Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="#" data-backdrop="static" data-toggle="modal" data-target="#s_req_mod"><span><?php 
                                                                                                                                    if(!empty($count_sreq)){
                                                                                                                                        echo '<span class="badge badge-danger px-1">'.$count_sreq.'</span>';
                                                                                                                                    } 
                                                                                                                                    else{
                                                                                                                                        echo '<i class="fa fa-user-plus fa-x mr-1"></i>';
                                                                                                                                    }
                                                                                                                                ?></span> Sent Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="#" data-backdrop="static" data-toggle="modal" data-target="#con_mod"><span><?php 
                                                                                                                                    if(!empty($count_con)){
                                                                                                                                        echo '<span class="badge badge-danger px-1">'.$count_con.'</span>';;
                                                                                                                                    } 
                                                                                                                                    else{
                                                                                                                                        echo '<i class="fa fa-users fa-x mr-1"></i>';
                                                                                                                                    }
                                                                                                                                ?></span> Connection List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="function_db.php?up=<?php echo $_SESSION["my_id"]; ?>"><?php if($_SESSION["my_status"] == 'F'){echo "<i class='fa fa-level-up fa-x mr-1'></i> Upgrade";}?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="profile.php"><i class="fa fa-user-circle fa-x mr-1"></i><?php echo $_SESSION["name"];?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="logout.php"><i class="fa fa-sign-out fa-x mr-1"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>