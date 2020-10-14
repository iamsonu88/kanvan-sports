<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<?php


global $wpdb;
if(null!==$_POST['orderId'] && $_POST['txStatus']=='SUCCESS') {
	$email_id=base64_decode($_GET['email_id']);
	$user_data=get_user_by_email($email_id);
	$user_id=$user_data->data->ID;
	$user_activation_key=$user_data->data->user_activation_key;
	foreach($_POST as $key=>$data){
		add_user_meta( $user_id, $key, $data);
	}
	update_user_meta( $user_id, 'payment_status', 'success' );
	//session_destroy();

	$to = $email_id;
	$subject = "Verification Mail from Super Markeet";
	$txt = "Hello ".$email_id.". Thanks for registering with us. Please check your email to activate your account!";
	$emailTxt = "Hello ".$email_id.". <br/><br/> Thanks for registering with us. <br/>Please click on below link for activate account!<br/><br/>".get_permalink()."?email_id=".$email_id."&activation_key=".$user_activation_key;
	$user_meta_data=get_user_meta( $user_id );
	$phone_number=$user_meta_data['phone_number'][0];
	send_success_sms($phone_number, $txt);
	$message='<section class="full-page container" style="padding-top: 1rem; width: 100%; clear: both;">
		<div class="heading-one" style="padding: 18px 30px 98px 30px; background-color: #fdb143; color: #fff; font-size: 24px; clear: both;">
			<div style="width: 22%; float: left;"><a href="https://www.supermarkeet.com/" title="Super Markeet"><img style="width: 80%;" src="https://www.supermarkeet.com/wp-content/uploads/2020/08/cropped-supermarkeet.png" alt="Super Markeet Logo" /></a> </div>
			<h1 style="margin-top: 0px; float: left;  width: 70%;">Welcome to Super Markeet</h1>
		</div>
		<div style="clear: both; margin-left: 2%; margin-bottom: 4%; font-size: 18px;">
			<span style="font-size: 30px;">Your Payment Invoice</span>
    		<table style="text-align: left; color: black; width: 60%;">
				<tr>
					<th style="font-weight: 100; width: 44%;">Registration Charges</th>
					<td style="width: 10%;"> : </td>
					<td style="font-weight: 600; width: 40%;"> 199 INR</td>
				</tr>
				<tr>
					<th style="font-weight: 100; width: 44%;">GST Charges:</th>
					<td style="width: 10%;"> : </td>
					<td style="font-weight: 600;  width: 40%;"> 35.82 INR</td>
				</tr>
				<tr>
					<td colspan="3" style="border-top: 1px solid black;"></td>
				</tr>
				<tr>
					<th style="font-weight: 100; width: 44%;">Total Cost:</th>
					<td style="width: 10%;"> : </td>
					<td style="font-weight: 600;  width: 40%;"> 234.82 INR  : (Round) - 235 INR</td>
				</tr>
			</table>
		</div>
		<div class="sub-title" style="padding: 16px; border: 1px solid #ddd;">'.$emailTxt.'</div>
	</section>';
	$from = 'support@supermarkeet.com';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 	// Create email headers
	$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
	if(mail($to,$subject,$message,$headers)) {
		echo 'Your mail has been sent successfully.';
	} else {
		echo 'Unable to send email. Please try again.';
	}


	$success_msg="You have successfully pay for Shop manager Account. Please verify the account using email!";
	echo "<script>swal('Success','".$success_msg."','success')</script>";
	echo "<script>setTimeout(function(){ window.location.href='".home_url()."'; }, 5000)</script>";
}
if(null!==$_POST['orderId'] && $_POST['txStatus']=='CANCELLED') {
	$email_id=base64_decode($_GET['email_id']);
	$user_data=get_user_by_email($email_id);
	$user_id=$user_data->data->ID;
	$user_activation_key=$user_data->data->user_activation_key;
	foreach($_POST as $key=>$data){
		add_user_meta( $user_id, $key, $data);
	}
	update_user_meta( $user_id, 'payment_status', 'failure' );
	//session_destroy();

	$to = $email_id;
	$subject = "Verification Mail from Super Markeet";
	$txt = "Hello ".$email_id.". Thanks for showing interest in us. Due to some reason, payment got fail. Please try again.";
	$emailTxt = "Hello ".$email_id.". <br/><br/> Thanks for showing interest in us. <br/>Please try again as your payment got fail.";
	$user_meta_data=get_user_meta( $user_id );
	$phone_number=$user_meta_data['phone_number'][0];
	send_success_sms($phone_number, $txt);
	$message='<section class="full-page container" style="padding-top: 1rem; width: 100%; clear: both;">
		<div class="heading-one" style="padding: 18px 30px 98px 30px; background-color: #fdb143; color: #fff; font-size: 24px; clear: both;">
			<div style="width: 22%; float: left;"><a href="https://www.supermarkeet.com/" title="Super Markeet"><img style="width: 80%;" src="https://www.supermarkeet.com/wp-content/uploads/2020/08/cropped-supermarkeet.png" alt="Super Markeet Logo" /></a> </div>
			<h1 style="margin-top: 0px; float: left;  width: 70%;">Welcome to Super Markeet</h1>
		</div>
		<div class="sub-title" style="padding: 16px; border: 1px solid #ddd;">'.$emailTxt.'</div>
	</section>';
	$from = 'support@supermarkeet.com';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 	// Create email headers
	$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
	if(mail($to,$subject,$message,$headers)) {
		echo 'Your mail has been sent successfully.';
	} else {
		echo 'Unable to send email. Please try again.';
	}


	$success_msg="You have unsuccessfully pay for Shop manager Account. Please try again.";
	echo "<script>swal('Success','".$success_msg."','success')</script>";
	echo "<script>setTimeout(function(){ window.location.href='".home_url()."'; }, 5000)</script>";
}
if((null!==$_GET['email_id']) && (null!==$_GET['razorpay_payment_id'])){
	$email_id=base64_decode($_GET['email_id']);
	$razorpay_payment_id=base64_decode($_GET['razorpay_payment_id']);
	$user_data=get_user_by_email($email_id);
	$user_id=$user_data->data->ID;
	$user_activation_key=$user_data->data->user_activation_key;
	add_user_meta( $user_id, 'razorpay_payment_id', $razorpay_payment_id );
	update_user_meta( $user_id, 'payment_status', 'success' );
	//session_destroy();

	$to = $email_id;
	$subject = "Verification Mail from Super Markeet";
	$txt = "Hello ".$email_id.". Thanks for registering with us. Please check your email to activate your account!";
	$emailTxt = "Hello ".$email_id.". <br/><br/> Thanks for registering with us. <br/>Please click on below link for activate account!<br/><br/>".get_permalink()."?email_id=".$email_id."&activation_key=".$user_activation_key;
	$user_meta_data=get_user_meta( $user_id );
	$phone_number=$user_meta_data['phone_number'][0];
	send_success_sms($phone_number, $txt);
	$message='<section class="full-page container" style="padding-top: 1rem; width: 100%; clear: both;">
		<div class="heading-one" style="padding: 18px 30px 98px 30px; background-color: #fdb143; color: #fff; font-size: 24px; clear: both;">
			<div style="width: 22%; float: left;"><a href="https://www.supermarkeet.com/" title="Super Markeet"><img style="width: 80%;" src="https://www.supermarkeet.com/wp-content/uploads/2020/08/cropped-supermarkeet.png" alt="Super Markeet Logo" /></a> </div>
			<h1 style="margin-top: 0px; float: left;  width: 70%;">Welcome to Super Markeet</h1>
		</div>
		<div style="clear: both; margin-left: 2%; margin-bottom: 4%; font-size: 18px;">
			<span style="font-size: 30px;">Your Payment Invoice</span>
    		<table style="text-align: left; color: black; width: 60%;">
				<tr>
					<th style="font-weight: 100; width: 44%;">Registration Charges</th>
					<td style="width: 10%;"> : </td>
					<td style="font-weight: 600; width: 40%;"> 199 INR</td>
				</tr>
				<tr>
					<th style="font-weight: 100; width: 44%;">GST Charges:</th>
					<td style="width: 10%;"> : </td>
					<td style="font-weight: 600;  width: 40%;"> 35.82 INR</td>
				</tr>
				<tr>
					<td colspan="3" style="border-top: 1px solid black;"></td>
				</tr>
				<tr>
					<th style="font-weight: 100; width: 44%;">Total Cost:</th>
					<td style="width: 10%;"> : </td>
					<td style="font-weight: 600;  width: 40%;"> 234.82 INR  : (Round) - 235 INR</td>
				</tr>
			</table>
		</div>
		<div class="sub-title" style="padding: 16px; border: 1px solid #ddd;">'.$emailTxt.'</div>
	</section>';

	$from = 'support@supermarkeet.com';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 	// Create email headers
	$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
	if(mail($to,$subject,$message,$headers)) {
		echo 'Your mail has been sent successfully.';
	} else {
		echo 'Unable to send email. Please try again.';
	}
	$success_msg="You have successfully pay for Shop manager Account. Please verify the account using email!";
	echo "<script>swal('Success','".$success_msg."','success')</script>";
	echo "<script>setTimeout(function(){ window.location.href='".home_url()."'; }, 5000)</script>";
}
if(null!==$_GET['email_id'] && null!==$_GET['activation_key']){
	$email_id=$_GET['email_id'];
	$activation_key=$_GET['activation_key'];
	$get_user = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."users WHERE user_email='".$email_id."' AND user_activation_key='".$activation_key."'");
	if(count($get_user)>0){
		$user_data=get_user_by_email($email_id);
		$user_id=$user_data->data->ID;
		$wp_user_object = new WP_User($user_id);
		$wp_user_object->set_role('shop_manager');
		$wpdb->update(
			$wpdb->prefix."users",
			array("user_activation_key"=>""),
			array("ID"=>$get_user[0]->ID)
		);
		$to = $email_id;
		$subject = "Activation Mail";
		$user_meta_data=get_user_meta( $user_id );
		$password=$user_meta_data['password'][0];
		$txt = "Hello ".$get_user[0]->display_name.". <br/><br/> You account has activated successfully. Your username is ".$get_user[0]->user_login.". You can access your account area to view orders, change your password, and more.<br/><b>Username:<b/> ".$get_user[0]->user_login." <br/><b>Password:<b/> ".$password." <br/><br/><a href='".home_url()."/my-account'>Please click here for login</a>!";
		$phone_number=$user_meta_data['phone_number'][0];
		send_success_sms($phone_number, $txt);
		$message='<section class="full-page container" style="padding-top: 1rem; width: 100%; clear: both;">
			<div class="heading-one" style="padding: 18px 30px 98px 30px; background-color: #fdb143; color: #fff; font-size: 24px; clear: both;">
				<div style="width: 22%; float: left;">
					<a href="https://www.supermarkeet.com/" title="Super Markeet"><img style="width: 80%;" src="https://www.supermarkeet.com/wp-content/uploads/2020/08/cropped-supermarkeet.png" alt="Super Markeet Logo" /></a>
				</div>
				<h1 style="margin-top: 0px; float: left;  width: 70%;">Welcome to Super Markeet</h1>
			</div>
			<div class="sub-title" style="padding: 16px; border: 1px solid #ddd; padding-left: 30px;">'.$txt.'</div>
		</section>';
		// $headers = "From: info@kanvan.in";
		$from = 'support@supermarkeet.com';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// mail($to,$subject,$message,$headers);
		$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
		if(mail($to,$subject,$message,$headers)) {
			echo 'Your mail has been sent successfully.';
		} else {
			echo 'Unable to send email. Please try again.';
		}

		$to = "support@supermarkeet.com";
		$subject = "Activation Mail Update";
		$txt = "Hello Admin. <br/><br/>".$get_user[0]->display_name."(".$email_id.") has recently registered with supermarkeet as a vendor!";
		$user_meta_data=get_user_meta( $user_id );
		$phone_number=$user_meta_data['phone_number'][0];
		send_success_sms($phone_number, $txt);
		$message='<section class="full-page container" style="padding-top: 1rem; width: 100%; clear: both;">
			<div class="heading-one" style="padding: 18px 30px 98px 30px; background-color: #fdb143; color: #fff; font-size: 24px; clear: both;">
				<div style="width: 30%; float: left;"><a href="https://www.supermarkeet.com/" title="Super Markeet"><img style="width: 80%;" src="https://www.supermarkeet.com/wp-content/uploads/2020/08/cropped-supermarkeet.png" alt="Super Markeet Logo" /></a> </div>
				<h1 style="margin-top: 0px; float: left;  width: 70%;">Welcome to Super Markeet</h1>
			</div>
			<div class="sub-title" style="padding: 16px; border: 1px solid #ddd; padding-left: 30px;">'.$txt.'</div>
		</section>';


		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Create email headers
		$headers .= 'From: '.$email_id."\r\n". 'Reply-To: '.$email_id."\r\n" . 'X-Mailer: PHP/' . phpversion();
		if(mail($to,$subject,$message,$headers)) {
			echo 'Your mail has been sent successfully.';
		} else {
			echo 'Unable to send email. Please try again.';
		}

		$success_msg="User Activated successfully!";
		echo "<script>swal('Success','".$success_msg."','success')</script>";
		echo "<script>setTimeout(function(){ window.location.href='".home_url()."/login'; }, 5000)</script>";
	}
	else{
		$error_msg="Activation key is wrong!";
		echo "<script>swal('Error','".$error_msg."','error')</script>";
	}
}
function is_required($field_name){
	global $wpdb;
	$get_data=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}multistep_option WHERE opt='required_field' and field='".$field_name."'");
	if(count($get_data)>0){
		return true;
	}
	else{
		return false;
	}
}
function send_success_sms($phone_number, $text_message){
	$handle = curl_init();
	$url = "https://api.textlocal.in/send/?apiKey=Jz0sPt9cSBc-5uSObptlg2rnrvqAHHiaYKNCBSjxll&sender=TXTLCL&numbers=91".$phone_number."&message=".urlencode(strip_tags($text_message));
	// Set the url
	curl_setopt($handle, CURLOPT_URL, $url);
	// Set the result output to be a string.
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($handle);
	curl_close($handle);
}
$user_data=$_SESSION['user_data'];
?>

