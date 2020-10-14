<?php

/*

Plugin Name: Multisteps Registration Form

Plugin URI: http://www.example.com

Description: Use shortcode [multistep_registration_form] for registration

Author: John Doe

Version: 1.0.1

Author URI: http://example.com

*/



$siteurl = get_option('siteurl');

define('MULTISTEP_FOLDER', dirname(plugin_basename(__FILE__)));

define('MULTISTEP_URL', $siteurl.'/wp-content/plugins/' . MULTISTEP_FOLDER);

define('MULTISTEP_FILE_PATH', dirname(__FILE__));

define('MULTISTEP_DIR_NAME', basename(MULTISTEP_FILE_PATH));

// this is the table prefix

global $wpdb;

$multistep_table_prefix=$wpdb->prefix.'multistep_';

define('MULTISTEP_TABLE_PREFIX', $multistep_table_prefix);





register_activation_hook(__FILE__,'multistep_install');

register_deactivation_hook(__FILE__ , 'multistep_uninstall');

function multistep_install()

{

    global $wpdb;

    $table1 = MULTISTEP_TABLE_PREFIX."registration";

    $structure1 = "CREATE TABLE $table1 (

        id BIGINT(20) NOT NULL AUTO_INCREMENT,

		phone VARCHAR(255) NULL,

        phone_verification_code VARCHAR(255) NULL,

        phone_verified INT(11) NULL,

	UNIQUE KEY id (id)

    );";

    $wpdb->query($structure1);



	$table2 = MULTISTEP_TABLE_PREFIX."option";

    $structure2 = "CREATE TABLE $table2 (

        id BIGINT(20) NOT NULL AUTO_INCREMENT,

		opt VARCHAR(255) NULL,

        field VARCHAR(255) NULL,

	UNIQUE KEY id (id)

    );";

    $wpdb->query($structure2);



	add_role( 'shop_manager', 'Shop Manager', array( 'read' => true, 'level_0' => true ) );

}

function multistep_uninstall()

{

    global $wpdb;

    $table1 = MULTISTEP_TABLE_PREFIX."registration";

    $structure1 = "drop table if exists $table1";

    $wpdb->query($structure1);



	$table2 = MULTISTEP_TABLE_PREFIX."option";

    $structure2 = "drop table if exists $table2";

    $wpdb->query($structure2);

	remove_role( 'shop_manager' );

}





add_action('admin_menu','multistep_admin_menu');

function multistep_admin_menu()

{

	add_menu_page(

		"Seller Registration",

		"Seller Registration",

		8,

		__FILE__,

		"multistep_admin_menu_list",

		'dashicons-welcome-widgets-menus'

	);

	add_submenu_page(__FILE__,'Types of Firm','Types of Firm','8','type-of-firm','multistep_admin_menu_list_1');

	add_submenu_page(__FILE__,'Product Category','Product Category','8','product-category','multistep_admin_menu_list_2');

	add_submenu_page(__FILE__,'Field Settings','Field Settings','8','field-setting','multistep_admin_menu_list_3');

	add_submenu_page(__FILE__,'All Sellers','All Sellers','8','all-seller','multistep_admin_menu_list_4');

}

function multistep_admin_menu_list()

{

	include 'admin/seller_registration.php';

}

function multistep_admin_menu_list_1()

{

	include 'admin/type_of_firm.php';

}

function multistep_admin_menu_list_2()

{

	include 'admin/product_category.php';

}

function multistep_admin_menu_list_3()

{

	include 'admin/field_setting.php';

}

function multistep_admin_menu_list_4()

{

	include 'admin/all_sellers.php';

}





//Add ShortCode for "front end listing"

add_shortcode("multistep_registration_form","multistep_registration_site_listing_shortcode");

function multistep_registration_site_listing_shortcode($atts)

{

	include 'front/multistep-front-site.php';

}





add_action('wp_print_styles', 'add_multistep_stylesheet');

function add_multistep_stylesheet()

{

	$myStyleUrl = MULTISTEP_URL . '/css/multistep-form.css';

	$myStyleFile = MULTISTEP_FILE_PATH . '/css/multistep-form.css';

	if ( file_exists($myStyleFile) )

	{

		wp_register_style('myStyleSheets', $myStyleUrl);

		wp_enqueue_style( 'myStyleSheets');

	}

}


function phone_number() {

	global $wpdb;

	$phone_number=$_POST['phone_number'];

	$verification_code=rand('10000','99999');

	$wpdb->delete( $wpdb->prefix.'multistep_registration',

		array('phone' => $phone_number)

	);

	$wpdb->insert($wpdb->prefix.'multistep_registration',

		array(

			'phone' => $phone_number,

			'phone_verification_code' => $verification_code

		)

	);

	send_sms($phone_number, $verification_code);

	echo 'inserted';

	wp_die();

}

add_action( 'wp_ajax_nopriv_phone_number', 'phone_number' );

