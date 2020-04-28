<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	
</head>
<body>

    <div class="container" align="center">
        <br /><br />
        <h3><?= $title; ?></h3>
        <br /><br />
        <form method="post" action="<?=base_url(); ?>main/login_validation" >
        <div class="form-group">
            <label>Enter Username</label>
            <input type="text" name="username" class="form_control">
            <span class="text-danger"><?php echo form_error("username") ?></span>
       </div>
       <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="password" class="form_control">
            <span class="text-danger"><?php echo form_error("password") ?></span>
       </div>
       <div class="form-group">
            <input type="submit" name="insert" value="Login" class="btn btn-info" />
            <?php 
                echo $this->session->flashdata('error');
            ?>
       </div>

        </form>
    </div>

</body>
</html>