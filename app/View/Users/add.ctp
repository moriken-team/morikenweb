<?php echo $this->Form->create('User'); ?>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
	?>
<?php echo $this->Form->end(__('Submit')); ?>
