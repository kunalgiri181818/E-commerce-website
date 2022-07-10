<?php
error_reporting(0);

date_default_timezone_set('Asia/Kolkata');

function _call($action) 
{
    switch ($action) 
	{
		case 'about_us':
		_about_us();
		break;
		
		case 'terms':
		_terms();
		break;
		
		case 'order_cancellation':
		_order_cancellation();
		break;
		
		case 'why_choose':
		_why_choose();
		break;
		
		case 'return_refund':
		_return_refund();
		break;
		
		case 'privacy':
		_privacy();
		break;
		
		case 'refer_earn':
		_refer_earn();
		break;
		
		case 'delivery_text':
		_delivery_text();
		break;
		
		case 'our_contacts':
		_our_contacts();
		break;
		
		case 'zipcode_list':
		_zipcode_list();
		break;
		
		case 'registration':
		_registration();
		break;
		
		case 'otp_validation':
		_otp_validation();
		break;
		
		case 'my_account':
		_my_account();
		break;
		
		case 'login':
		_login();
		break;
		
		case 'forgot_password':
		_forgot_password();
		break;
		
		case 'change_password':
		_change_password();
		break;
		
		case 'edit_profile':
		_edit_profile();
		break;
		
		case 'post_enquiry':
		_post_enquiry();
		break;
		
		case 'category':
		_category();
		break;
		
		case 'subcategory':
		_subcategory();
		break;
		
		case 'product_list':
		_product_list();
		break;
		
		case 'most_selling_product_list':
		_most_selling_product_list();
		break;
			
		case 'add_to_cart':
		_add_to_cart();
		break;
		
		case 'view_cart':
		_view_cart();
		break;
		
		case 'delete_item':
		_delete_item();
		break;
		
		case 'update_item':
		_update_item();
		break;
		
		case 'zipcode_availability':
		_zipcode_availability();
		break;

		case 'checkout':
		_checkout();
		break;

		case 'order_thankyou':
		_order_thankyou();
		break;
		
		case 'search_result':
		_search_result();
		break;
		
		case 'my_orders':
		_my_orders();
		break;
		
		case 'order_details':
		_order_details();
		break;		
		
		case 'cancel_order_request':
		_cancel_order_request();
		break;
		
		case 'post_suggestion':
		_post_suggestion();
		break;
		
		case 'my_wallet':
		_my_wallet();
		break;
		
		case 'my_referral':
		_my_referral();
		break;
		
		case 'banners':
		_banners();
		break;
		
		case 'brands':
		_brands();
		break;
		
		case 'offers':
		_offers();
		break;
		
		case 'view_suggestion':
		_view_suggestion();
		break;
		
		case 'organic_benefits':
		_organic_benefits();
		break;
		
		case 'pickup_time':
		_pickup_time();
		break;
		
		case 'home_delivery_slot':
		_home_delivery_slot();
		break;
		
		case 'sliding_product_list':
		_sliding_product_list();
		break;
		
		case 'registration_resend_otp';
		_registration_resend_otp();
		break;
		
		case 'resend_otp';
		_resend_otp();
		break;
		
		case 'notification':
		_notification();
		break;
		
		case 'test_push':
		_test_push();
		break;
		
		case 'whychoose':
		_whychoose();
		break;

		default:
		_basic();
    }
}

