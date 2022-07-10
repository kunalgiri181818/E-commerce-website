<?php 
require_once("header.php");
require_once("session_check.php");

//CODE FOR DELETE USER
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	mysql_query("DELETE FROM `og_enquiry` WHERE `enquiry_id` = '".$_GET['enquiry_id']."'") or die(mysql_error());
	
	$_SESSION['del_succ_msg'] = 'Enquiry deleted successfully.';
	header("location: enquiry_list.php");
	exit;
}
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
		
		<?php if(isset($_SESSION['change_succ_msg'])) { ?>
			<div class="alert alert-success">                
			<b><?php echo $_SESSION['change_succ_msg'];?></b>
			</div> 
		<?php
		unset($_SESSION['change_succ_msg']);
		}
		?>
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head clearfix">
					<div class="isw-grid"></div>
					<h1>Enquiry List</h1>                               
				</div>
				<div class="block-fluid table-sorting clearfix">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
								<th width="10%">Serial No.</th>
								<th width="25%">Name</th>
								<th width="15%">Phone</th>
								<th width="35%">Enquiry</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$enquiry_counter = 1;
						$sql_record = "SELECT * FROM `og_enquiry` ORDER BY `enquiry_id` DESC";
						$exe_record = mysql_query($sql_record) or die();
						$num_record = mysql_num_rows($exe_record);
						if($num_record>0)
						{
							while($fetch_record = mysql_fetch_array($exe_record))
							{
								$name = stripslashes($fetch_record['name']);
								$email = stripslashes($fetch_record['email']);
								$phone = stripslashes($fetch_record['phone']);
								$comment = nl2br(stripslashes($fetch_record['comment']));
							?>
							<tr>
								<td><?php echo $enquiry_counter;?></td>
								<td><?php echo $name;?><br /><strong>Email : </strong><?php echo $email;?></td>
								<td><?php echo $phone;?></td>
								<td><?php echo $comment;?></td>
								<td><a href="enquiry_list.php?enquiry_id=<?php echo $fetch_record['enquiry_id']?>&action=delete" title="Delete" onclick="return confirm('Are you sure you want to delete this enquiry?');" style="float:left; display:block; margin:0 5px 0 0;"><ul class="the-icons clearfix"><i class="isb-delete"></i></ul></a></td>
							</tr>
							<?php
							$enquiry_counter++;
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
						<tr><td colspan="5" align="center"><font color="#FF0000">No enquiry found</font></td></tr>
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