add_action( 'wp_ajax_phone_number', 'phone_number' );





function phone_number_verify() {

	global $wpdb;

	$phone_number=$_POST['phone_number'];

	$enter_otp_phone=$_POST['enter_otp_phone'];

	$get_data = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."multistep_registration WHERE (phone = '".$phone_number."' AND phone_verification_code = '".$enter_otp_phone."' AND phone_verified is NULL)");

	if(count($get_data)>0){

		$wpdb->update( $wpdb->prefix.'multistep_registration',

			array('phone_verified' => '1'),

			array('phone' => $phone_number)

		);

		echo 'verify';

	}

	wp_die();

}

add_action( 'wp_ajax_nopriv_phone_number_verify', 'phone_number_verify' );

add_action( 'wp_ajax_phone_number_verify', 'phone_number_verify' );

function check_email() {
	global $wpdb;
	$email_id=$_POST['email_id'];
	$get_record = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."users WHERE user_email = '".$email_id."' and user_activation_key!=''");
	if(count($get_record)>0){
		$wpdb->delete(
			$wpdb->prefix."users",
			array("ID"=>$get_record[0]->ID)
		);
		$wpdb->delete(
			$wpdb->prefix."usermeta",
			array("user_id"=>$get_record[0]->ID)
		);
	}
	$get_data = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."users WHERE user_email = '".$email_id."'");
	if(count($get_data)==0){
		echo 'verify';
	}
	exit;
}
add_action( 'wp_ajax_nopriv_check_email', 'check_email' );
add_action( 'wp_ajax_check_email', 'check_email' );

function get_states() {
	global $wpdb;
	$country_id=$_POST['country_id'];
	$get_data = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."state WHERE country_id = '".$country_id."'");
	echo json_encode($get_data);
	exit;
}
add_action( 'wp_ajax_nopriv_get_states', 'get_states' );
add_action( 'wp_ajax_get_states', 'get_states' );


function get_cities() {
	global $wpdb;
	$state_id=$_POST['state_id'];
	$get_data = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."city WHERE state_id = '".$state_id."'");
	echo json_encode($get_data);
	exit;
}
add_action( 'wp_ajax_nopriv_get_cities', 'get_cities' );
add_action( 'wp_ajax_get_cities', 'get_cities' );


