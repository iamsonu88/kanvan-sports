<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
global $wpdb;
if(isset($_POST['btn_submit'])){
	if(null !== get_option('shop_manager_fees')){
		update_option('shop_manager_fees', $_POST['shop_manager_fees']);
	}
	else{
		add_option('shop_manager_fees', $_POST['shop_manager_fees']);
	}
}
?>
<div class="multistep_container">
	<h2>Multistep Fees Settings</h2>
	<form method="post">
		<div class="form-group">
			<label for="shop_manager_fees">Shop Manager Fees:</label>
			<input type="number" class="form-control" id="shop_manager_fees" placeholder="Enter Shop Manager Fees" name="shop_manager_fees" value="<?php echo @get_option('shop_manager_fees'); ?>" required/>
		</div>
		<button type="submit" name="btn_submit" class="btn btn-default">Update</button>
	</form>
</div>
<style>
.multistep_container {
    width: 50%;
	margin-top: 20px;
    border: solid 1px gray;
    padding: 20px;
}
</style>