<?php 
	$this->loadHelper('Form', [
	    'templates' => 'Admin.common_form',
	]);
?>
<div class="row">
	<div class="floatleft mtop10"><h1>Change Password</h1></div>
</div>
<div align="center" class="greybox mtop15">
	<?php echo $this->Form->create('Admin', ['id' => 'ChangePwdForm'])?>
		<table cellspacing="0" cellpadding="7" border="0" align="center">
			<tr>
				<td valign="middle"><strong class="upper">Old Password:</strong></td>
				<td><?php echo $this->Form->input('old_password', array('class' => 'input required', 'style' => "width: 450px;", 'label' => false, 'div' => false, 'error' => false, 'value' => '', 'type' => 'password')); ?></td>
			</tr>
			<tr>
				<td valign="middle"><strong class="upper">New Password:</strong></td>
				<td><?php echo $this->Form->input('password', array('class' => 'input required', 'style' => "width: 450px;", 'label' => false, 'div' => false, 'error' => false, 'value' => '', 'type' => 'password')); ?></td>
			</tr>
			<tr>
				<td valign="middle"><strong class="upper">Confirm New Password:</strong></td>
				<td><?php echo $this->Form->input('compare_password', array('class' => 'input required', 'style' => "width: 450px;", 'label' => false, 'div' => false, 'error' => false, 'value' => '', 'type' => 'password')); ?></td>
			</tr>
			<tr>
            	<td>&nbsp;</td>
				<td>
					<div class="floatleft">
						<input type="submit" class="submit_btn" value="">
					</div>
					<div class="floatleft" id="domain_loader" style="padding-left:5px;"></div>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php 
?>
<script>
	$(document).ready(function(){
		$("#ChangePwdForm").validate({
			rules:{
				'old_password': {
					required: true,
				},
				'password': {
					required: true,
					minlength: 6
				},
				'compare_password': {
					required: true,
					minlength: 6,
					equalTo: "#password"
				}
			},
			messages:{
				'old_password': {
					required: "This field is required.",
				},
				'password': {
					required: "This field is required.",
					minlength: "Your password must be at least 4 characters long"
					},
				'compare_password': {
					required: "Please confirm password",
					minlength: "Your password must be at least 4 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
		});
	});
</script>