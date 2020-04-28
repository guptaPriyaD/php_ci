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
        <?php
        if($this->session->flashdata('message')) {
            echo '
            <div class="alert alert-success">'. $this->session->flashdata("message") .' </div>
            ';
        }
        ?>
        <form method="post" action="<?=base_url(); ?>login/login_validation" >
        <div class="form-group">
            <label>Enter Email Address</label>
            <input type="text" name="user_email" class="form_control" value="<?= set_value('user_email'); ?>">
            <span class="text-danger"><?php echo form_error("user_email") ?></span>
       </div>
       <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="user_password" class="form_control" value="<?= set_value('user_password'); ?>>
            <span class="text-danger"><?php echo form_error("user_password") ?></span>
       </div>
       <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-info" />
            <?php 
                echo $this->session->flashdata('error');
            ?>
       </div>

        </form>
    </div>

</body>
</html>