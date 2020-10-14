<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">
<?php
global $wpdb;
$all_users = get_users( [ 'role__in' => [ 'shop_manager' ] ] );
if(isset($_GET['view_id'])){
	include("pages/view.php");
}
else if(isset($_GET['edit_id'])){
	include("pages/edit.php");
}
else if(isset($_GET['delete_id'])){
	$wpdb->delete(
		$wpdb->prefix."users",
		array("ID"=>$_GET['delete_id'])
	);
	$wpdb->delete(
		$wpdb->prefix."usermeta",
		array("user_id"=>$_GET['delete_id'])
	);
	wp_redirect(home_url()."/wp-admin/admin.php?page=all-seller");
}
else{
	?>
	<h2>All Sellers</h2>
	<hr/>
	<table class="table" border="1">
		<thead>
			<tr>
				<th>Sr.No.</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(count($all_users)==0){
			?>
			<tr>
				<td colspan="100%"><center>No Records Found!</center></td>
			</tr>
			<?php
		}
		else{
			$inc=1;
			foreach($all_users as $user){
				$all_user_meta = get_user_meta( $user->ID );
				?>
				<tr>
					<td><?php echo $inc++; ?></td>
					<td><?php echo explode(" ", $user->display_name)[0]; ?></td>
					<td><?php echo explode(" ", $user->display_name)[1]; ?></td>
					<td><?php echo $user->user_nicename; ?></td>
					<td><?php echo $user->user_email; ?></td>
					<td>
						<a href="admin.php?page=all-seller&view_id=<?php echo $user->ID; ?>" class="btn btn-info">View</a>
						<a href="admin.php?page=all-seller&edit_id=<?php echo $user->ID; ?>" class="btn btn-info">Edit</a>
						<a href="admin.php?page=all-seller&delete_id=<?php echo $user->ID; ?>" class="btn btn-info" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
					</td>
				</tr>
				<?php
			}
		}
		?>
		</tbody>
	</table>
<?php } ?>
</div>
<style>
.table {
    width: 60%;
}
</style>