function _basic() {

    echo 'Function not defined....';
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=organic_benefits
function _organic_benefits() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '9'"));
	
	$data['AboutData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content_photo" => SITE_URL."uploads/banner/".stripslashes($arrContent['content_photo']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=about_us
function _about_us() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '1'"));
	
	$data['AboutData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=notification
function _notification() 
{
    $data = array();
	
	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
	
	$data['NotificationData'] = array("notification_text" => stripslashes($arrAdmin['notification_text']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=terms
function _terms() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '2'"));
	
	$data['TermData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=order_cancellation
function _order_cancellation() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '7'"));
	
	$data['PrivacyData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=return_refund
function _return_refund() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '5'"));
	
	$data['PrivacyData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=privacy
function _privacy() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '3'"));
	
	$data['PrivacyData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=refer_earn
function _refer_earn() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '6'"));
	
	$data['TermData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content_photo" => SITE_URL."uploads/banner/".stripslashes($arrContent['content_photo']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=delivery_text
function _delivery_text() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '8'"));
	
	$data['TermData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content_photo" => SITE_URL."uploads/banner/".stripslashes($arrContent['content_photo']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=why_choose
function _why_choose() 
{
    $data = array();
	
	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_contents` WHERE `content_id` = '10'"));
	
	$data['TermData'] = array("content_id" => $arrContent['content_id'],
	"content_title" => stripslashes($arrContent['content_title']),
	"content_photo" => SITE_URL."uploads/banner/".stripslashes($arrContent['content_photo']),
	"content" => stripslashes($arrContent['content']),
	"Ack" => 1,
	"msg" => 'Success'
	);

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=our_contacts
function _our_contacts() 
{
    $data = array();
	
	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
	
	$data['ContactData'] = array("address" => $arrAdmin['contact_address'],
	"contact_person" => stripslashes($arrAdmin['contact_person']),
	"email" => stripslashes($arrAdmin['contact_email']),
	"contact_no1" => stripslashes($arrAdmin['contact_no1']),
	"contact_no2" => stripslashes($arrAdmin['contact_no2']),
	"whatsapp_no" => stripslashes($arrAdmin['whatsapp_no']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=login&phone=8240138798&password=123456&device_token_id=123
function _login() 
{
    $data = array();
	
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
    $device_token_id = isset($_REQUEST['device_token_id']) ? $_REQUEST['device_token_id'] : '';
	
	$sqlCheck = "SELECT * FROM `og_users` WHERE `phone` = '".$phone."' AND `password` = '".md5($password)."'";
	$exeCheck = mysql_query($sqlCheck) or die(mysql_error());
	$numCheck = mysql_num_rows($exeCheck);
	if($numCheck>0)
	{
		$arrCheck = mysql_fetch_array($exeCheck);
		
		if($arrCheck['is_active']=='No')
		{
			$data['Ack'] = 0;
			$data['msg'] = 'You haven\'t activated your account by OTP.';
		}
		else
		{
			$sql_update2 = "UPDATE `og_temp_cart` SET `user_id` = '".$arrCheck['user_id']."' WHERE `unique_id` = '".$unique_id."'";
			$exe_update2 = mysql_query($sql_update2) or die(mysql_error());
				
			$data['LoginData'][] = array("user_id" => $arrCheck['user_id'],
			"fname" => stripslashes($arrCheck['fname']),
			"lname" => stripslashes($arrCheck['lname']),
			"email" => stripslashes($arrCheck['email']),
			"phone" => stripslashes($arrCheck['phone']),
			"address" => stripslashes($arrCheck['address']),
			"city" => stripslashes($arrCheck['city']),
			"state" => stripslashes($arrCheck['state']),
			"zip" => stripslashes($arrCheck['zip'])
			);
			
			$data['Ack'] = 1;
			$data['msg'] = 'You have successfully logged in.';
		}
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'Invalid login credentials. Please try again!';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=registration&fname=Saptarshi&lname=Ghosh &email=saptarshi.mailme@gmail.com&phone=9007272180&password=123456&confirm_password=123456
function _registration() 
{
    $data = array();
	
    $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
	$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
	$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
	$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : '';
	$zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	$confirm_password = isset($_REQUEST['confirm_password']) ? $_REQUEST['confirm_password'] : '';

	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
	$wallet_balance = $arrAdmin['registration_amount'];
	
	$otp = rand(1000,9999);
	function random_strings($length_of_string) 
	{ 
		// String of all alphanumeric character 
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 

		// Shufle the $str_result and returns substring 
		// of specified length 
		return substr(str_shuffle($str_result), 0, $length_of_string); 
	}
	
	$sqlCheck = "SELECT * FROM `og_users` WHERE (`phone` = '".$phone."' OR `email` = '".$email."')";
	$sqlCheck = mysql_query($sqlCheck) or die(mysql_error());
	$numCheck = mysql_num_rows($sqlCheck);
	if($numCheck == 0)
	{
		$reff_code = random_strings(8);
		
		$number = '91'.$phone;
		$msgtext = "Your OTP : ".$otp;
		
		$api_params = 'Apikey=Kwp6eCioc0qv3HnwUhbkRQ&senderid=FRESHX&channel=Trans&DCS=0&flashsms=0&number='.$number.'&text='.urlencode($msgtext).'&route=27';  
		$smsGatewayUrl = "http://182.18.162.128/api/mt/SendSMS?";  
		$smsgatewaydata = $smsGatewayUrl.$api_params;
		$url = $smsgatewaydata;

		$ch = curl_init();                       // initialize CURL
		curl_setopt($ch, CURLOPT_POST, true);    // Set CURL Post Data
		curl_setopt($ch, CURLOPT_URL, urlencode($url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);                         // Close CURL

		// Use file get contents when CURL is not installed on server.
		if(!$output){
		  $output =  file_get_contents($smsgatewaydata);  
		}		
		
		$sqlInsert = "INSERT INTO `og_users` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`phone` = '".$phone."',`password` = '".md5($password)."',`original_password` = '".$password."',`otp` = '".$otp."',`address` = '".$address."',`city` = '".$city."',`state` = '".$state."',`zip` = '".$zip."',`registration_date` = '".date('Y-m-d H:i:s',time())."'";
		$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
		$last_id = mysql_insert_id();

		$data['Ack'] = 1;
		$data['user_id'] = $last_id;
		$data['msg'] = 'We have sent OTP to your mobile no.';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'You have already registered by this email or phone no. Please try with another email or phone no.!';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/vehcl/webservice/service.php?action=otp_validation&otp=1111&user_id=1&unique_id=1234567890
function _otp_validation() 
{
    $data = array();
	
    $otp = isset($_REQUEST['otp']) ? $_REQUEST['otp'] : '';
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$sqlCheck = "SELECT * FROM `og_users` WHERE `otp` = '".$otp."' AND `user_id` = '".$user_id."'";
	$exeCheck = mysql_query($sqlCheck) or die(mysql_error());
	$numCheck = mysql_num_rows($exeCheck);
	if($numCheck>0)
	{
		$arrCheck = mysql_fetch_array($exeCheck);
		
		$sqlUpdate = "UPDATE `og_users` SET `is_active` = 'Yes' WHERE `otp` = '".$otp."' AND `user_id` = '".$user_id."'";
		$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
		
		$sql_update2 = "UPDATE `og_temp_cart` SET `user_id` = '".$user_id."' WHERE `unique_id` = '".$unique_id."'";
	    $exe_update2 = mysql_query($sql_update2) or die(mysql_error());
	    
	    $getLastUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'"));
		
		$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
		
		$subject = 'Registration Successful';	
		$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
					<tr>
						<td>Hi '.$getLastUser['fname'].' '.$getLastUser['lname'].',</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Thanks for your registration. Your login credentials are below:</td>
					</tr>
					<tr>
						<td>Phone No. : '.$getLastUser['phone'].'<br>Password : '.$getLastUser['original_password'].'</td>
					</tr>
					<tr>
    					<td>Reference Code : '.$getLastUser['ref_code'].'</td>
    				</tr>
    				<tr>
    				    <td>You can share your Reference Code to join other people.</td>
    				</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Thanks & Regards,<br>'.$arrAdmin['company_name'].' Team</td>
					</tr>
					</table>';
	
		$headers = "From: ".$arrAdmin['company_name']."<info@morningbazar.co.in>" . "\r\n" .
		"Reply-To: info@morningbazar.co.in" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($getLastUser['email'],$subject,$message,$headers);
	    
	    $data['LoginData'][] = array("user_id" => $getLastUser['user_id'],
		"fname" => stripslashes($getLastUser['fname']),
		"lname" => stripslashes($getLastUser['lname']),
		"email" => stripslashes($getLastUser['email']),
		"phone" => stripslashes($getLastUser['phone']),
		"address" => stripslashes($getLastUser['address']),
		"city" => stripslashes($getLastUser['city']),
		"state" => stripslashes($getLastUser['state']),
		"zip" => stripslashes($getLastUser['zip'])
		);
		
		$data['Ack'] = 1;
		$data['msg'] = 'Congratulations! You have won Rs.'.$arrAdmin['registration_amount'].'. Refer the code you will get Rs.'.$arrAdmin['referal_cost'].' more after first purchasing.';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'Invalid OTP. Please try again!';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=forgot_password&phone=9007272180
function _forgot_password() 
{
    $data = array();
	
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	
	$sqlForgot = "SELECT * FROM `og_users` WHERE `phone` = '".$phone."'";
	$exeForgot = mysql_query($sqlForgot) or die(mysql_error());
	$numForgot = mysql_num_rows($exeForgot);
	if($numForgot>0)
	{
        $arrForgot = mysql_fetch_array($exeForgot);
		$name = stripslashes($arrForgot['fname'])." ".stripslashes($arrForgot['lname']); 
		$new_password = time();
		
		$sqlUpdate = "UPDATE `og_users` SET `password` = '".md5($new_password)."',`original_password` = '".$new_password."' WHERE `phone` = '".$phone."'";
		$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
		
		$number = '91'.$phone;
		$msgtext = 'New Password : '.$new_password;
		
		$api_params = 'Apikey=Kwp6eCioc0qv3HnwUhbkRQ&senderid=FRESHX&channel=Trans&DCS=0&flashsms=0&number='.$number.'&text='.urlencode($msgtext).'&route=27';  
		$smsGatewayUrl = "http://182.18.162.128/api/mt/SendSMS?";  
		$smsgatewaydata = $smsGatewayUrl.$api_params;
		$url = $smsgatewaydata;

		$ch = curl_init();                       // initialize CURL
		curl_setopt($ch, CURLOPT_POST, true);    // Set CURL Post Data
		curl_setopt($ch, CURLOPT_URL, urlencode($url));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);                         // Close CURL

		// Use file get contents when CURL is not installed on server.
		if(!$output){
		  $output =  file_get_contents($smsgatewaydata);  
		}

		$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
		
		$subject = 'Forgot Password';	
		$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
					<tr>
						<td>Hi '.$name.',</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>We are sorry that you misplaced your password, but not to worry. We have reset your password.</td>
					</tr>
					<tr>
						<td>New Password : '.$new_password.'</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Thanks & Regards,<br>'.$arrAdmin['company_name'].' Team</td>
					</tr>
					</table>';
	
		$headers = "From: ".$arrAdmin['company_name']."<info@morningbazar.co.in>" . "\r\n" .
		"Reply-To: info@morningbazar.co.in" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($email,$subject,$message,$headers);
		
		$data['Ack'] = 1;
		$data['msg'] = 'We have reset your password and sent to you by SMS.';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'Invalid email. Please try again!';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=my_account&user_id=1
function _my_account() 
{
    $data = array();
	
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	
	$sqlUser = "SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'";
	$exeUser = mysql_query($sqlUser) or die(mysql_error());
	$arrUser = mysql_fetch_array($exeUser);
	
	if($arrUser['profile_photo']!="")
	{
		$profile_photo = SITE_URL."uploads/user/".$arrUser['profile_photo'];
	}
	else
	{
		$profile_photo = "";
	}
	
	$data['UserData'][] = array("user_id" => $arrUser['user_id'],
	"fname" => stripslashes($arrUser['fname']),
	"lname" => stripslashes($arrUser['lname']),
	"email" => stripslashes($arrUser['email']),
	"phone" => stripslashes($arrUser['phone']),
	"address" => stripslashes($arrUser['address']),
	"city" => stripslashes($arrUser['city']),
	"state" => stripslashes($arrUser['state']),
	"zip" => stripslashes($arrUser['zip'])
	);
		
	$data['Ack'] = 1;
	$data['msg'] = '';

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=change_password&old_password=123456&new_password=1111111&confirm_password=1111111&user_id=1
function _change_password() 
{
    $data = array();
	
    $old_password = isset($_REQUEST['old_password']) ? $_REQUEST['old_password'] : '';
	$new_password = isset($_REQUEST['new_password']) ? $_REQUEST['new_password'] : '';
	$confirm_password = isset($_REQUEST['confirm_password']) ? $_REQUEST['confirm_password'] : '';
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	
	$sqlCheck = "SELECT * FROM `og_users` WHERE `password` = '".md5($old_password)."' AND `user_id` = '".$user_id."'";
	$exeCheck = mysql_query($sqlCheck) or die(mysql_error());
	$numCheck = mysql_num_rows($exeCheck);
	if($numCheck>0)
	{
    	$sqlUpdate = "UPDATE `og_users` SET `password` = '".md5($new_password)."',`original_password` = '".$new_password."' WHERE `user_id` = '".$user_id."'";
		$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
		
		$data['Ack'] = 1;
		$data['msg'] = 'Password changed successfully.';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'Old password not found in database. Please try again!';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=edit_profile&fname=Saptarshi&lname=Ghosh &email=saptarshi.mailme@gmail.com&phone=9007272180&address=abc&city=Kolkata&state=West Bengal&zip=700085
function _edit_profile() 
{
    $data = array();
	
    $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
	$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
	$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
	$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : '';
	$zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';	
	
	$sqlUser = "SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'";
	$exeUser = mysql_query($sqlUser) or die(mysql_error());
	$arrUser = mysql_fetch_array($exeUser);

	$sqlUpdate = "UPDATE `og_users` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`phone` = '".$phone."',`address` = '".$address."',`city` = '".$city."',`state` = '".$state."',`zip` = '".$zip."' WHERE `user_id` = '".$user_id."'";
	$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
	
	$data['Ack'] = 1;
	$data['msg'] = 'Profile updated successfully.';
           	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=category
function _category() 
{
    $data = array();

	$sqlCategory = "SELECT * FROM `og_category` WHERE `category_status` = 'Active' ORDER BY `category_id` ASC";
	$exeCategory = mysql_query($sqlCategory) or die(mysql_error());
	$numCategory = mysql_num_rows($exeCategory);
	if($numCategory>0)
	{
		while($arrCategory = mysql_fetch_array($exeCategory))
		{
			$num_subcategory = mysql_num_rows(mysql_query("SELECT * FROM `og_subcategory` WHERE `category_id` = '".$arrCategory['category_id']."'"));
			
			$category_photo = SITE_URL."uploads/category/".$arrCategory['category_photo'];
			
			$data['CategoryData'][] = array("category_id" => $arrCategory['category_id'],
			"category_name" => $arrCategory['category_name'],
			"no_of_subcategory" => $num_subcategory,
			"category_photo" => $category_photo
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No category available';
    }

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=subcategory&category_id=3
function _subcategory() 
{
    $data = array();
	
    $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : '';

	$sqlCategory = "SELECT * FROM `og_subcategory` WHERE `category_id` = '".$category_id."' AND `subcategory_status` = 'Active' ORDER BY `subcategory_id` ASC";
	$exeCategory = mysql_query($sqlCategory) or die(mysql_error());
	$numCategory = mysql_num_rows($exeCategory);
	if($numCategory>0)
	{
		while($arrCategory = mysql_fetch_array($exeCategory))
		{
			$subcategory_photo = SITE_URL."uploads/subcategory/".$arrCategory['subcategory_photo'];
			
			$data['SubCategoryData'][] = array("subcategory_id" => $arrCategory['subcategory_id'],
			"subcategory_name" => $arrCategory['subcategory_name'],
			"subcategory_photo" => $subcategory_photo
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No subcategory available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=product_list&category_id=3&subcategory_id=3&user_id=1&unique_id=11111111111&brand_id=1
function _product_list() 
{
    $data = array();
	$data_temp = array();
	
    $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : '';
	$subcategory_id = isset($_REQUEST['subcategory_id']) ? $_REQUEST['subcategory_id'] : '';
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';

	
	if($subcategory_id==0)
	{
	    $sqlFood = "SELECT * FROM `og_products` WHERE `category_id` = '".$category_id."' AND `product_status` = 'Active' ORDER BY `product_id` ASC";
	}
	else
	{
	    $sqlFood = "SELECT * FROM `og_products` WHERE `category_id` = '".$category_id."' AND `subcategory_id` = '".$subcategory_id."' AND `product_status` = 'Active' ORDER BY `product_id` ASC";
	}
	$exeFood = mysql_query($sqlFood) or die(mysql_error());
	$numFood = mysql_num_rows($exeFood);
	if($numFood>0)
	{
		while($arrFood = mysql_fetch_array($exeFood))
		{
			$product_photo = SITE_URL."uploads/product/".$arrFood['product_photo'];
			if($arrFood['product_photo2']!="")
			{
				$product_photo2 = SITE_URL."uploads/product/".$arrFood['product_photo2'];
			}
			else
			{
				$product_photo2 = "";
			}
			if($arrFood['product_photo3']!="")
			{
				$product_photo3 = SITE_URL."uploads/product/".$arrFood['product_photo3'];
			}
			else
			{
				$product_photo3 = "";
			}
			if($arrFood['product_photo4']!="")
			{
				$product_photo4 = SITE_URL."uploads/product/".$arrFood['product_photo4'];
			}
			else
			{
				$product_photo4 = "";
			}
			
			$sqlPack = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arrFood['product_id']."' ORDER BY `packet_id` ASC";
			$exePack = mysql_query($sqlPack) or die(mysql_error());
			$numPack = mysql_num_rows($exePack);
			if($numPack>0)
			{
				while($arrPack = mysql_fetch_array($exePack))
				{
					$data_temp['PackData'][] = array("packet_id" => $arrPack['packet_id'],
					"product_id" => stripslashes($arrPack['product_id']),
					"packet_size" => stripslashes($arrPack['packet_size']),
					"price" => $arrPack['price'],
					"discount" => $arrPack['discount'].'%',
					"original_price" => $arrPack['original_price']
					);		
				}
			}
			else
			{
				$data_temp['PackData'] = array();
			}
			
			$data['ProductData'][] = array("product_id" => $arrFood['product_id'],
			"product_name_english" => $arrFood['product_name_english'],
			"stock_available" => $arrFood['stock_available'],
			"product_details" => stripslashes($arrFood['product_details']),
			"product_photo" => $product_photo,
			"product_photo2" => $product_photo2,
			"product_photo3" => $product_photo3,
			"product_photo4" => $product_photo4,
			"Packets" => $data_temp['PackData']
			);
			
			unset($data_temp['PackData']);
		}
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No product available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=most_selling_product_list&user_id=1&unique_id=11111111111
function _most_selling_product_list() 
{
    $data = array();
	$data_temp = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$sqlFood = "SELECT * FROM `og_products` WHERE `sale` <> 0 ORDER BY `sale` DESC";
	$exeFood = mysql_query($sqlFood) or die(mysql_error());
	$numFood = mysql_num_rows($exeFood);
	if($numFood>0)
	{
		while($arrFood = mysql_fetch_array($exeFood))
		{
			$product_photo = SITE_URL."uploads/product/".$arrFood['product_photo'];
			if($arrFood['product_photo2']!="")
			{
				$product_photo2 = SITE_URL."uploads/product/".$arrFood['product_photo2'];
			}
			else
			{
				$product_photo2 = "";
			}
			if($arrFood['product_photo3']!="")
			{
				$product_photo3 = SITE_URL."uploads/product/".$arrFood['product_photo3'];
			}
			else
			{
				$product_photo3 = "";
			}
			if($arrFood['product_photo4']!="")
			{
				$product_photo4 = SITE_URL."uploads/product/".$arrFood['product_photo4'];
			}
			else
			{
				$product_photo4 = "";
			}
			
			$sqlPack = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arrFood['product_id']."' ORDER BY `packet_id` ASC";
			$exePack = mysql_query($sqlPack) or die(mysql_error());
			$numPack = mysql_num_rows($exePack);
			if($numPack>0)
			{
				while($arrPack = mysql_fetch_array($exePack))
				{
					$data_temp['PackData'][] = array("packet_id" => $arrPack['packet_id'],
					"product_id" => stripslashes($arrPack['product_id']),
					"packet_size" => stripslashes($arrPack['packet_size']),
					"price" => $arrPack['price'],
					"discount" => $arrPack['discount'].'%',
					"original_price" => $arrPack['original_price']
					);		
				}
			}
			else
			{
				$data_temp['PackData'] = array();
			}
			
			$data['ProductData'][] = array("product_id" => $arrFood['product_id'],
			"product_name_english" => $arrFood['product_name_english'],
			"stock_available" => $arrFood['stock_available'],
			"product_details" => stripslashes($arrFood['product_details']),
			"product_photo" => $product_photo,
			"product_photo2" => $product_photo2,
			"product_photo3" => $product_photo3,
			"product_photo4" => $product_photo4,
			"Packets" => $data_temp['PackData']
			);
			
			unset($data_temp['PackData']);
		}
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No product available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=add_to_cart&user_id=1&unique_id=11111111111&product_id=1&packet_id=1&quantity=1
function _add_to_cart() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	$product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : '';
	$packet_id = isset($_REQUEST['packet_id']) ? $_REQUEST['packet_id'] : '';
	$quantity = isset($_REQUEST['quantity']) ? $_REQUEST['quantity'] : '';
	$isCartAdd = isset($_REQUEST['isCartAdd']) ? $_REQUEST['isCartAdd'] : '';

	$arrProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$product_id."'"));
	$product_name_english = stripslashes($arrProduct['product_name_english']);
	
	$arrPacket = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$packet_id."'"));
	$price = $arrPacket['price'];
	
	$sqlCheckCart = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' AND `product_id` = '".$product_id."' AND `packet_id` = '".$packet_id."'";
	$exeCheckCart = mysql_query($sqlCheckCart) or die(mysql_error());
	$numCheckCart = mysql_num_rows($exeCheckCart);
	if($numCheckCart>0)
	{
		if($isCartAdd == 1)
		{
    		$arrCheckCart = mysql_fetch_array($exeCheckCart);
    		$new_quantity = $arrCheckCart['quantity']+$quantity;
    		$new_subtotal = $price*$new_quantity;
    		
    		$sqlUpdate = "UPDATE `og_temp_cart` SET `unit_price` = '".$price."',`quantity` = '".$new_quantity."',`subtotal` = '".$new_subtotal."' WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' AND `product_id` = '".$product_id."' AND `packet_id` = '".$packet_id."'";
    		$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
    		
    		$data['Ack'] = 1;
    	    $data['msg'] = 'Item added to your basket.';
		}
		else
		{
		    $arrCheckCart = mysql_fetch_array($exeCheckCart);
    		$new_quantity = $arrCheckCart['quantity']-$quantity;
    		$new_subtotal = $price*$new_quantity;
    		
    		$sqlUpdate = "UPDATE `og_temp_cart` SET `unit_price` = '".$price."',`quantity` = '".$new_quantity."',`subtotal` = '".$new_subtotal."' WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' AND `product_id` = '".$product_id."' AND `packet_id` = '".$packet_id."'";
    		$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
    		
    		$data['Ack'] = 1;
    	    $data['msg'] = 'Item deleted from your basket.';
		}
	}
	else
	{
		$sqlInsert = "INSERT INTO `og_temp_cart` SET `user_id` = '".$user_id."',`unique_id` = '".$unique_id."',`product_id` = '".$product_id."',`packet_id` = '".$packet_id."',`unit_price` = '".$price."',`quantity` = '".$quantity."',`subtotal` = '".$price."'";
		$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
		
		$data['Ack'] = 1;
	    $data['msg'] = 'Item added to your basket.';
	}

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=view_cart&user_id=1&unique_id=11111111111
function _view_cart() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	$fetchTotal = mysql_fetch_array(mysql_query("SELECT SUM(`subtotal`) AS `TOTAL_PRICE` FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'"));
	$total_price = $fetchTotal['TOTAL_PRICE'];
	
	$fetchTotalQuantity = mysql_fetch_array(mysql_query("SELECT SUM(`quantity`) AS `TOTAL_QUANTITY` FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'"));
	$total_quantity = $fetchTotalQuantity['TOTAL_QUANTITY'];
	
	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
	$delivery_charge = $arrAdmin['delivery_charge'];
	$delivery_charge_limit = $arrAdmin['delivery_charge_limit'];

	$getUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'"));	

	if($total_price<$delivery_charge_limit)
	{
		$grand_total = $total_price+$delivery_charge;
		$delivery_charge_display = $delivery_charge;
	}
	else
	{
		$grand_total = $total_price;
		$delivery_charge_display = '0.00';
	}

	$sqlCart = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' ORDER BY `cart_id` ASC";
	$exeCart = mysql_query($sqlCart) or die(mysql_error());
	$numCart = mysql_num_rows($exeCart);
	if($numCart>0)
	{
		while($arrCart = mysql_fetch_array($exeCart))
		{
			$arrProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arrCart['product_id']."'"));
			$product_name_english = stripslashes($arrProduct['product_name_english']);
			$product_photo = SITE_URL."uploads/product/".$arrProduct['product_photo'];
			
			$arrPacket = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arrCart['packet_id']."'"));
			
			$data['CartData'][] = array("cart_id" => $arrCart['cart_id'],
			"product_photo" => $product_photo,
			"product_name_english" => $product_name_english,
			"packet_size" => $arrPacket['packet_size'],
			"original_price" => $arrPacket['original_price'],
			"quantity" => $arrCart['quantity'],
			"discount" => $arrPacket['discount'].'%',
			"unit_price" => $arrCart['unit_price'],
			"subtotal" => $arrCart['subtotal']
			);
		}
		
		$data['PriceData'] = array("total_price" => $total_price,
		"total_quantity" => $total_quantity,
		"delivery_charge" => $delivery_charge_display,
		"grand_total" => $grand_total
		);

		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'Your basket is empty!';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=delete_item&cart_id=1&$user_id=1&unique_id=11111111111
function _delete_item() 
{
    $data = array();
	
    $cart_id = isset($_REQUEST['cart_id']) ? $_REQUEST['cart_id'] : '';
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$sqlDelete = "DELETE FROM `og_temp_cart` WHERE `cart_id` = '".$cart_id."'";
	$exeDelete = mysql_query($sqlDelete) or die(mysql_error());
	
	$data['Ack'] = 1;
	$data['msg'] = 'Product deleted successfully from your basket.';

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=update_item&cart_id=1&$user_id=1&unique_id=11111111111&quantity=1&isCartAdd=1
function _update_item() 
{
    $data = array();
	
    $cart_id = isset($_REQUEST['cart_id']) ? $_REQUEST['cart_id'] : '';
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	$quantity = isset($_REQUEST['quantity']) ? $_REQUEST['quantity'] : '';
	$isCartAdd = isset($_REQUEST['isCartAdd']) ? $_REQUEST['isCartAdd'] : '';
	
	$getCart = mysql_fetch_array(mysql_query("SELECT * FROM `og_temp_cart` WHERE `cart_id` = '".$cart_id."'"));
	if($isCartAdd == 1)
	{
		$new_quantity = $getCart['quantity']+$quantity;
		$new_subtotal = $new_quantity*$getCart['unit_price'];
		
		$sqlUpdate = "UPDATE `og_temp_cart` SET `quantity` = '".$new_quantity."',`subtotal` = '".$new_subtotal."' WHERE `cart_id` = '".$cart_id."'";
	    $exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
	    
	    $data['Ack'] = 1;
    	$data['msg'] = 'Item added to your basket.';
	}
	else
	{
		$new_quantity = $getCart['quantity']-$quantity;
		$new_subtotal = $new_quantity*$getCart['unit_price'];
		
		$sqlUpdate = "UPDATE `og_temp_cart` SET `quantity` = '".$new_quantity."',`subtotal` = '".$new_subtotal."' WHERE `cart_id` = '".$cart_id."'";
	    $exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
	    
	    $data['Ack'] = 1;
    	$data['msg'] = 'Item deleted from your basket.';
	}

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=zipcode_list
function _zipcode_list() 
{
    $data = array();
	
	$sqlZip = "SELECT * FROM `og_zipcode` WHERE `zipcode_status` = 'Active' ORDER BY `zipcode_id` ASC";
	$exeZip = mysql_query($sqlZip) or die(mysql_error());
	$numZip = mysql_num_rows($exeZip);
	if($numZip>0)
	{
		while($arrZip = mysql_fetch_array($exeZip))
		{
			$data['ZipData'][] = array("zipcode_id" => $arrZip['zipcode_id'],
			"available_zipcode" => $arrZip['available_zipcode']
			);
		}
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No pincode available.';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=zipcode_availability&zip=700085
function _zipcode_availability() 
{
    $data = array();
	
	$zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
	
	$numCheck = mysql_num_rows(mysql_query("SELECT * FROM `og_zipcode` WHERE `available_zipcode` = '".$zip."' AND `zipcode_status` = 'Active'"));
	if($numCheck>0)
	{
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'Sorry. We are not supplying our products in this Pincode.';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=checkout&fname=Saptarshi&lname=Ghosh&email=saptarshi.mailme@gmail.com&phone=8240138798&address=9, Chandi Bose Lane, Kolkata - 700085&city=Kolkata&state=West Bengal&zip=700085&user_id=1&unique_id=11111111111&pickup_date=2020-02-20&pickup_time=7am-9am
function _checkout() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	$fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
	$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
	$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
	$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : '';
	$zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
	$pickup_date = isset($_REQUEST['pickup_date']) ? $_REQUEST['pickup_date'] : '';
	$pickup_time = isset($_REQUEST['pickup_time']) ? $_REQUEST['pickup_time'] : '';
	
	$fetchTotal = mysql_fetch_array(mysql_query("SELECT SUM(`subtotal`) AS `TOTAL_PRICE` FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'"));
	$total_price = $fetchTotal['TOTAL_PRICE'];
	
	$fetchTotalQuantity = mysql_fetch_array(mysql_query("SELECT SUM(`quantity`) AS `TOTAL_QUANTITY` FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'"));
	$total_quantity = $fetchTotalQuantity['TOTAL_QUANTITY'];
	
	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
	$delivery_charge = $arrAdmin['delivery_charge'];
	$delivery_charge_limit = $arrAdmin['delivery_charge_limit'];

	$sql_check_order = "SELECT * FROM `og_orders` ORDER BY `order_id` DESC LIMIT 0,1";
	$exe_check_order = mysql_query($sql_check_order) or die(mysql_error());
	$num_check_order = mysql_num_rows($exe_check_order);
	if($num_check_order>0)
	{
		$arr_check_order = mysql_fetch_array($exe_check_order);
		$new_order_no =  $arr_check_order['order_no']+1;
		$new_orderid =  'MB'.$new_order_no;
	}
	else
	{
		$new_order_no =  509;
		$new_orderid =  'MB509';
	}
	
	$getUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'"));

	if($total_price<$delivery_charge_limit)
	{
		$grand_total = $total_price+$delivery_charge;
		$delivery_charge_display = $delivery_charge;
	}
	else
	{
		$grand_total = $total_price;
		$delivery_charge_display = '0.00';
	}

	$new_grand_total = $grand_total;
	
	$sqlInsert = "INSERT INTO `og_orders` SET `user_id` = '".$user_id."',`unique_id` = '".$unique_id."',`fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`phone` = '".$phone."',`address` = '".$address."',`city` = '".$city."',`state` = '".$state."',`zip` = '".$zip."',`total_quantity` = '".$total_quantity."',`total_price` = '".$total_price."',`delivery_charge` = '".$delivery_charge_display."',`grand_total` = '".$new_grand_total."',`order_no` = '".$new_order_no."',`orderid` = '".$new_orderid."',`post_date` = '".date('Y-m-d H:i:s',time())."',`pickup_date` = '".$pickup_date."',`pickup_time` = '".$pickup_time."'";
	$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
		
	$data['Ack'] = 1;
	$data['msg'] = 'Success';
	$data['order_id'] = $new_orderid;
	$data['amount'] = $new_grand_total;

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=order_thankyou&user_id=1&unique_id=11111111111&payment_type=Online&transaction_id=123456&payment_status=Success
function _order_thankyou() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	$order_time = isset($_REQUEST['order_time']) ? $_REQUEST['order_time'] : '';
    $current_date = date('Y-m-d',time());
    $payment_type = isset($_REQUEST['payment_type']) ? $_REQUEST['payment_type'] : '';
    $transaction_id = isset($_REQUEST['transaction_id']) ? $_REQUEST['transaction_id'] : '';
    $payment_status = isset($_REQUEST['payment_status']) ? $_REQUEST['payment_status'] : '';

	$sqlOrder2 = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'"));
	$full_name = $sqlOrder2['fname']." ".$sqlOrder2['lname'];
	
	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
	
	//Mail send to administrator
	$subject = 'A New Order Posted';	
	$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
				<tr>
					<td>A new order has been posted. Details are below : </td>
				</tr>				
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b>Customer Details</b></td>
				</tr>
				<tr>
					<td>First Name : '.$sqlOrder2['fname'].'</td>
				</tr>
				<tr>
					<td>Last Name : '.$sqlOrder2['lname'].'</td>
				</tr>
				<tr>
					<td>Email Address : '.$sqlOrder2['email'].'</td>
				</tr>
				<tr>
					<td>Phone No. : '.$sqlOrder2['phone'].'</td>
				</tr>
				<tr>
					<td>Address : '.$sqlOrder2['address'].'</td>
				</tr>
				<tr>
					<td>City : '.$sqlOrder2['city'].'</td>
				</tr>
				<tr>
					<td>State : '.$sqlOrder2['state'].'</td>
				</tr>
				<tr>
					<td>Pincode : '.$sqlOrder2['zip'].'</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b>Order Details</b></td>
				</tr>';
	$order_counter = 1;
	$sqlOrder = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' ORDER BY `cart_id` ASC";
	$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
	$numOrder = mysql_num_rows($exeOrder);
	if($numOrder>0)
	{
		while($arrOrder = mysql_fetch_array($exeOrder))
		{
			$getProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arrOrder['product_id']."'"));
			$get_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arrOrder['packet_id']."'"));
	$message .= '<tr>
					<td>Item '.$order_counter.' : '.stripslashes($getProduct['product_name_english']).' ('.$get_product_packet['packet_size'].') - Rs.'.$arrOrder['unit_price'].' X '.$arrOrder['quantity'].' = Rs.'.$arrOrder['subtotal'].'</td>
				</tr>';
		$order_counter++;
		}
	}
	$message .= '<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Total Amount : Rs.'.$sqlOrder2['total_price'].'</td>
				</tr>
				<tr>
					<td>Delivery Charge : Rs.'.$sqlOrder2['delivery_charge'].'</td>
				</tr>				
				<tr>
					<td><b>Grand Total : Rs.'.$sqlOrder2['grand_total'].'</b></td>
				</tr>
	            <tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b>Delivery Details</b></td>
				</tr>
				<tr>
					<td>Delivery Date : '.date('d-m-Y',strtotime($sqlOrder2['pickup_date'])).'</td>
				</tr>
				<tr>
					<td>Delivery Time : '.$sqlOrder2['pickup_time'].'</td>
				</tr>
				</table>';

	$headers = "From: ".$full_name."<info@morningbazar.co.in>" . "\r\n" .
	"Reply-To: info@morningbazar.co.in" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($arrAdmin['contact_email'],$subject,$message,$headers);
	
	//Mail send to user
	$subject2 = 'Order Confirmation';	
	$message2 = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
				<tr>
					<td>Hi '.$sqlOrder2['fname'].' '.$sqlOrder2['lname'].',</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Your order details are below:</td>
				</tr>';
	$order_counter = 1;
	$sqlOrder = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' ORDER BY `cart_id` ASC";
	$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
	$numOrder = mysql_num_rows($exeOrder);
	if($numOrder>0)
	{
		while($arrOrder = mysql_fetch_array($exeOrder))
		{
			$getProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arrOrder['product_id']."'"));
			$get_product_packet = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arrOrder['packet_id']."'"));
	$message2 .= '<tr>
					<td>Item '.$order_counter.' : '.stripslashes($getProduct['product_name_english']).' ('.$get_product_packet['packet_size'].') - Rs.'.$arrOrder['unit_price'].' X '.$arrOrder['quantity'].' = Rs.'.$arrOrder['subtotal'].'</td>
				</tr>';
		$order_counter++;
		}
	}
	$message2 .= '<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Total Amount : Rs.'.$sqlOrder2['total_price'].'</td>
				</tr>
				<tr>
					<td>Delivery Charge : Rs.'.$sqlOrder2['delivery_charge'].'</td>
				</tr>
				<tr>
					<td><b>Grand Total : Rs.'.$sqlOrder2['grand_total'].'</b></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b>Delivery Details</b></td>
				</tr>
				<tr>
					<td>Delivery Date : '.date('d-m-Y',strtotime($sqlOrder2['pickup_date'])).'</td>
				</tr>
				<tr>
					<td>Delivery Time : '.$sqlOrder2['pickup_time'].'</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Thanks & Regards,<br>'.$arrAdmin['company_name'].' Team</td>
				</tr>
				</table>';

	$headers2 = "From: ".$arrAdmin['company_name']."<info@morningbazar.co.in>" . "\r\n" .
	"Reply-To: info@morningbazar.co.in" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers2 .= 'MIME-Version: 1.0' . "\r\n";
	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($sqlOrder2['email'],$subject2,$message2,$headers2);
	
	$sqlCart = "SELECT * FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."' ORDER BY `cart_id` ASC";
	$exeCart = mysql_query($sqlCart) or die(mysql_error());
	$numCart = mysql_num_rows($exeCart);
	if($numCart>0)
	{
		while($arrCart = mysql_fetch_array($exeCart))
		{
			$sqlInsert = "INSERT INTO `og_final_cart` SET `user_id` = '".$user_id."',`order_id` = '".$sqlOrder2['orderid']."',`product_id` = '".$arrCart['product_id']."',`packet_id` = '".$arrCart['packet_id']."',`quantity` = '".$arrCart['quantity']."',`unit_price` = '".$arrCart['unit_price']."',`subtotal` = '".$arrCart['subtotal']."',`unique_id` = '".$unique_id."'";
			$exeInsert = mysql_query($sqlInsert) or die(mysql_error());
		}
	}

    if($payment_type == 'Online')
	{
    	if($payment_status == 'Success')
    	{
    	    $sqlEdit = "UPDATE `og_orders` SET `payment_type` = 'Online',`payment_status` = 'Paid',`transaction_id` = '".$transaction_id."',`transaction_completed` = 'Yes' WHERE `unique_id` = '".$unique_id."'";
    		$exeEdit = mysql_query($sqlEdit) or die(mysql_error());
			
			$sqlDelete = "DELETE FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'";
			$exeDelete = mysql_query($sqlDelete) or die(mysql_error());
    		
    		$data['Ack'] = 1;
	        $data['msg'] = 'Thanks for your payment. Our representative will contact you to confirm your address for deliver your product(s).';
    	}
    	else
    	{
    	    $sqlEdit = "UPDATE `og_orders` SET `payment_type` = 'Online',`payment_status` = 'Pending',`transaction_id` = '' WHERE `unique_id` = '".$unique_id."'";
    	    $exeEdit = mysql_query($sqlEdit) or die(mysql_error()); 
			
			$sqlDelete = "DELETE FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'";
			$exeDelete = mysql_query($sqlDelete) or die(mysql_error());
    	    
    	    $data['Ack'] = 0;
	        $data['msg'] = 'Sorry! Your transaction has been declined.';
    	}
	}
	else
	{
	    $sqlEdit = "UPDATE `og_orders` SET `payment_type` = 'COD',`transaction_completed` = 'Yes' WHERE `unique_id` = '".$unique_id."'";
    	$exeEdit = mysql_query($sqlEdit) or die(mysql_error());
		
		$sqlDelete = "DELETE FROM `og_temp_cart` WHERE `user_id` = '".$user_id."' AND `unique_id` = '".$unique_id."'";
		$exeDelete = mysql_query($sqlDelete) or die(mysql_error());
    	
    	$data['Ack'] = 1;
	    $data['msg'] = 'Thanks for your order. Our representative will contact you to confirm your address for deliver your product(s). Your payment system is Cash on Delivery(COD).';
	}

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=post_enquiry&user_id=1&name=Rajib Majumdar&email=rajibmaj2001@gmail.com&phone=8240138798&comment=Only for test
function _post_enquiry() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	$comment = isset($_REQUEST['comment']) ? $_REQUEST['comment'] : '';
				
	$sql_insert = "INSERT INTO `og_enquiry` SET `user_id` = '".$user_id."',`name` = '".$name."',`email` = '".$email."',`phone` = '".$phone."',`comment` = '".$comment."',`post_date` = '".date('Y-m-d H:i:s',time())."'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$data['Ack'] = 1;
	$data['msg'] = 'Your enquiry has been posted successfully.';

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=search_result&user_id=1&unique_id=11111111111&search_string=potato
function _search_result() 
{
    $data = array();
	$data_temp = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	$search_string = isset($_REQUEST['search_string']) ? $_REQUEST['search_string'] : '';
	
	$sqlFood = "SELECT * FROM `og_products` WHERE `product_name_english` LIKE '%".$search_string."%' AND `product_status` = 'Active' ORDER BY `product_id` ASC";
	$exeFood = mysql_query($sqlFood) or die(mysql_error());
	$numFood = mysql_num_rows($exeFood);
	if($numFood>0)
	{
		while($arrFood = mysql_fetch_array($exeFood))
		{
			$product_photo = SITE_URL."uploads/product/".$arrFood['product_photo'];
			if($arrFood['product_photo2']!="")
			{
				$product_photo2 = SITE_URL."uploads/product/".$arrFood['product_photo2'];
			}
			else
			{
				$product_photo2 = "";
			}
			if($arrFood['product_photo3']!="")
			{
				$product_photo3 = SITE_URL."uploads/product/".$arrFood['product_photo3'];
			}
			else
			{
				$product_photo3 = "";
			}
			if($arrFood['product_photo4']!="")
			{
				$product_photo4 = SITE_URL."uploads/product/".$arrFood['product_photo4'];
			}
			else
			{
				$product_photo4 = "";
			}
			
			$sqlPack = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arrFood['product_id']."' ORDER BY `packet_id` ASC";
			$exePack = mysql_query($sqlPack) or die(mysql_error());
			$numPack = mysql_num_rows($exePack);
			if($numPack>0)
			{
				while($arrPack = mysql_fetch_array($exePack))
				{
					$data_temp['PackData'][] = array("packet_id" => $arrPack['packet_id'],
					"product_id" => stripslashes($arrPack['product_id']),
					"packet_size" => stripslashes($arrPack['packet_size']),
					"discount" => $arrPack['discount'].'%',
					"original_price" => $arrPack['original_price'],
					"price" => $arrPack['price']
					);		
				}
			}
			else
			{
				$data_temp['PackData'] = array();
			}
			
			$data['ProductData'][] = array("product_id" => $arrFood['product_id'],
			"product_name_english" => $arrFood['product_name_english'],
			"stock_available" => $arrFood['stock_available'],
			"product_details" => stripslashes($arrFood['product_details']),
			"product_photo" => $product_photo,
			"product_photo2" => $product_photo2,
			"product_photo3" => $product_photo3,
			"product_photo4" => $product_photo4,
			"Packets" => $data_temp['PackData']
			);
			
			unset($data_temp['PackData']);
		}
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No product available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=banners
function _banners() 
{
    $data = array();

	$sqlBanner = "SELECT * FROM `og_banners` WHERE `banner_status` = 'Active' ORDER BY `banner_id` ASC";
	$exeBanner = mysql_query($sqlBanner) or die(mysql_error());
	$numBanner = mysql_num_rows($exeBanner);
	if($numBanner>0)
	{
		while($arrBanner = mysql_fetch_array($exeBanner))
		{
			$banner_photo = SITE_URL."uploads/banner/".$arrBanner['banner_image'];
			
			$data['BannerData'][] = array("banner_id" => $arrBanner['banner_id'],
			"banner_photo" => $banner_photo
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No banner available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=my_orders&user_id=1
function _my_orders() 
{
    $data = array();
	
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	
	$sqlOrder = "SELECT * FROM `og_orders` WHERE `user_id` = '".$user_id."' AND (`is_cancel` = 'No' OR `is_cancel` = 'Pending') AND `transaction_completed` = 'Yes' ORDER BY `order_id` DESC";
	$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
	$numOrder = mysql_num_rows($exeOrder);
	if($numOrder>0)
	{
		while($arrOrder = mysql_fetch_array($exeOrder))
		{
			if($arrOrder['is_cancel'] == 'Pending')
			{
			    $cancel_request_sent = 'Yes';
			}
			else
			{
			    $cancel_request_sent = 'No';
			}
			$suggestion_posted = mysql_num_rows(mysql_query("SELECT * FROM `og_suggestions` WHERE `user_id` = '".$arrOrder['user_id']."' AND `order_id` = '".$arrOrder['orderid']."'"));
			
			$data['OrderData'][] = array("order_id" => $arrOrder['orderid'],
			"user_id" => $arrOrder['user_id'],
			"total_items" => $arrOrder['total_quantity'],
			"total_price" => $arrOrder['grand_total'],
			"order_date" => $arrOrder['post_date'],
			"payment_status" => $arrOrder['payment_status'],
			"delivery_status" => $arrOrder['delivery_status'],
			"pickup_date" => date('d-m-Y',strtotime($arrOrder['pickup_date'])),
	        "pickup_time" => $arrOrder['pickup_time'],
			"suggestion_posted" => $suggestion_posted,
			"cancel_request_sent" => $cancel_request_sent
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No order posted yet';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=order_details&user_id=1&order_id=12qwaszx123
function _order_details() 
{
    $data = array();
	$data_temp = array();
	
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$order_id = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : '';
	
	$arrOrder = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `orderid` = '".$order_id."'"));	

	$sqlCart = "SELECT * FROM `og_final_cart` WHERE `user_id` = '".$user_id."' AND `order_id` = '".$order_id."' ORDER BY `cart_id` ASC";
	$exeCart = mysql_query($sqlCart) or die(mysql_error());
	while($arrCart = mysql_fetch_array($exeCart))
	{ 
		$arrProduct = mysql_fetch_array(mysql_query("SELECT * FROM `og_products` WHERE `product_id` = '".$arrCart['product_id']."'"));
		$product_name_english = stripslashes($arrProduct['product_name_english']);
		$product_photo = SITE_URL."uploads/product/".$arrProduct['product_photo'];	
		if($arrProduct['product_photo2']!="")
		{
			$product_photo2 = SITE_URL."uploads/product/".$arrProduct['product_photo2'];
		}
		else
		{
			$product_photo2 = "";
		}
		if($arrProduct['product_photo3']!="")
		{
			$product_photo3 = SITE_URL."uploads/product/".$arrProduct['product_photo3'];
		}
		else
		{
			$product_photo3 = "";
		}
		if($arrProduct['product_photo4']!="")
		{
			$product_photo4 = SITE_URL."uploads/product/".$arrProduct['product_photo4'];
		}
		else
		{
			$product_photo4 = "";
		}
			
		$arrPacket = mysql_fetch_array(mysql_query("SELECT * FROM `og_product_packets` WHERE `packet_id` = '".$arrCart['packet_id']."'"));
		
		$sqlPack = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arrFood['product_id']."' ORDER BY `packet_id` ASC";
		$exePack = mysql_query($sqlPack) or die(mysql_error());
		$numPack = mysql_num_rows($exePack);
		if($numPack>0)
		{
			while($arrPack = mysql_fetch_array($exePack))
			{
				$data_temp['PackData'][] = array("packet_id" => $arrPack['packet_id'],
				"product_id" => stripslashes($arrPack['product_id']),
				"packet_size" => stripslashes($arrPack['packet_size']),
				"price" => $arrPack['price'],
				"discount" => $arrPack['discount'].'%',
				"original_price" => $arrPack['original_price']
				);		
			}
		}
		else
		{
			$data_temp['PackData'] = array();
		}
			
		$data['ProductData'][] = array("product_id" => $arrProduct['product_id'],
		"product_name_english" => $arrProduct['product_name_english'],
		"stock_available" => $arrProduct['stock_available'],
		"product_details" => stripslashes($arrProduct['product_details']),
		"product_photo" => $product_photo,
		"product_photo2" => $product_photo2,
		"product_photo3" => $product_photo3,
		"product_photo4" => $product_photo4,
		"Packets" => $data_temp['PackData']
		);
		
		unset($data_temp['PackData']);		
		
		$data['CartData'][] = array("cart_id" => $arrCart['cart_id'],
		"product_id" => $arrCart['product_id'],
		"product_photo" => $product_photo,
		"product_name_english" => $product_name_english,
		"packet_size" => $arrPacket['packet_size'],
		"original_price" => $arrPacket['original_price'],
		"quantity" => $arrCart['quantity'],
		"discount" => $arrPacket['discount'].'%',
		"unit_price" => $arrCart['unit_price'],
		"subtotal" => $arrCart['subtotal']
		);
	}
	
	$arrOrder = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `orderid` = '".$order_id."'"));
		
	$data['PriceData'] = array("total_price" => $arrOrder['total_price'],
	"total_quantity" => $arrOrder['total_quantity'],
	"delivery_charge" => $arrOrder['delivery_charge'],
	"pickup_date" => date('d-m-Y',strtotime($arrOrder['pickup_date'])),
	"pickup_time" => $arrOrder['pickup_time'],
	"grand_total" => $arrOrder['grand_total']
	);
	
	$data['Ack'] = 1;
	$data['msg'] = 'Success';

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=cancel_order_request&user_id=1&order_id=123&request_comment=111
function _cancel_order_request() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $order_id = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : '';
    $request_comment = isset($_REQUEST['request_comment']) ? $_REQUEST['request_comment'] : '';
	
	$get_order_date = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `orderid` = '".$order_id."'"));
	$current_time = time();
	$order_time = strtotime($get_order_date['post_date']);
	if(($current_time-$order_time)/(60*60)<='0.30')
	{
    	$sql_update = "UPDATE `og_orders` SET `is_cancel` = 'Pending',`comment` = '".$request_comment."' WHERE `orderid` = '".$order_id."' AND `user_id` = '".$user_id."'";
    	$exe_update = mysql_query($sql_update) or die(mysql_error());
    	
    	$data['Ack'] = 1;
    	$data['msg'] = 'Your cancellation request has been sent to administrator.';
	}
	else
	{
	    $data['Ack'] = 0;
    	$data['msg'] = 'You can\'t cancel your order after 30 minutes from order time.';
	}

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=offers
function _offers() 
{
    $data = array();

	$sqlOffer = "SELECT * FROM `og_offers` WHERE `offer_status` = 'Active' ORDER BY `offer_id` ASC";
	$exeOffer = mysql_query($sqlOffer) or die(mysql_error());
	$numOffer = mysql_num_rows($exeOffer);
	if($numOffer>0)
	{
		while($arrOffer = mysql_fetch_array($exeOffer))
		{
			$offer_photo = SITE_URL."uploads/offer/".$arrOffer['offer_image'];
			
			$data['OfferData'][] = array("offer_id" => $arrOffer['offer_id'],
			"offer_photo" => $offer_photo,
			"offer_text" => stripslashes($arrOffer['offer_text'])
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No offer available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=post_suggestion&user_id=1&comment=Only for test&order_id=BM510
function _post_suggestion() 
{
    $data = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $order_id = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : '';
	$comment = isset($_REQUEST['comment']) ? $_REQUEST['comment'] : '';
				
	$sql_insert = "INSERT INTO `og_suggestions` SET `user_id` = '".$user_id."',`order_id` = '".$order_id."',`comment` = '".$comment."',`post_date` = '".date('Y-m-d H:i:s',time())."'";
	$exe_insert = mysql_query($sql_insert) or die(mysql_error());
	
	$data['Ack'] = 1;
	$data['msg'] = 'Your comment has been posted successfully.';

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=view_suggestion&user_id=1&order_id=BM510
function _view_suggestion() 
{
    $data = array();
    
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $order_id = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : '';

	$arrContent = mysql_fetch_array(mysql_query("SELECT * FROM `og_suggestions` WHERE `user_id` = '".$user_id."' AND `order_id` = '".$order_id."'"));
	
	$data['SuggestionData'] = array(
	"content" => stripslashes($arrContent['comment']),
	"Ack" => 1,
	"msg" => 'Success'
	);
	
    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=my_referral&user_id=1
function _my_referral() 
{
    $data = array();
	
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	
	$getUser = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'"));
	
	$data['ref_code'] = $getUser['ref_code'];
	
	$sqlOrder = "SELECT * FROM `og_users` WHERE `ref_id` = '".$user_id."'";
	$exeOrder = mysql_query($sqlOrder) or die(mysql_error());
	$numOrder = mysql_num_rows($exeOrder);
	if($numOrder>0)
	{
		while($arrOrder = mysql_fetch_array($exeOrder))
		{
			if($arrOrder['profile_photo']!="")
			{
				$profile_photo = SITE_URL."uploads/user/".$arrOrder['profile_photo'];
			}
			else
			{
				$profile_photo = '';
			}
			$num_earning = mysql_num_rows(mysql_query("SELECT * FROM `og_orders` WHERE `user_id` = '".$arrOrder['user_id']."' AND `payment_status` = 'Paid'"));
			if($num_earning>0) 
			{ 
				$arr_earning = mysql_fetch_array(mysql_query("SELECT * FROM `og_orders` WHERE `user_id` = '".$user_id."' AND `payment_status` = 'Paid'"));
				$fetch_settings = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
                $ref_cost = $fetch_settings['referal_cost'];
			} 
			else 
			{ 
				$ref_cost = '0.00';
			}
			
			$data['RefData'][] = array(
			"ref_member" => $arrOrder['fname'].' '.$arrOrder['lname'],
			"ref_member_photo" => $profile_photo,
			"ref_amount" => $ref_cost
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No referral member found.';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=pickup_time&pickup_date=2020-05-18
function _pickup_time() 
{
    $data = array();
	
	$current_time = date('H:i:s',time());
	$pickup_date = isset($_REQUEST['pickup_date']) ? $_REQUEST['pickup_date'] : '';
	
	if($pickup_date > date('Y-m-d',time()))
	{
	    $data['PickupTimeData'] = array("7am-11am",
		"6pm-9pm"
		);		
	    $data['Ack'] = 1;
        $data['msg'] = '';
	}
	else if($pickup_date == date('Y-m-d',time()))
	{
	    if($current_time>='06:00:00' && $current_time<='09:59:00')
    	{
    		$data['PickupTimeData'] = array("7am-11am",
    		"6pm-9pm"
    		);
			$data['Ack'] = 1;
			$data['msg'] = '';
    	}	    
    	if($current_time>='10:01:00' && $current_time<='18:59:00')
    	{
    		$data['PickupTimeData'] = array("6pm-9pm"
    		);
			$data['Ack'] = 1;
			$data['msg'] = '';
    	}
    	if($current_time>='19:01:00' && $current_time<='23:59:00')
    	{
    		$data['PickupTimeData'] = array(
    		);
			$data['Ack'] = 0;
	        $data['msg'] = 'No delivery slot available for today.';
    	}    	     	
	}
	else
	{
		$data['PickupTimeData'] = array(
		);
		$data['Ack'] = 0;
		$data['msg'] = 'No delivery slot available for today.';
	}

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=sliding_product_list&user_id=1&unique_id=11111111111
function _sliding_product_list() 
{
    $data = array();
	$data_temp = array();
	
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$sqlFood = "SELECT * FROM `og_products` WHERE (`category_id` = 1 OR `category_id` = 2) AND `product_status` = 'Active' AND `stock_available` = 'Yes' ORDER BY `product_id` ASC";
	$exeFood = mysql_query($sqlFood) or die(mysql_error());
	$numFood = mysql_num_rows($exeFood);
	if($numFood>0)
	{
		while($arrFood = mysql_fetch_array($exeFood))
		{
			$product_photo = SITE_URL."uploads/product/".$arrFood['product_photo'];
			if($arrFood['product_photo2']!="")
			{
				$product_photo2 = SITE_URL."uploads/product/".$arrFood['product_photo2'];
			}
			else
			{
				$product_photo2 = "";
			}
			if($arrFood['product_photo3']!="")
			{
				$product_photo3 = SITE_URL."uploads/product/".$arrFood['product_photo3'];
			}
			else
			{
				$product_photo3 = "";
			}
			if($arrFood['product_photo4']!="")
			{
				$product_photo4 = SITE_URL."uploads/product/".$arrFood['product_photo4'];
			}
			else
			{
				$product_photo4 = "";
			}			
			
			$sqlPack = "SELECT * FROM `og_product_packets` WHERE `product_id` = '".$arrFood['product_id']."' ORDER BY `packet_id` ASC";
			$exePack = mysql_query($sqlPack) or die(mysql_error());
			$numPack = mysql_num_rows($exePack);
			if($numPack>0)
			{
				while($arrPack = mysql_fetch_array($exePack))
				{
					$data_temp['PackData'][] = array("packet_id" => $arrPack['packet_id'],
					"product_id" => stripslashes($arrPack['product_id']),
					"packet_size" => stripslashes($arrPack['packet_size']),
					"price" => $arrPack['price'],
					"discount" => $arrPack['discount'].'%',
					"original_price" => $arrPack['original_price']
					);		
				}
			}
			else
			{
				$data_temp['PackData'] = array();
			}
			
			$data['ProductData'][] = array("product_id" => $arrFood['product_id'],
			"product_name_english" => $arrFood['product_name_english'],
			"stock_available" => $arrFood['stock_available'],
			"product_details" => stripslashes($arrFood['product_details']),
			"product_photo" => $product_photo,
			"product_photo2" => $product_photo2,
			"product_photo3" => $product_photo3,
			"product_photo4" => $product_photo4,
			"Packets" => $data_temp['PackData']
			);
			
			unset($data_temp['PackData']);
		}
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No product available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=registration_resend_otp&unique_id=123456&user_id=1
function _registration_resend_otp() 
{
    $data = array();
    
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$otp = rand(1000,9999);
	function random_strings($length_of_string) 
	{ 
		// String of all alphanumeric character 
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 

		// Shufle the $str_result and returns substring 
		// of specified length 
		return substr(str_shuffle($str_result), 0, $length_of_string); 
	}
	
	$arrVal = mysql_fetch_array(mysql_query("SELECT * FROM `og_users` WHERE `user_id` = '".$user_id."'"));	
	
	$number = '91'.$arrVal['phone'];
	$msgtext = "Your OTP : ".$otp;
	
	$api_params = 'Apikey=Kwp6eCioc0qv3HnwUhbkRQ&senderid=FRESHX&channel=Trans&DCS=0&flashsms=0&number='.$number.'&text='.urlencode($msgtext).'&route=27';  
	$smsGatewayUrl = "http://182.18.162.128/api/mt/SendSMS?";  
	$smsgatewaydata = $smsGatewayUrl.$api_params;
	$url = $smsgatewaydata;

	$ch = curl_init();                       // initialize CURL
	curl_setopt($ch, CURLOPT_POST, true);    // Set CURL Post Data
	curl_setopt($ch, CURLOPT_URL, urlencode($url));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);                         // Close CURL

	// Use file get contents when CURL is not installed on server.
	if(!$output){
	  $output =  file_get_contents($smsgatewaydata);  
	}

	$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
		
	$name = $arrVal['fname']." ".$arrVal['lname'];
	$subject = 'OTP For Account Activation';	
	$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
			<tr>
				<td>Hi '.$name.',</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Please use the OTP below to activate your account.</td>
			</tr>
			<tr>
				<td>OTP : '.$otp.'</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Thanks & Regards,<br>'.$arrAdmin['company_name'].' Team</td>
			</tr>
			</table>';

	$headers = "From: ".$arrAdmin['company_name']."<info@rajtutorialgroup.com>" . "\r\n" .
	"Reply-To: info@rajtutorialgroup.com" . "\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($arrVal['email'],$subject,$message,$headers);
				
	$sqlUpdate = "UPDATE `og_users` SET `otp` = '".$otp."' WHERE `user_id` = '".$user_id."'";
	$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
	
	$data['Ack'] = 1;
	$data['user_id'] = $user_id;
	$data['msg'] = 'We have sent OTP to your mobile no.';			     	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=resend_otp&unique_id=123456&phone=364334634
function _resend_otp() 
{
    $data = array();
    
	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
	
	$otp = rand(1000,9999);
	function random_strings($length_of_string) 
	{ 
		// String of all alphanumeric character 
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 

		// Shufle the $str_result and returns substring 
		// of specified length 
		return substr(str_shuffle($str_result), 0, $length_of_string); 
	}
	
	$sqlVal = "SELECT * FROM `og_users` WHERE `phone` = '".$phone."'";	
	$exeVal = mysql_query($sqlVal) or die(mysql_error());
	$numVal = mysql_num_rows($exeVal);
	if($numVal == 0)
	{
		$data['Ack'] = 0;
		$data['user_id'] = 0;
		$data['msg'] = 'Invalid phone number. Please try again!';
	}
	else
	{
		$arrVal = mysql_fetch_array($exeVal);	
		if($arrVal['is_active'] == 'Yes')
		{
			$data['Ack'] = 2;
			$data['user_id'] = $arrVal['user_id'];
			$data['msg'] = 'You have already activated your account by OTP.';
		}
		else
		{
			$number = '91'.$phone;
    		$msgtext = "Your OTP : ".$otp;
    		
    		$api_params = 'Apikey=Kwp6eCioc0qv3HnwUhbkRQ&senderid=FRESHX&channel=Trans&DCS=0&flashsms=0&number='.$number.'&text='.urlencode($msgtext).'&route=27';  
    		$smsGatewayUrl = "http://182.18.162.128/api/mt/SendSMS?";  
    		$smsgatewaydata = $smsGatewayUrl.$api_params;
    		$url = $smsgatewaydata;
    
    		$ch = curl_init();                       // initialize CURL
    		curl_setopt($ch, CURLOPT_POST, true);    // Set CURL Post Data
    		curl_setopt($ch, CURLOPT_URL, urlencode($url));
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		$output = curl_exec($ch);
    		curl_close($ch);                         // Close CURL
    
    		// Use file get contents when CURL is not installed on server.
    		if(!$output){
    		  $output =  file_get_contents($smsgatewaydata);  
    		}

			$arrAdmin = mysql_fetch_array(mysql_query("SELECT * FROM `og_administrator` WHERE `admin_id` = '1'"));
		
			$name = $arrVal['fname']." ".$arrVal['lname'];
			$subject = 'OTP For Account Activation';	
			$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2">
					<tr>
						<td>Hi '.$name.',</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Please use the OTP below to activate your account.</td>
					</tr>
					<tr>
						<td>OTP : '.$otp.'</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Thanks & Regards,<br>'.$arrAdmin['company_name'].' Team</td>
					</tr>
					</table>';
	
			$headers = "From: ".$arrAdmin['company_name']."<info@rajtutorialgroup.com>" . "\r\n" .
			"Reply-To: info@rajtutorialgroup.com" . "\r\n" .
			"X-Mailer: PHP/" . phpversion();
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($arrVal['email'],$subject,$message,$headers);
					
			$sqlUpdate = "UPDATE `og_users` SET `otp` = '".$otp."' WHERE `user_id` = '".$arrVal['user_id']."'";
			$exeUpdate = mysql_query($sqlUpdate) or die(mysql_error());
		
			$data['Ack'] = 1;
			$data['user_id'] = $arrVal['user_id'];
			$data['msg'] = 'We have sent OTP to your mobile no.';
		}
	}		

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=whychoose
function _whychoose() 
{
    $data = array();

	$sqlChoose = "SELECT * FROM `og_why_choose` WHERE `choose_status` = 'Active' ORDER BY `choose_id` ASC";
	$exeChoose = mysql_query($sqlChoose) or die(mysql_error());
	$numChoose = mysql_num_rows($exeChoose);
	if($numChoose>0)
	{
		while($arrChoose = mysql_fetch_array($exeChoose))
		{
			$choose_photo = SITE_URL."uploads/choose/".$arrChoose['choose_photo'];
			
			$data['ChooseData'][] = array("choose_id" => $arrChoose['choose_id'],
			"choose_photo" => $choose_photo,
			"choose_title" => stripslashes($arrChoose['choose_title']),
			"choose_text" => stripslashes($arrChoose['choose_text'])
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No data available';
    }       	

    echo json_encode($data);
    return json_encode($data);
}

//http://php.webprojectdemos.com/ecom/webservice/service.php?action=home_delivery_slot
function _home_delivery_slot() 
{
    $data = array();

	$sqlSlot = "SELECT * FROM `og_delivery_slot` WHERE `slot_status` = 'Active' ORDER BY `slot_id` ASC";
	$exeSlot = mysql_query($sqlSlot) or die(mysql_error());
	$numSlot = mysql_num_rows($exeSlot);
	if($numSlot>0)
	{
		while($arrSlot = mysql_fetch_array($exeSlot))
		{
			$data['SlotData'][] = array("slot_id" => $arrSlot['slot_id'],
			"slot_name" => $arrSlot['slot_name'],
			"slot_time" => $arrSlot['slot_time']
			);
		}
		
		$data['Ack'] = 1;
		$data['msg'] = 'Success';
    }
    else 
    {
		$data['Ack'] = 0;
		$data['msg'] = 'No slot available';
    }

    echo json_encode($data);
    return json_encode($data);
}
?>