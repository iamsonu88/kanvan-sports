
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style>
.box
{
width:800px;
margin:0 auto;
}
.active_tab1
{
background-color:#fff;
color:#333;
font-weight: 600;
}
.inactive_tab1
{
background-color: #f5f5f5;
color: #333;
cursor: not-allowed;
}
.has-error
{
border-color:#cc0000;
background-color:#ffff99;
}
.checkbox-inline, .radio-inline {
    position: relative;
    display: inline-block;
    padding-left: 35px!important;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
}
</style>
</head>
<body>
    <br />
    <div class="container box">
        <br />
        <!-- <h2>Registration Form</h2><br /> -->
        <?php echo $message; ?>
        <form method="post" id="register_form" name="register_form">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Medical Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" style="border:1px solid #ccc" id="list_login_details"> finish</a>
                </li>
            </ul>
            <div class="tab-content" style="margin-top:16px;">
                <div class="tab-pane active" id="login_details">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Name: *</label>
                                <input type="text" name="fullname" class="form-control" placeholder="enter name" />
                                 <span id="error_email" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Date: *</label>
                                <input type="Date" name="date" class="form-control" placeholder="enter date" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="enter number" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Date of Birth *</label>
                                <input type="date" name="dob" class="form-control" placeholder="birth" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Age *</label>
                                <input type="number" name="age" class="form-control" placeholder="age" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Height *</label>
                                <input type="number" name="height" class="form-control" placeholder="height" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>weight *</label>
                                <input type="number" name="weight" class="form-control" placeholder="weight" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>In Case of Emergency Contact *</label>
                                <input type="number" name="contact"  class="form-control" placeholder="enter number" />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Relationship *</label>
                                <input type="text" name="relationship" class="form-control" placeholder="enter " / >
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Address: *</label>
                                <input type="text" name="address" id="address" class="form-control"  placeholder="enter address " / />
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="text" name="email" id="email" class="form-control" />
                                <span id="error_email" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                                <span id="error_password" class="text-danger"></span>
                            </div>
                            <br />
                            <div>
                                <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="personal_details">
                    <div class="panel panel-default">
                        <div class="panel-heading">Fill Personal Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Are you currently under a doctor’s care<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>If yes, explain *</label>
                                <input type="text" name="relationship" class="form-control" placeholder="enter " / >
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>When was the last time you had a physical examination?  *</label>
                                <input type="text" name="relationship" class="form-control" placeholder="enter " / >
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Have you ever had an exercise stress test *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> Don’t Know
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Have you ever had an exercise stress test *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Normal
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> Abnormal
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Have you ever had an exercise stress test *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>If yes, please list medications and reasons for taking *</label>
                                <input type="text" name="relationship" class="form-control" placeholder="enter " / >
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Have you been recently hospitalized? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>If yes, explain *</label>
                                <input type="text" name="relationship" class="form-control" placeholder="enter " / >
                                <!-- <span id="error_email" class="text-danger"></span> -->
                            </div>
                            <div class="form-group">
                                <label>Do you smoke? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Are you pregnant? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Do you drink alcohol more than three times/week? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Is your stress level high? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Are you moderately active on most days of the week? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <h4>Do you have: </h4>
                            <div class="form-group">
                                <label>High blood pressure? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>High cholesterol? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Diabetes? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Have parents or siblings who, prior to age 55 had *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>A heart attack? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>A stroke? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>High blood pressure? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>High cholesterol?*<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Known heart disease? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Rheumatic heart disease? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>A heart murmur? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Chest pain with exertion? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Irregular heart beat or palpitations? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Lightheadedness or do you faint? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Unusual shortness of breath? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Cramping pains in legs or feet? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Emphysema? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Other metabolic disorders (thyroid, kidney, etc.)? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Epilepsy? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Asthma? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Back pain: upper, middle, lower? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Other joint pain (explain on back of form)? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Muscle pain or an injury (explain on back of Form)? *<label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="male" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="option" value="female"> No
                                </label>
                            </div>

                            <h5>To the best of my knowledge, the above information is true.</h5>

                            <div class="form-group">
                                <label>Sign Name (Type your name) *</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" />
                                <span id="error_first_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Date *</label>
                                <input type="date" name="last_name" id="last_name" class="form-control" />
                                <span id="error_last_name" class="text-danger"></span>
                            </div>
                        </div>
                        <br />
                        <div>
                            <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                            <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                        </div>
                        <br />
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="contact_details">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill Contact Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Enter Address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                            <span id="error_address" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>Enter Mobile No.</label>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" />
                            <span id="error_mobile_no" class="text-danger"></span>
                        </div>
                        <br />
                        <div>
                            <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                            <input type="submit" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg" value="Register" />
                        </div>
                        <br />
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>

<?php