<style>
* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
	/* content: "\f13e" */
	content: "\f0fa";
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #673AB7
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #673AB7
}

.fit-image {
    width: 100%;
    object-fit: cover
}

</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-9 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Sign Up Your User Account</h2>
                <p>Fill all form field to go to next step</p>
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
					<li class="active" id="personal"><strong>Personal</strong></li>
                        <li  id="account"><strong>Medical </strong></li>
                       
                        <li id="payment"><strong>Image</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div>
							<label class="fieldlabels">Name: *</label> 
							<input type="text" name="fullname" placeholder="enter name" /> 
							<label class="fieldlabels">Date: *</label> 
							<input type="Date" name="date" placeholder="enter date" /> 
							<label class="fieldlabels">Phone Number *</label> 
							<input type="tel" name="phone" placeholder="enter number" /> 
							 <label class="fieldlabels">Email: *</label> 
							<input type="email" name="email" placeholder="Email Id" /> 
							<label class="fieldlabels">Date of Birth *</label> 
							<input type="date" name="dob" placeholder="Email birth" /> 
							<label class="fieldlabels">Age*</label> 
							<input type="number" name="age" placeholder="Email age" /> 
							<label class="fieldlabels">Height*</label> 
							<input type="number" name="height" placeholder="Email height" /> 
							<label class="fieldlabels">weight*</label> 
							<input type="number" name="weight" placeholder="Email weight" /> 
							<label class="fieldlabels">In Case of Emergency Contact *</label>
							 <input type="number" name="contact" placeholder="enter number" /> 
							 <label class="fieldlabels">Relationship *</label>
							  <input type="text" name="relationship" placeholder="enter " />
							   <label class="fieldlabels">Address: *</label> 
							   <input type="text" name="address" placeholder="enter address" />
                        </div> <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">First Name: *</label> <input type="text" name="fname" placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input type="text" name="lname" placeholder="Last Name" /> <label class="fieldlabels">Contact No.: *</label> <input type="text" name="phno" placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.: *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                        </div> <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Image Upload:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
                        </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});

