<?php 
    echo $this->Form->create('User'); 
    echo $this->Form->input('username');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    $this->Form->end(__('Submit'));
?>