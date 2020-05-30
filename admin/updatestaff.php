<?php
	require_once "data/slidebar.php";
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    //fetch data from database 

    $view = "select * from tblstaff where id='$id'";
    $result = $connection->query($view);
    $row1 = $result->fetch_array();
    $fname = $row1['fname'];
    $lname = $row1['lname'];
    $address = $row1['address'];
    $gender = $row1['gender'];
    $contactno = $row1['contactno'];
    $email = $row1['email'];
    
    $landmark = $row1['landmarkid'];
    $role = $row1['role'];
} else {
    header("location:staffview.php");
}
  ?><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Manage Staff</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Staff</h1>
                </div>
            </div><!--/.row-->

            <?php
//$flag=0;
            $error = array();
            if (isset($_POST['btnsubmit'])) {
                $fname = $_POST['txtfname'];
                $lname = $_POST['txtlname'];
                $address = $_POST['txtaddress'];
                $gender = $_POST['gender'];
                $contactno = $_POST['txtcontact'];
                $email = $_POST['txtemail'];
                
                $landmark = $_POST['ddlandmark'];
                $role = $_POST['ddrole'];
                $datetime = date("Y-m-d h:i:s");
                if (empty($fname)) {
                    $error['fnameerr'] = "Only letters and white space allowed";
                } else {
                    if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                        $error['fnameerr'] = "Only letters and white space allowed";
                    }
                }
                if (empty($lname)) {
                    $error['lnameerr'] = "Only letters and white space allowed";
                } else {
                    if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                        $error['lnameerr'] = "Only letters and white space allowed";
                    }
                }
                if (empty($contactno)) {
                    $error["contacterr"] = 'please enter contact no';
                } else {
					/*if (!filter_var($contactno, FILTER_VALIDATE_INT)) {
						$error["contacterr"] = "Contact should be digits only";
					}*/
					if (strlen($contactno) > 10 && strlen($contactno) < 10 ) {
						$error["contacterr"] = "Contact Number should be 10 digits only.";
					}
                    
                }

                if (count($error) == 0) {
                    $sql = "update tblstaff set fname='$fname',lname='$lname',address='$address',landmarkid='$landmark',gender='$gender',contactno='$contactno',role='$role',updatedatetime='$datetime' where id='$id'";


                    $query = mysqli_query($connection, $sql);
                    if ($query) {
                        //echo "<script>alert('Update Successful.');</script>";
                        header("location:staffview.php");
                        $_SESSION['msgupdate']="Update successfully.";
                    } else {
                        echo "<script>alert('Update Unsuccessfull!');</script>";
                    }
                }

                //if($flag==0)
                //{
                /*

                 */

                // }
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $id." , ".$fname." ".$lname; ?></div>

                <div class="panel-body">
                    <div class="col-md-8" style="margin-left: 50px;">
                        <form role="form" action="#" method="post">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="txtfname" placeholder="Enter First Name"  title="First Name" value="<?php
                                    if (isset($fname)) {
                                        echo $fname;
                                    }
                                    ?>">


                                    <?php
                                    if (isset($error['fnameerr'])) {
                                        echo $error['fnameerr'];
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="txtlname" class="form-control" style="width: 110%" placeholder="Enter Last Name" title="Last Name" value="<?php
                                    if (isset($lname)) {
                                        echo $lname;
                                    }
                                    ?>">

                                    <?php
                                    if (isset($error['lnameerr'])) {
                                        echo $error['lnameerr'];
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 20px;">Address</label>
                                <textarea class="form-control" name="txtaddress" style="width: 100%;margin-left: 20px;" rows="3" title="Address" placeholder="Enter Address"><?php if(isset($address)){ echo $address;} ?></textarea>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 20px;">Landmark</label>
                                <select style="margin-left: 20px;" name="ddlandmark" title="Select Landmark" class="form-control">
                                    <?php
                                    $ddlm = "select * from tbllandmark";
                                    $result = $connection->query($ddlm);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=" . $row['id'] . ">" . $row['Name'] . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label style="margin-left: 20px;">Gender</label>
                                <div class="radio">
                                    <label style="margin-left: 80px;">
                                        <input  type="radio" name="gender" id="male" value="Male" <?php if($gender=='Male'){echo "checked";} ?>>Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label style="margin-left: 80px;">
                                        <input  type="radio" name="gender" id="female" value="Female" <?php if($gender=='Female'){echo "checked";} ?>>Female
                                    </label>
                                </div>


                            </div>
                            <div class="form-group">
                                <label style="margin-left: 20px">Contact Number:</label>
                                <input type="number" name="txtcontact" style="margin-left: 20px" class="form-control" placeholder="Enter Contact Number" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="10" title="Phone Number / Contact Number" value="<?php
                                if (isset($contactno)) {
                                    echo $contactno;
                                }
                                ?>">

<?php
if (isset($error["contacterr"])) {
    echo $error["contacterr"];
}
?>

                            </div>
                            <div class="form-group">
                                <label style="margin-left: 20px">Role</label>
                                <select name="ddrole" style="margin-left: 20px" class="form-control">
                                    <option value="0" <?php if($role==0){echo "selected";} ?>>Admin</option>
                                    <option value="1" <?php if($role==1){echo "selected";} ?>>Staff</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label style="margin-left: 5px">Email Id:</label>
                                    <input style="margin-left: 5px;" class="form-control" placeholder="Enter Email Address" name="txtemail" type="email" title="Email Address" readonly="readonly" value="<?php if(isset($email)){echo $email;} ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    
<!--                                    <label style="margin-left: 5px">Email Id:</label>
                                    <input style="margin-left: 5px" class="form-control" placeholder="Enter Email Address" name="txtemail" type="email" title="Email Address" readonly value="<?php if(isset($email)){echo $email;} ?>">-->
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <br>
                                        <input class="btn btn-lg btn-success form-control" style="height:100%; margin-left: 40px;" type="submit" value="submit" name="btnsubmit">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <br>
                                        <a href="staffview.php"><button class="form-control btn btn-lg btn-primary" style="height: 100%; margin-left: 50px;" name="Cancel" type="button" value="cancel">Back</button></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>


        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        <script>
            window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };
        </script>

    </body>
</html>
<?php
ob_end_flush();
?>