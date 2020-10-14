<?php
if(isset($_POST['btn_update'])){
	foreach($_POST as $key=>$data){
		update_user_meta( $_GET['edit_id'], $key, $data);
	}
	$message="User updated successfully!";
}
$fields=array(
	'shop_name',
	'owner_name',
	'gender',
	'birth_date',
	'total_age',
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
	'blog_url',
	'twitter_url',
	'facebook_url',
	'website_url',
	
	'product_category',
	'product_description',
	'start_date',
	'type_of_firm',
	'gst_no',
	'pan_no',
	'tin_no',
	'opening_time',
	'closing_time',
	
	'bank_name',
	'name_on_bank',
	'account_number',
	'ifsc_code',
);
?>
<h2>Edit Seller</h2>
<hr/>
<form method="post">
	<?php if(null!==$message){ ?>
		<div class="alert alert-success" role="alert">
			<?php echo $message; ?>
		</div>
	<?php } ?>
	<table class="table" border="1">
	<?php
	$all_user_meta = get_user_meta( $_GET['edit_id'] );
	$product_category_data=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}multistep_option WHERE opt='product_category'");
	$firm_data=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}multistep_option WHERE opt='firm'");
	foreach($fields as $field){
		if(in_array($field, array('total_age','shop_phone_number','phone_number'))){
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th><input type="number" class="form-control" name="<?php echo $field; ?>" value="<?php echo $all_user_meta[$field][0]; ?>"/></th>
			</tr>
			<?php
		}
		else if(in_array($field, array('birth_date','start_date'))){
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th><input type="date" class="form-control" name="<?php echo $field; ?>" value="<?php echo $all_user_meta[$field][0]; ?>"/></th>
			</tr>
			<?php
		}
		else if(in_array($field, array('gender'))){
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th>
					<select class="form-control" name="<?php echo $field; ?>">
						<option value="">--Select--</option>
						<option value="male" <?php if($all_user_meta[$field][0]=='male'){ echo "selected"; } ?>>Male</option>
						<option value="female" <?php if($all_user_meta[$field][0]=='female'){ echo "selected"; } ?>>Female</option>
						<option value="others" <?php if($all_user_meta[$field][0]=='others'){ echo "selected"; } ?>>Others</option>
					</select>
				</th>
			</tr>
			<?php
		}
		else if(in_array($field, array('product_category'))){
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th>
					<select class="form-control" name="<?php echo $field; ?>">
						<option value="">--Select--</option>
						<?php foreach($product_category_data as $product_category){ ?>
							<option value="<?php echo $product_category->field; ?>" <?php if($product_category->field==$all_user_meta[$field][0]){ echo "selected"; } ?>><?php echo $product_category->field; ?></option>
						<?php } ?>
					</select>
				</th>
			</tr>
			<?php
		}
		else if(in_array($field, array('type_of_firm'))){
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th>
					<select class="form-control" name="<?php echo $field; ?>">
						<option value="">--Select--</option>
						<?php foreach($firm_data as $firm){ ?>
							<option value="<?php echo $firm->field; ?>" <?php if($firm->field==$all_user_meta[$field][0]){ echo "selected"; } ?>><?php echo $firm->field; ?></option>
						<?php } ?>
					</select>
				</th>
			</tr>
			<?php
		}
		else if(in_array($field, array('country'))){
			$country_data=$wpdb->get_results("SELECT * FROM {$wpdb->prefix}countries");
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th>
					<select class="form-control" name="<?php echo $field; ?>">
						<option value="">--Select--</option>
						<?php foreach($country_data as $country){ ?>
							<option value="<?php echo $country->id; ?>" <?php if($country->id==$all_user_meta[$field][0]){ echo "selected"; }?>><?php echo $country->name; ?></option>
						<?php } ?>
					</select>
				</th>
			</tr>
			<?php
		}
		else if(in_array($field, array('state', 'city'))){
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th>
					<select class="form-control" name="<?php echo $field; ?>">
						<option value="">--Select--</option>
					</select>
				</th>
			</tr>
			<?php
		}
		else{
			?>
			<tr>
				<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
				<th><input class="form-control" name="<?php echo $field; ?>" value="<?php echo $all_user_meta[$field][0]; ?>"/></th>
			</tr>	
			<?php
		}
	}
	?>
	<tr>
		<th></th>
		<th><input type="submit" class="btn btn-info" name="btn_update" value="Update"/></th>
	</tr>
	</table>
</form>
<div id="cover-spin"></div>
<script>
jQuery(document).ready(function(){
	if(jQuery('[name="country"]').val()!=""){
		jQuery("#cover-spin").show();
		var country_id=jQuery('[name="country"]').val();
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
			jQuery('[name="state"] option[value="<?php echo $all_user_meta['state'][0]; ?>"]').attr("selected", true).change();
			jQuery("#cover-spin").hide();
			getCity();
		});
	}
	function getCity(){
		if(jQuery('[name="state"]').val()!=""){
			jQuery("#cover-spin").show();
			var state_id=jQuery('[name="state"]').val();
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
				jQuery('[name="city"] option[value="<?php echo $all_user_meta['city'][0]; ?>"]').attr("selected", true).change();
				jQuery("#cover-spin").hide();
			});
		}
	}
	
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
});
</script>