function save_multistep_form() {
	global $wpdb;
	$userdata = array(
		'user_login'    =>   $_POST['phone_number'],
		'user_email'    =>   $_POST['email_address'],
		'user_pass'     =>   $_POST['password'],
		'first_name'    =>   explode(" ", $_POST['owner_name'])[0],
		'last_name'     =>   explode(" ", $_POST['owner_name'])[1],
		'role'			=> '',
		'user_activation_key' =>uniqid()
	);
	$user_id=wp_insert_user( $userdata );

	$usermeta_data=$_POST;
	$usermeta_data['payment_status']='pending';

	if ( $_FILES ) {
		$pic_data = array('owner_photo','cancelled_check');
		foreach($pic_data as $pic){
			$usermeta_data[$pic]=kv_handle_attachment($pic,0);
		}

		$files = $_FILES["upload_document_photos"];
		if(isset($files)){
			$image_data=array();
			foreach ($files['name'] as $key => $value) {
				if ($files['name'][$key]) {
					$file = array(
						'name' => $files['name'][$key],
						'type' => $files['type'][$key],
						'tmp_name' => $files['tmp_name'][$key],
						'error' => $files['error'][$key],
						'size' => $files['size'][$key]
					);
					$_FILES = array ("upload_document_photos" => $file);
					foreach ($_FILES as $file => $array) {
						$image_data[]=kv_handle_attachment($file,0);
					}
				}
			}
			$usermeta_data['upload_document_photos'] = serialize($image_data);
		}

		$files = $_FILES["product_images"];
		if(isset($files)){
			$image_data=array();
			foreach ($files['name'] as $key => $value) {
				if ($files['name'][$key]) {
					$file = array(
						'name' => $files['name'][$key],
						'type' => $files['type'][$key],
						'tmp_name' => $files['tmp_name'][$key],
						'error' => $files['error'][$key],
						'size' => $files['size'][$key]
					);
					$_FILES = array ("product_images" => $file);
					foreach ($_FILES as $file => $array) {
						$image_data[]=kv_handle_attachment($file,0);
					}
				}
			}
			$usermeta_data['product_images'] = serialize($image_data);
		}

		$files = $_FILES["shop_images"];
		if(isset($files)){
			$image_data=array();
			foreach ($files['name'] as $key => $value) {
				if ($files['name'][$key]) {
					$file = array(
						'name' => $files['name'][$key],
						'type' => $files['type'][$key],
						'tmp_name' => $files['tmp_name'][$key],
						'error' => $files['error'][$key],
						'size' => $files['size'][$key]
					);
					$_FILES = array ("shop_images" => $file);
					foreach ($_FILES as $file => $array) {
						$image_data[]=kv_handle_attachment($file,0);
					}
				}
			}
			$usermeta_data['shop_images'] = serialize($image_data);
		}

	}

	foreach($usermeta_data as $key=>$data){
		add_user_meta( $user_id, $key, $data);
	}
	@session_start();
	$_SESSION['user_data']=$_POST;


	/**Test details  */

	// $appId = "293185446c2373ac747accdf681392";
	// $secretKey = "74d69639c65b60d011f4fd9f3d142a19f67b825d";
	/** Live Details */
	$appId = "73715f27a0b5785e1650c48de51737";
	$secretKey = "854599ceab5c8a3c514ea8628bcff8c546367f2f";
	$orderId="order".rand(10000000,99999999);
	$orderAmount=@get_option('shop_manager_fees');
	$orderCurrency="INR";
	$orderNote="cashfree";
	$customerName=$_POST['owner_name'];
	$customerPhone=$_POST['phone_number'];
	$customerEmail=$_POST['email_address'];
	$returnUrl=home_url('registration-form')."?email_id=".base64_encode($_POST['email_address']);
	$notifyUrl=home_url( 'registration-form')."?notify=true";
	$postData = array(
	  "appId" => $appId,
	  "orderId" => $orderId,
	  "orderAmount" => $orderAmount,
	  "orderCurrency" => $orderCurrency,
	  "orderNote" => $orderNote,
	  "customerName" => $customerName,
	  "customerPhone" => $customerPhone,
	  "customerEmail" => $customerEmail,
	  "returnUrl" => $returnUrl,
	  "notifyUrl" => $notifyUrl,
	);
	// get secret key from your config
	ksort($postData);
	$signatureData = "";
	foreach ($postData as $key => $value){
	  $signatureData .= $key.$value;
	}
	$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
	$signature = base64_encode($signature);

	// $form_data='<form id="cashfreeForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
	$form_data='<form id="cashfreeForm" method="post" action="https://www.cashfree.com/checkout/post/submit">
		<input type="hidden" name="appId" value="'.$appId.'"/>
		<input type="hidden" name="orderId" value="'.$orderId.'"/>
		<input type="hidden" name="orderAmount" value="'.$orderAmount.'"/>
		<input type="hidden" name="orderCurrency" value="'.$orderCurrency.'"/>
		<input type="hidden" name="orderNote" value="'.$orderNote.'"/>
		<input type="hidden" name="customerName" value="'.$customerName.'"/>
		<input type="hidden" name="customerEmail" value="'.$customerEmail.'"/>
		<input type="hidden" name="customerPhone" value="'.$customerPhone.'"/>
		<input type="hidden" name="returnUrl" value="'.$returnUrl.'"/>
		<input type="hidden" name="notifyUrl" value="'.$notifyUrl.'"/>
		<input type="hidden" name="signature" value="'.$signature.'"/>
	</form>';

	$cost=base64_encode(get_option('shop_manager_fees'));
	$email_id=base64_encode($_POST['email_address']);
	$redirect_url=base64_encode($_POST['permalink']);
	$return=array();
	$return['redirect_url']=home_url()."/wp-content/plugins/multisteps-registration-form/razorpay?cost=".$cost."&email_id=".$email_id."&redirect_url=".$redirect_url;
	$return['action']=$_POST['payment_gateway'];
	$return['form_data']=$form_data;
	echo json_encode($return);
	exit;
}
add_action( 'wp_ajax_nopriv_save_multistep_form', 'save_multistep_form' );
add_action( 'wp_ajax_save_multistep_form', 'save_multistep_form' );


function kv_handle_attachment($file_handler,$post_id) {
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	$attach_id = media_handle_upload( $file_handler, $post_id );
	$attach_url = wp_get_attachment_url($attach_id);//upload file URL
	return $attach_url;
}


function send_sms($phone_number, $verification_code)

{

	$handle = curl_init();

	$text_message=urlencode($verification_code." is your one time password. Please do not share it anybody!");

	$url = "https://api.textlocal.in/send/?apiKey=Jz0sPt9cSBc-5uSObptlg2rnrvqAHHiaYKNCBSjxll&sender=TXTLCL&numbers=91".$phone_number."&message=".$text_message;

	// Set the url

	curl_setopt($handle, CURLOPT_URL, $url);

	// Set the result output to be a string.

	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	$output = curl_exec($handle);

	curl_close($handle);

}



function posts_for_current_author($query) {

        global $pagenow;



    if( 'edit.php' != $pagenow || !$query->is_admin )

        return $query;



    if( !current_user_can( 'manage_options' ) && 'product' === $query->get( 'post_type' ) ) {

       global $user_ID;

       $query->set('author', $user_ID );

     }

     return $query;

}

add_filter('pre_get_posts', 'posts_for_current_author');