<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<script rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>

    <div id="container" align="center">
        <div class="row">
            <div class="col-md-8" style="margin:0 auto; float:none;">
                <h3 align="center">Send Email with Attachments</h3>
                <br />
                 
                <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>sendemail/send">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Name</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Address</label>
                                <textarea name="address" placeholder="Enter your address" class="form-control" required ></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Mobile Number </label>
                                <input type="text" name="mobile" placeholder="Enter mobile number" class="form-control" pattern="\d*" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select programming languages</label>
                                <select name="programming_lang[]" class="form-control" multiple required style="height:150px">
                                    <option value=".Net">.Net</option>
                                    <option value="Android">Android</option>
                                    <option value="ASP">ASP</option>
                                    <option value="C">C</option>
                                    <option value="C++">C++</option>
                                    <option value="C#">C#</option>
                                    <option value="COCOA">COCOA</option>
                                    <option value="CSS">CSS</option>
                                    <option value="DHTML">DHTML</option>
                                    <option value="Drupal">Drupal</option>
                                    <option value="Flash">Flash</option>
                                    <option value="HTML">HTML</option>
                                    <option value="HTML 5">HTML 5</option>
                                    <option value="JAVA">JAVA</option>
                                    <option value="Javascript">Javascript</option>
                                    <option value="Joomla">Joomla</option>
                                    <option value="LAMP">LAMP</option>
                                    <option value="Linux">Linux</option>
                                    <option value="Mac OS">Mac OS</option>
                                    <option value="Magento">Magento</option>
                                    <option value="MySQL">MySQL</option>
                                    <option value="Oracle">Oracle</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Perl">Perl</option>
                                    <option value="PHP">PHP</option>
                                    <option value="Ruby on Rails">Ruby on Rails</option>
                                    <option value="Salesforce">Salesforce</option>
                                    <option value="SEO">SEO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select years of experience</label>
                                <select name="experience" class="form-control"  required>
                                    <option value="">Select experience</option>
                                    <option value="0-1 years">0-1 years</option>
                                    <option value="2-3 years">2-3 years</option>
                                    <option value="4-5 years">4-5 years</option>
                                    <option value="6-7 years">6-7 years</option>
                                    <option value="8-9 years">8-9 years</option>
                                    <option value="10 or more years">10 or more years</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select your resume </label>
                                <input type="file" name="resume" accept=".doc, .docx, .pdf, .txt" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Additional Information</label>
                                <textarea name="additional_information" placeholder="Enter Additional Information" class="form-control" required rows="8"></textarea>
                            </div>
                        </div>

                        <div class="form-group" align="center">
                            <input type="submit" name="submit" value="Submit" class="btn btn-info" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
