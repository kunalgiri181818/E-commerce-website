<?php require_once("header.php");?>

<?php
if(isset($_POST['send']))
{	
	//SEND EMAIL TO ADMINISTRATOR
	$subject = 'A New Enquiry Posted';	
	$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2" align="center">
				<tr>
					<td colspan="2">A new enquiry has been posted. Details are below,</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="30%">Name : </td>
					<td width="70%">'.stripslashes($_POST['contact_name']).'</td>
				</tr>
				<tr>
					<td>Email Address : </td>
					<td>'.stripslashes($_POST['contact_email']).'</td>
				</tr>
				<tr>
					<td>Contact No : </td>
					<td>'.stripslashes($_POST['contact_phone']).'</td>
				</tr>
				<tr>
					<td>Subject : </td>
					<td>'.stripslashes($_POST['contact_subject']).'</td>
				</tr>
				<tr>
					<td valign="top">Message : </td>
					<td>'.nl2br(stripslashes($_POST['contact_message'])).'</td>
				</tr>
				</table>'; 
				
	$headers = "From: ".stripslashes($_POST['contact_name'])."<info@morningbazar.co.in>" . "\r\n" .
	"Reply-To: info@morningbazar.co.in" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	mail($contact_email,$subject,$message,$headers);

	$_SESSION['msg_succ'] = 'Thank you. Your message has been successfully sent to administrator.';
	header("location: contact-us.php");
	exit;
}
?>

			<script language="javascript" type="text/javascript">
			function echeck(str) 
			{
					var at="@"
					var dot="."
					var lat=str.indexOf(at)
					var lstr=str.length
					var ldot=str.indexOf(dot)
					if (str.indexOf(at)==-1){
						alert("Invalid email address");
					   return false;
					}
			
			
					if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
						alert("Invalid email address");
					   return false;
					}
			
			
					if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
						alert("Invalid email address");
						return false;
					}
			
			
					 if (str.indexOf(at,(lat+1))!=-1){
						alert("Invalid email address");
						return false;
					 }
			
			
					 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
						alert("Invalid email address");
						return false;
					 }
			
			
					 if (str.indexOf(dot,(lat+2))==-1){
						alert("Invalid email address");
						return false;
					 }
					
			
					 if (str.indexOf(" ")!=-1){
						alert("Invalid email address");
						return false;
					 }
					 return true;					
			}
			
			function form_validation()
			{
				if(document.getElementById('contact_name').value == "")
				{
					alert("Please enter name");
					document.getElementById('contact_name').focus();
					return false;
				}
				
				if(document.getElementById('contact_email').value == "")
				{
					alert("Please enter email");
					document.getElementById('contact_email').focus();
					return false;
				}
			   
				if(echeck(document.getElementById('contact_email').value)==false){
					document.getElementById('contact_email').focus();
					return false;
				}
				
				if(document.getElementById('contact_phone').value == "")
				{
					alert("Please enter contact number");
					document.getElementById('contact_phone').focus();
					return false;
				}

				if(document.getElementById('contact_subject').value == "")
				{
					alert("Please enter subject");
					document.getElementById('contact_subject').focus();
					return false;
				}
				
				if(document.getElementById('contact_message').value == "")
				{
					alert("Please enter message");
					document.getElementById('contact_message').focus();
					return false;
				}
			}
			</script>

			<!-- page template area start -->
			<div class="main-content bg-lighter">
    			<section class="inner-header parallax" style="background-image: url('images/bg/contact.jpg');">
      				<div class="container">
						<div class="section-content">
							<div class="row">
								<div class="col-md-12">
									<h2 class="title text-white text-center" style="text-align:center;">Contact Us</h2>
								</div>
							</div>
						</div>
					</div>
				</section>
				
    			<section id="about">
    				<div class="container pb-20 pt-20">
    					<div class="row pt-0">
    						<div class="col-md-8">
    							<h3 class="mt-0">Send us a message</h3>
    							<p class="mb-20"><b>For Any queries fill up the form below</b></p>
								<?php if(isset($_SESSION['msg_succ'])) { ?>
								<p class="mb-20"><img src="images/tick.png" alt="" /> <?php echo $_SESSION['msg_succ'];?></p>
								<?php 
								unset($_SESSION['msg_succ']);
								} 
								?>	
    							<form id="contact_form" name="contact_form" class="" action="#" method="post" onSubmit="return form_validation();">
    							<div class="row">
    								<div class="col-sm-12">
    									<div class="form-group">
    										<input name="contact_name" id="contact_name" class="form-control" type="text" placeholder="Enter Name *">
    									</div>
    								</div>
    								<div class="col-sm-12">
    									<div class="form-group">
    										<input name="contact_email" id="contact_email" class="form-control" type="text" placeholder="Enter Email *">
    									</div>
    								</div>
    							</div>
    							<div class="row">
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="contact_phone" id="contact_phone" class="form-control" type="text" placeholder="Enter Phone *">
    									</div>
    								</div>
    								<div class="col-sm-6">
    									<div class="form-group">
    										<input name="contact_subject" id="contact_subject" class="form-control" type="text" placeholder="Enter Subject *">
    									</div>
    								</div>
    							</div>
    							<div class="form-group">
    								<textarea name="contact_message" id="contact_message" class="form-control required" rows="5" placeholder="Enter Message *"></textarea>
    							</div>
    							<div class="form-group">
    								<input type="hidden" name="send" id="send" value="1" />
    								<button type="submit" class="btn btn-flat btn-theme-colored mb-sm-30 border-left-theme-color-2-4px">Send Your Message</button>
    								<button type="reset" class="btn btn-flat btn-theme-colored2 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
    							</div>
    							</form>
    						</div>
    						<div class="col-md-4">
    							<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="icon-box left media p-25 mb-20" style="background:#4B271A; border-radius:5px;"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-color-2"></i></a>
											<div class="media-body" style="font-size:17px;"><strong class="text-white">Our Office Address</strong>
												<p><p class="text-white"><?php echo $contact_address;?></a></p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 text-white">
										<div class="icon-box left media p-25 mb-20" style="background:#924900; border-radius:5px;"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-color-2"></i></a>
											<div class="media-body" style="font-size:17px;"><strong class="text-white">Our Contact Numbers</strong>
												<p>
												    <p><?php echo $contact_no1;?><br>
												    <?php echo $contact_no2;?></p>
												</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-12 text-white">
										<div class="icon-box left media p-25 mb-20" style="background:#A87753; border-radius:5px;"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-color-2"></i></a>
											<div class="media-body" style="font-size:17px;"><strong class="text-white">Our Contact Email</strong>
												<p>
												    <p><?php echo $contact_email;?></p>
												</p>
											</div>
										</div>
									</div>              
								</div>
    						</div>
    					</div>
    				</div>
    			</section>
    		</div>
			<!-- page template area end -->

<?php require_once("footer.php");?>