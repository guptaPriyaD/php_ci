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
        <h3 align="center">Upload multiple files using Ajax Jquery</h3>
        <br /><br />

        <div class="col-md-6" align="center">
            <label>Select multiple files</label>
        </div>
        <div class="col-md-6" align="center">
            <input type="file" name="files" id="files" multiple />
        </div>
        <br /><br />
        <div id="uploaded_images">

        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#files').change(function() {
            var files = $('#files')[0].files;
            var error = '';
            var form_data = new FormData();
            for(var count=0; count<files.length; count++) {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    error += "Invalid " + count + " image files";
                } else {
                    form_data.append("files[]", files[count]);
                }
            }
            if(error == '') {
                $.ajax({
                    url:"<?php echo base_url(); ?>upload_multiple/upload",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function() {
                        $('#uploaded_images').html("<label class='text-success'>Uploading....</label>");
                    },
                    success:function(data) {
                        $('#uploaded_images').html(data);
                        $('#files').val('');
                    }
                })
            } else {
                alert(error);
            }
        }) 
    });
</script>