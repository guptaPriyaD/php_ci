<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to <?= $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <br /><br />
        <h3 align="center"><?= $title; ?></h3>
        <br /><br />
        <form method="post" id="upload_form" align="center" enctype="multipart/form">
            <input type="file" name="image_file" id="image_file" />

            <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info">
        </form>
        <br />
        <div id="uploaded_image">
            <?= $image_data; ?>
        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function() {
    $('#upload_form').on('submit', function(e) {
        e.preventDefault();
        if($('#image_file').val() == '') {
            alert("Please select a file ");
        } else {
             $.ajax({
                url:"<?php echo base_url();?>main/ajax_upload",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#uploaded_image').html(data);
                }
             });
        }
    });
});
</script>