</script>
<?php
$name = $_POST["fullname"];
$date = $_POST["date"];
$dob = $_POST["dob"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$email = $_POST["email"];

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kanvansports";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}else{
	$sql = "INSERT INTO sports(name,date,email,phone,dob,age)
	VALUES ('$name','$date', '$email','$phone','$dob','$age',)";
}
if ($conn->query($sql) === TRUE) {
	exit;
  } else {
	echo "Error: " . $sql . "<br>" . $conn->error;
  }

// mysqli_close($conn);
?>

<script>
$(document).ready(function(){
	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;
	setProgressBar(current);
	jQuery(".next").click(function(){
		if(jQuery('[name="email_address"]').val()==""){
			jQuery(".enter_email_err").html("Please enter email address!").show();
		}
		else if( !validateEmail(jQuery('[name="email_address"]').val())) {
			jQuery(".enter_email_err").html("Please enter correct email address!").show();
		}
		else if(jQuery('[name="email_verify"]').val()==0){
			jQuery(".enter_email_err").html("Email already exist!").show();
		}
		else if(jQuery("#enter_otp_phone").length==0){
			jQuery(".enter_email_err").hide();
			var valid=true;
			jQuery(this).parent().find(".required").each(function(){
				if(jQuery(this).val()==""){
					jQuery(this).addClass("invalid");
					valid=false;
				}
			});
			if(valid==true){
				current_fs = jQuery(this).parent();
				next_fs = jQuery(this).parent().next();
				//Add Class Active
				jQuery("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
				//show the next fieldset
				next_fs.show();
				//hide the current fieldset with style
				current_fs.animate({opacity: 0}, {
					step: function(now) {
						// for making fielset appear animation
						opacity = 1 - now;
						current_fs.css({
						'display': 'none',
						'position': 'relative'
						});
						next_fs.css({'opacity': opacity});
					},
					duration: 500
				});
				setProgressBar(++current);
			}
		}
		else{
			jQuery(".enter_email_err").hide();
			jQuery(".enter_phone_err").html("Phone has not verified yet!");
			jQuery("#enter_phone").addClass("invalid");
		}
	});
	$(".previous").click(function(){
		current_fs = jQuery(this).parent();
		previous_fs = jQuery(this).parent().prev();
		//Remove class active
		jQuery("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		//show the previous fieldset
		previous_fs.show();
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now) {
				// for making fielset appear animation
				opacity = 1 - now;
				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				previous_fs.css({'opacity': opacity});
			},
			duration: 500
		});
		setProgressBar(--current);
	});
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		jQuery(".progress-bar")
		.css("width",percent+"%")
	}
	jQuery(".submit").click(function(){
		return false;
	});
});
function validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test( $email );
}
function checkEmail(email_id){
	if(email_id!=""){
		jQuery(".enter_email_err").hide();
		jQuery.ajax({
			type: "post",
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			data: {
				action:'check_email',
				email_id: email_id,
			}
		})
		.done(function( result ) {
			if(result=='verify'){
				jQuery("[name='email_verify']").val(1);
			}
			else{
				jQuery("[name='email_verify']").val(0);
			}
		});
	}
}
</script>

