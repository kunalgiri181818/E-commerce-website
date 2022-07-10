<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="media-body" style="border:1px solid #0D9845; padding:5px;">
		<p style="background-color:#0D9845; color:#fff; padding:5px; text-align:center;"><?php echo $_SESSION['USER_FNAME'];?>&nbsp;<?php echo $_SESSION['USER_LNAME'];?></p>
		<table width="100%" border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td width="10%" style="background:#94b874; margin:5px; padding:5px; text-align:center;"><i class="fa fa-user"></i></td>
				<td width="90%" style="margin:5px; padding:5px; border-bottom:1px solid #94b874; border-top:1px solid #94b874; <?php if($current_page == 'my-account.php') { ?>background:#B3E189;<?php } ?>"><a href="my-account.php" style="color:#111111;">My Account</a></td>
			</tr>
			<tr>
    			<td style="background:#94b874; margin:5px; padding:5px; text-align:center;"><i class="fa fa-edit"></i></td>
    			<td style="margin:5px; padding:5px; border-bottom:1px solid #94b874; <?php if($current_page == 'edit-profile.php') { ?>background:#B3E189;<?php } ?>"><a href="edit-profile.php" style="color:#111111;">Edit Profile</a></td>
			</tr>
			<tr>
    			<td style="background:#94b874; margin:5px; padding:5px; text-align:center;"><i class="fa fa-lock"></i></td>
    			<td style="margin:5px; padding:5px; border-bottom:1px solid #94b874; <?php if($current_page == 'change-password.php') { ?>background:#B3E189;<?php } ?>"><a href="change-password.php" style="color:#111111;">Change Password</a></td>
			</tr>
			<tr>
    			<td style="background:#94b874; margin:5px; padding:5px; text-align:center;"><i class="fa fa-shopping-cart"></i></td>
    			<td style="margin:5px; padding:5px; border-bottom:1px solid #94b874; <?php if($current_page == 'my-orders.php' || $current_page == 'order-details.php' || $current_page == 'post-suggestion.php' || $current_page == 'view-suggestion.php') { ?>background:#B3E189;<?php } ?>"><a href="my-orders.php" style="color:#111111;">My Orders</a></td>
			</tr>
			<tr>
    			<td style="background:#94b874; margin:5px; padding:5px; text-align:center;"><i class="fa fa-power-off"></i></td>
    			<td style="margin:5px; padding:5px; border-bottom:1px solid #94b874;"><a href="logout.php" style="color:#111111;">Logout</a></td>
			</tr>
		</table>
	    </div>
    </div>
</div>
