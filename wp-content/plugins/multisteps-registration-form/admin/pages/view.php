<?php
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
	'document_photo_type',
	'upload_document_photos',
	'owner_photo',
	'blog_url',
	'twitter_url',
	'facebook_url',
	'website_url',
	
	'product_category',
	'product_description',
	'start_date',
	'product_images',
	'shop_images',
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
	'cancelled_check',
	'payment_status',
);
?>
<h2>View Seller</h2>
<hr/>
<table class="table" border="1">
<?php
$all_user_meta = get_user_meta( $_GET['view_id'] );
foreach($fields as $field){
	if(in_array($field, array('upload_document_photos','owner_photo','product_images','shop_images','cancelled_check'))){
		?>
		<tr>
			<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
			<td> 
				<ul class="admin_img">
				<?php 
					$images=unserialize($all_user_meta[$field][0]);
					if(is_array($images) && count($images)>0){
						foreach($images as $image){
							if($image!=""){
							?>
								<li><img src="<?php echo $image; ?>"/></li>
							<?php 
							}
						}
					}
				?>
				</ul>
			</td>
		</tr>
		<?php
	}
	else{
		?>
		<tr>
			<th><?php echo ucwords(str_replace("_"," ",$field)); ?></th>
			<td><?php echo $all_user_meta[$field][0]; ?></td>
		</tr>	
		<?php
	}
}
?>
</table>
<style>
.admin_img li {
    display: inline-block;
    width: 245px;
    margin: 0px 10px 10px 0px;
}
.admin_img li img {
    width: 100%;
    height: 100%;
}
</style>