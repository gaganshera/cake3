<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
	<head>
	    <?= $this->Html->charset() ?>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>
	        <?= $cakeDescription ?>:
	        <?= $this->fetch('title') ?>
	    </title>
	    <?= $this->Html->meta('icon') ?>
	
	    <?= $this->Html->css('Admin.style') ?>
	    <?= $this->Html->css('Admin.jquery-ui') ?>
	    <?php
	    	echo $this->Html->script('/admin/js/jquery');
			echo $this->Html->script('/admin/js/jquery.validate');
			echo $this->Html->script('/admin/js/common_functions');
			echo $this->Html->script('/admin/js/ckeditor/ckeditor');
	    ?>
	    <?= $this->fetch('meta') ?>
	    <?= $this->fetch('css') ?>
	    <?= $this->fetch('script') ?>
	</head>
	<body class="greybg">
		<!--Wrapper Start from Here-->
		<div id="wrapper">
			<!--Header Start from Here-->
			<?php echo $this->element('header'); ?>
			<div id="container">
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
			</div>
			<?php echo $this->element('footer'); ?>
		  <!--Container end Here-->
		</div>
		<!--Wrapper End from Here-->
		</div>
	</body>
</html>
