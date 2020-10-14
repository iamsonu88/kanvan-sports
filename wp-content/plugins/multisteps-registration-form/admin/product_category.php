<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
global $wpdb;
if(isset($_POST['delete_id'])){
	$delete_id=$_POST['delete_id'];
	$wpdb->delete(
		$wpdb->prefix."multistep_option", 
		array('id'=>$delete_id),
	);
}
if(isset($_POST['product_category'])){
	$product_category=$_POST['product_category'];
	$wpdb->insert(
		$wpdb->prefix."multistep_option", 
		array(
			'opt'=>'product_category',
			'field'=>$product_category
		),
	);
}
$product_category_data = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}multistep_option WHERE opt='product_category'");
?>
<div class="multistep_container">
	<h2>Product Category</h2>
	<form method="post">
		<input type="text" placeholder="Product Category" class="form-control add_txt" name="product_category" required/>
		<input type="submit" class="add_btn" value="Add">
	</form>
	<form method="post">
		<table class="table">
			<tr>
				<th>Product Category Name</th>
				<th>Action</th>
			</tr>
			<?php foreach($product_category_data as $product_category){?>
			<tr>
				<td><?php echo $product_category->field; ?></td>
				<td>
					<form method="post" onsubmit="return confirm('Are you sure you want to delete?')">
						<input type="hidden" name="delete_id" value="<?php echo $product_category->id; ?>">
						<input type="submit" value="Delete"/>
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
</div>
<style>
.add_txt {
    width: 88%;
    float: left;
    margin: 0px 0px 10px 0;
}
.add_btn {
    padding: 4px 16px;
    margin-left: 2px;
}
.multistep_container {
    width: 50%;
	margin-top: 20px;
    border: solid 1px gray;
    padding: 20px;
}
</style>