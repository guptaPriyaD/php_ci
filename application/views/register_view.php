<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

    <div id="container" align="center" >
        <br />
        <h3 align="center">User Registration and Login</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading"> Register </div>
            <div class="panel-body">
                <?php
                if($this->session->flashdata('message')) {
                    echo '
                    <div class="alert alert-success">
                    '. $this->session->flashdata("message") .'
                    </div>
                    ';
                }
                ?>
                <form method="post" action="<?= base_url(); ?>register/validation">
                    <div class="form-group">
                        <label>Enter your name</label>
                        <input type="text" name="user_name" class="form_control" value="<?= set_value('user_name'); ?>" />
                        <span class="text-danger"><?php echo form_error("user_name") ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter your email address</label>
                        <input type="text" name ="user_email" class="form_control" value="<?= set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error("user_email") ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter your password</label>
                        <input type="password" name ="user_password" class="form_control" value="<?= set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error("user_password") ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name ="register" class="btn btn-info" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>

