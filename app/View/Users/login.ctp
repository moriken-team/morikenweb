<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('User.username',array(
    'type' => 'text',
    'label' => 'ID：',
    )); ?>
<?php echo "<br />"; ?>
<?php echo $this->Form->input('User.password',array(
    'label' => 'PASSWORD：',
    )); ?>
<?php echo "<br />"; ?>
<?php echo $this->Form->button('LOGIN', array(
    'type' => 'submit',
    'class' => 'btn btn-primary btn-large',
    'escape' => false
));
?>

<?php echo $this->Form->end(); ?>