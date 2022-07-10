<?php 
require_once("header.php");
require_once("session_check.php");
?>

<?php require_once("left_panel.php");?>
<div class="content">
	<div class="workplace">
		<?php if(isset($_SESSION['del_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['del_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['del_succ_msg']);
		}
		?>
		
		<?php if(isset($_SESSION['sent_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['sent_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['sent_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Birthday Users List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="30%">Name</th>
								<th width="30%">Address</th>
								<th width="15%">Phone</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$user_counter = 1;
						$sql_record = "SELECT * FROM `og_users` WHERE `date_of_birth` <> '0000-00-00' ORDER BY `user_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$name = stripslashes($fetch_record['fname'])." ".stripslashes($fetch_record['lname']);
								$email = stripslashes($fetch_record['email']);
								$phone = stripslashes($fetch_record['phone']);
								$address = stripslashes($fetch_record['address']);
								
								$explode = explode("-",$fetch_record['date_of_birth']);	
								$birthday_month = $explode[1];
								$current_month = date('m',time());
								$birthday_day = $explode[2];
								$current_day = date('d',time());
								
								if(($birthday_month == $current_month) && ($birthday_day == $current_day))
								{
							?>
							<tr>
								<td><?php echo $user_counter;?></td>
								<td><?php echo $name;?><br /><strong>Email - </strong><?php echo $email;?></td>
								<td><?php echo $address;?></td>
								<td><?php echo $phone;?></td>
								<td><button class="btn" type="button" name="edit" onclick="window.location.href='send_email.php?user_id=<?php echo $fetch_record['user_id']?>'">Send Email</button></td>
							</tr>
							<?php
							$user_counter++;
								}
							}
						}
						else
						{
						?>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr><td colspan="5" align="center"><font color="#FF0000">No user found</font></td></tr>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>                                
		</div>
	</div>
</div>

<?php require_once("footer.php"); ?>