<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
global $wpdb;
if(isset($_POST['btn_field_submit'])){
	$wpdb->delete(
		$wpdb->prefix."multistep_option", 
		array('option'=>'required_field')
	);
	
	foreach($_POST as $key=>$post_data){
		if($key!='btn_field_submit'){
			$wpdb->insert(
				$wpdb->prefix."multistep_option", 
				array(
					'opt'=>'required_field',
					'field'=>$key
				)
			);
		}
	}
}
$fields=array(
	'shop_name',
	'owner_name',
	'gender',
	'birth_date',
	'total_age',
	'total_weight',
	'total_height',
	'shop_phone_number',
	'phone_number',
	'email_address',
	'password',
	'shop_address_1',
	'shop_address_2',
	'country',
	'state',
	'city',
	'pin_code',
	'shop_running_from',
	'document_photo_type',
	'upload_document_photos',
	'owner_photo',
	// 'blog_url',
	// 'twitter_url',
	// 'facebook_url',
	// 'website_url',
	
	// 'product_category',
	// 'product_description',
	// 'start_date',
	// 'product_images',
	// 'shop_images',
	// 'type_of_firm',
	// 'gst_no',
	// 'pan_no',
	// 'tin_no',
	// 'opening_time',
	// 'closing_time',
	
	// 'bank_name',
	// 'name_on_bank',
	// 'account_number',
	// 'ifsc_code',
	// 'cancelled_check',
);
?>
<div class="multistep_container">
	<h2>Multistep Field Settings</h2>
	<form method="post">
		<table class="table">
			<tr>
				<th>Fields Name</th>
				<th>Is Required</th>
			</tr>
			<?php 
				foreach($fields as $field){
				$get_data=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}multistep_option WHERE opt='required_field' and field='".$field."'");
				?>
				<tr>
					<td><?php echo $field; ?></td>
					<td><input type="checkbox" class="form-control" name="<?php echo $field; ?>" value="1" <?php if(count($get_data)>0){ echo 'checked'; } ?>></td>
				</tr>
				<?php 
				}
			?>
		</table>
		<button type="submit" name="btn_field_submit" class="btn btn-default">Update</button>
	</form>
</div>
<style>
.multistep_container {
    width: 70%;
	margin-top: 20px;
    border: solid 1px gray;
    padding: 20px;
}
</style>