global $wpdb;
if(isset($_POST['btn_contact_details']) && trim(($_POST['btn_contact_details'])) == "Register") {
    // $testQuery = "INSERT INTO multi_step(dob,age,height) VALUES ('".$_POST['dob']."','".$_POST['age']."','".$_POST['height']."')";

    // $testQuery = "INSERT INTO sports( array('fname' => $_POST['first_name'], 'lname' => $_POST['last_name'],
    // 'email' => $_POST['email'], 'mobile' => $_POST['mobile_no'],'adress'=> $_POST['address'],'gender' => $_POST['gender']))";

    $testQuery = "INSERT INTO sports(fname,lname,email,mobile,adress,gender) VALUES ("."'".$_POST['first_name']."'".","."'".$_POST['last_name']."'".","."'".$_POST['email']."'".","."'".$_POST['mobile_no']."'".","."'".$_POST['address']."'".","."'".$_POST['gender']."'".")";
    $wpdb->query($testQuery);
} else {
    echo "Something went wrong!";
}
?>
<script>
$(document).ready(function() {

    $('#btn_login_details').click(function(){
        var error_email = '';
        var error_password = '';
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if($.trim($('#email').val()).length == 0) {
            error_email = 'Email is required';
            $('#error_email').text(error_email);
            $('#email').addClass('has-error');
        } else {
            if (!filter.test($('#email').val())) {
                error_email = 'Invalid Email';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            } else {
                error_email = '';
                $('#error_email').text(error_email);
                $('#email').removeClass('has-error');
            }
        }
        if($.trim($('#password').val()).length == 0) {
            error_password = 'Password is required';
            $('#error_password').text(error_password);
            $('#password').addClass('has-error');
        } else {
            error_password = '';
            $('#error_password').text(error_password);
            $('#password').removeClass('has-error');
        }

        if(error_email != '' || error_password != '') {
            return false;
        } else {
            $('#list_login_details').removeClass('active active_tab1');
            $('#list_login_details').removeAttr('href data-toggle');
            $('#login_details').removeClass('active');
            $('#list_login_details').addClass('inactive_tab1');
            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1 active');
            $('#list_personal_details').attr('href', '#personal_details');
            $('#list_personal_details').attr('data-toggle', 'tab');
            $('#personal_details').addClass('active in');
        }
    });

    $('#previous_btn_personal_details').click(function() {
        $('#list_personal_details').removeClass('active active_tab1');
        $('#list_personal_details').removeAttr('href data-toggle');
        $('#personal_details').removeClass('active in');
        $('#list_personal_details').addClass('inactive_tab1');
        $('#list_login_details').removeClass('inactive_tab1');
        $('#list_login_details').addClass('active_tab1 active');
        $('#list_login_details').attr('href', '#login_details');
        $('#list_login_details').attr('data-toggle', 'tab');
        $('#login_details').addClass('active in');
    });

    $('#btn_personal_details').click(function() {
        var error_first_name = '';
        var error_last_name = '';

        if($.trim($('#first_name').val()).length == 0) {
            error_first_name = 'First Name is required';
            $('#error_first_name').text(error_first_name);
            $('#first_name').addClass('has-error');
        } else {
            error_first_name = '';
            $('#error_first_name').text(error_first_name);
            $('#first_name').removeClass('has-error');
        }

        if($.trim($('#last_name').val()).length == 0) {
            error_last_name = 'Last Name is required';
            $('#error_last_name').text(error_last_name);
            $('#last_name').addClass('has-error');
        } else {
            error_last_name = '';
            $('#error_last_name').text(error_last_name);
            $('#last_name').removeClass('has-error');
        }

        if(error_first_name != '' || error_last_name != '') {
            return false;
        } else {
            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active');
            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_contact_details').removeClass('inactive_tab1');
            $('#list_contact_details').addClass('active_tab1 active');
            $('#list_contact_details').attr('href', '#contact_details');
            $('#list_contact_details').attr('data-toggle', 'tab');
            $('#contact_details').addClass('active in');
        }
    });

    $('#previous_btn_contact_details').click(function(){
        $('#list_contact_details').removeClass('active active_tab1');
        $('#list_contact_details').removeAttr('href data-toggle');
        $('#contact_details').removeClass('active in');
        $('#list_contact_details').addClass('inactive_tab1');
        $('#list_personal_details').removeClass('inactive_tab1');
        $('#list_personal_details').addClass('active_tab1 active');
        $('#list_personal_details').attr('href', '#personal_details');
        $('#list_personal_details').attr('data-toggle', 'tab');
        $('#personal_details').addClass('active in');
    });

    $('#btn_contact_details').click(function(){
        var error_address = '';
        var error_mobile_no = '';
        var mobile_validation = /^\d{10}$/;
        if($.trim($('#address').val()).length == 0) {
            error_address = 'Address is required';
            $('#error_address').text(error_address);
            $('#address').addClass('has-error');
        } else {
            error_address = '';
            $('#error_address').text(error_address);
            $('#address').removeClass('has-error');
        }

        if($.trim($('#mobile_no').val()).length == 0) {
            error_mobile_no = 'Mobile Number is required';
            $('#error_mobile_no').text(error_mobile_no);
            $('#mobile_no').addClass('has-error');
        } else {
            if (!mobile_validation.test($('#mobile_no').val())) {
                error_mobile_no = 'Invalid Mobile Number';
                $('#error_mobile_no').text(error_mobile_no);
                $('#mobile_no').addClass('has-error');
            } else {
                error_mobile_no = '';
                $('#error_mobile_no').text(error_mobile_no);
                $('#mobile_no').removeClass('has-error');
            }
        }
        if(error_address != '' || error_mobile_no != '') {
            return false;
        } else {
            $('#btn_contact_details').attr("disabled", "disabled");
            $(document).css('cursor', 'progress');
        }
    });

});
</script>