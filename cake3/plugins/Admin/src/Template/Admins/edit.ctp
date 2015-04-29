<?php
	echo $this->Html->script(array('Admin.jquery.validate'), array('inline' => false));
	echo $this->Html->script('Admin.jquery-ui.js');		
?>
<div class="users row">
    <div class="floatleft mtop10">
    	<h1>
    		<?php echo __('Add Admin'); ?>
		</h1>
	</div>
    <div class="floatright">
        <?php
			echo $this->Html->link(
				'<span>'.__('Back To Manage Admins').'</span>', array(
					'controller' => 'admins', 'action' => 'index'
				),array(
					'class'=>'black_btn', 'escape'=>false
				)
			);
		?>
	</div>
</div>
<div align="center" class="whitebox mtop15">
    <?= $this->Form->create($admin,['class' => 'validate']) ?>
    <table cellspacing="0" cellpadding="7" border="0" align="center">
		<?php
			echo $this->Form->input('id',array('type' => 'hidden'));
		?>
		<tr>
			<td align="left"><strong class="upper">Username</strong></td>
			<td align="left">
				<?php
					echo $this->Form->input(
						'username', array(
							'class' => 'input required',
							'label' => false, 'div' => false,
							'style'=>'width: 450px;'
						)
					);
				?>
			</td>
		</tr>
		<tr>
			<td align="left"><strong class="upper">Email</strong></td>
			<td align="left">
				<?php
					echo $this->Form->input(
						'email',array(
							'class' => 'input required email',
							'label' => false, 'div' => false, 'style'=>'width: 450px;'
						)
					);
				?>
			</td>
		</tr>		
		<tr>
			<td align="left"><strong class="upper">First Name</strong></td>
			<td align="left">
			<?php
				echo $this->Form->input(
					'first_name', array(
						'class' => 'input required', 'label' => false, 'error' => false, 'div' => false, 'style'=>'width: 450px;'
					)
				);
			?>
			</td>
		</tr>
		<tr>
			<td align="left"><strong class="upper">Last Name</strong></td>
			<td align="left">
			<?php
				echo $this->Form->input(
					'last_name',array(
						'class' => 'input required', 'label' => false, 'error' => false, 'div' => false, 'style'=>'width: 450px;'
					)
				);
			?>
			</td>
		</tr>
		<tr>
			<td align="left"><strong class="upper">Mobile</strong></td>
			<td align="left">
			<?php
				echo $this->Form->input(
					'mobile', array(
						'class' => 'input required', 'label' => false, 'error' => false, 'div' => false, 'style'=>'width: 450px;'
					)
				);
			?>
			</td>
		</tr>
		<tr>
			<td align="left"><strong class="upper">DOB</strong></td>
			<td align="left">
				<?php
					echo $this->Form->input(
						'dob',array(
							'class' => 'input required', 'id' => 'datepicker',
							'label' => false, 'error' => false, 'div' => false,
							'style'=>'width: 450px;', 'type' => 'text'
						)
					);
				?>
			</td>
		</tr>
		
		<tr>
			<td align="left"><strong class="upper">Status</strong></td>
			<td align="left">
			<?php
				echo $this->Form->input(
					'status', array(
						'class' => 'input required', 'label' => false, 'error' => false,
						'div' => false, 'style'=>'width: 450px;',
						'options' => array('active' => 'Active', 'inactive' => 'Inactive')
					)
				);
			?>
			</td>
		</tr>		
		<tr>
			<td align="left"></td>
			<td align="left">
				<div class="black_btn2">
					<span class="upper">
						<?php echo $this->Form->button(__('Submit'));?>
					</span>
				</div>
			</td>
		</tr>
    </table>
    <?= $this->Form->end() ?>
</div>
<script>
	$(document).ready(function (){
		$( "#datepicker" ).datepicker();
		$('.validate').validate();		
	});
</script>