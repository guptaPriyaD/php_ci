<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Check email availability using ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>
    <div class="container" style="width:600px">
        Check email availability using ajax
        <br />
        <label> Enter Email </label>
        <input type="text" name="email" id="email" class="form-control" />
        <span id="email_result"></span>

    </div>
</body>
</html>
<script>
$(document).ready(function() {
    $('#email').change(function() {
        var email = $('#email').val();
        if(email != '') {
            $.ajax({
                url: "<?= base_url(); ?>main/check_email_availability",
                method: "POST",
                data:{email:email},
                success:function(response) {
                    $('#email_result').html(response);
                }
            });
        }
    })
});
</script>