<script>
jQuery(document).ready(function(){
	jQuery(".send_otp_phone").click(function(){
		var phone_number=jQuery('[name="phone_number"]').val();
		if(phone_number==""){
			jQuery('.enter_phone_err').html('Please enter phone number!').show();
			jQuery('.enter_otp_phone').hide();
		}
		else if(jQuery('[name="phone_number"]').val().length!=10){
			jQuery('.enter_phone_err').html('Please enter correct phone number!').show();
			jQuery('.enter_otp_phone').hide();
		}
		else{
			jQuery.ajax({
				type: "post",
				//dataType: "json",
				url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
				data: {
					action:'phone_number',
					phone_number: phone_number,
				}
			})
			.done(function( msg ) {
				if(msg != "exist"){
					jQuery('.enter_phone_err').hide();
					jQuery('.enter_otp_phone').show();
				}
				else{
					jQuery('.enter_phone_err').html('Phone already exist!').show();
					jQuery('.enter_otp_phone').hide();
				}
			});
		}
	});
	jQuery(".otp_phone_verify").click(function(){
		jQuery.ajax({
			type: "post",
			//dataType: "json",
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			data: {
				action:'phone_number_verify',
				phone_number: jQuery('[name="phone_number"]').val(),
				enter_otp_phone: jQuery('#enter_otp_phone').val(),
			}
		})
		.done(function( msg ) {
			if(msg=='verify'){
				jQuery('.enter_otp_phone').html('<i class="fa fa-check-circle" aria-hidden="true"></i>Phone has been verified!');
				jQuery("#enter_phone").removeClass("invalid").attr('readonly', true);
			}
			else{
				jQuery(".enter_otp_phone_err").html("Please enter correct OTP!");
			}
		});
	});
});
</script>
<script>
jQuery(document).ready(function(){
	jQuery('[name="email_address"]').keyup(function(){
		jQuery(".enter_email_err").hide();
		var email_id=jQuery(this).val();
		jQuery.ajax({
			type: "post",
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			data: {
				action:'check_email',
				email_id: email_id,
			}
		})
		.done(function( result ) {
			if(result=='verify'){
				jQuery("[name='email_verify']").val(1);
			}
			else{
				jQuery("[name='email_verify']").val(0);
			}
		});
	});
	jQuery('[name="country"]').change(function(){
		jQuery("#cover-spin").show();
		var country_id=jQuery(this).val();
		jQuery.ajax({
			type: "post",
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			data: {
				action:'get_states',
				country_id: country_id,
			}
		})
		.done(function( result ) {
			jQuery('[name="state"] option').remove();
			jQuery('[name="state"]').append(new Option("--Select--", ""));
			jQuery.each(JSON.parse(result), function(i, field){
				jQuery('[name="state"]').append(new Option(field.name, field.id));
			});
			jQuery("#cover-spin").hide();
		});
	});
	jQuery('[name="state"]').change(function(){
		jQuery("#cover-spin").show();
		var state_id=jQuery(this).val();
		jQuery.ajax({
			type: "post",
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			data: {
				action:'get_cities',
				state_id: state_id,
			}
		})
		.done(function( result ) {
			jQuery('[name="city"] option').remove();
			jQuery('[name="city"]').append(new Option("--Select--", ""));
			jQuery.each(JSON.parse(result), function(i, field){
				jQuery('[name="city"]').append(new Option(field.name, field.id));
			});
			jQuery("#cover-spin").hide();
		});
	});
	jQuery("#regForm").submit(function(){
		jQuery("#cover-spin").show();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: "<?php echo home_url(); ?>/wp-admin/admin-ajax.php",
			type: 'POST',
			data: formData,
			async: false,
			success: function (data) {
				data=JSON.parse(data);
				console.log('data', data);
				if(data.action=="razorpay"){
					window.location.href=data.redirect_url;
				}
				if(data.action=="cashfree"){
					jQuery(".cashfree_form").html(data.form_data);
					jQuery("#cashfreeForm").submit();
				}
				else{
					//window.location.href="?alert=something_wrong";
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});
		return false;
	});
})
</script>

