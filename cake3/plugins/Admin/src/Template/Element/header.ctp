<div id="header">
	<div id="head_lt">
    	<!--Logo Start from Here-->
		<span class="floatleft">
			<?php
				echo $this->Html->link(
					$this->Html->image(
						'/admin/images/logo.gif', array(
							'style' => "width:50px; margin-right:10px;"
						)
					), array(
						'controller' => 'admins', 'action' => 'index',
						'plugin' => 'admin'
					), array(
						'escape' => false
					)
				);
			?>
		</span><span class="slogan">administration suite</span>
    	<!--Logo end  Here-->
    </div>
	<?php
		if($this->request->session()->check('Auth.User.id'))
		{ 
	?>
		<div id="head_rt">Welcome <span> <?php echo $this->request->session()->read('Auth.User.username')?></span>&nbsp;&nbsp;|&nbsp;&nbsp; <?php echo date('d M, Y h:i A'); ?></div>
	<?php
		}
	?>
</div>
<?php
	if($this->request->session()->check('Auth.User.id'))
	{
?>
		<div class="menubg">
			<div class="nav">
				<ul id="navigation">
					<li onmouseout="this.className=''" onmouseover="this.className='hov'">
						<?php
							echo $this->Html->link(
								'Home', array(
									'controller' => 'admins', 'action' => 'index'
								), array(
									'class' => ''
								)
							);
						?>
					</li>
					<li onmouseout="this.className=''" onmouseover="this.className='hov'"><?php echo $this->Html->link('Manage admins', array('controller' => 'admins', 'action' => 'index')); ?>
						<div class="sub">
							<ul>
								<li>
									<?php echo $this->Html->link('List Admins', array('controller' => 'admins', 'action' => 'index')); ?>
								</li>
								<li>
									<?php echo $this->Html->link('Add Admin', array('controller' => 'admins', 'action' => 'add')); ?>
								</li>
							</ul>
						</div>
					</li>
					<li onmouseout="this.className=''" onmouseover="this.className='hov'">
						<?php echo $this->Html->link('Admin', array('controller' => 'admins', 'action' => 'change_pwd')); ?>
						<div class="sub">
							<ul>						
								<li>
									<?php echo $this->Html->link('Change Password', array('controller' => 'admins', 'action' => 'change_pwd')); ?>
								</li>					
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<div class="logout">
				<?php
					echo $this->Html->image("/admin/images/logout.gif", array(
							"alt" => "Logout",
							'url' => array('controller' => 'admins', 'action' => 'logout', 'plugin' => 'admin')
						)); 
				?>
			</div>
		</div>
<?php } ?>