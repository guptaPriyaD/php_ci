<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

<div id="container" align="center">
	<h1>Welcome to PHP CI!</h1>

	<h3>Insert Data into CI </h3>
	<form method="post" action="<?php echo base_url() ?>main/form_validation">

	<?php
		if($this->uri->segment(2) == 'inserted') {
			echo "<p class='text-success'>Data Inserted</p>";

		} 
	?>

	<div class="form-group">
		<label>First Name</label>
		<input type="text" name="first_name" class="form_control">
		<span class="text-danger"><?php echo form_error("first_name") ?></span>
	</div>

	<div class="form-group">
		<label>Last Name</label>
		<input type="text" name="last_name" class="form_control">
		<span class="text-danger"><?php echo form_error("last_name") ?></span>
	</div>

	<div class="form-group">
		<input type="submit" name="Submit" class="btn btn-info">
	</div>

</form>


<h3>Fetch Data from table</h3>

<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
		<?php
		if($fetch_data->num_rows() > 0) {
			foreach($fetch_data->result() as $row ) {
		?>
		<tr>
			<td><?= $row->id; ?></td>
			<td><?= $row->first_name; ?></td>
			<td><?= $row->last_name; ?></td>
		</tr>
		<?php
			}
		} else {
		?>
		<tr>
			<td colspan=3>No data found</td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

	<!-- <p class="footer">Page rendered in fucking <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p> -->
</div>

</body>
</html>