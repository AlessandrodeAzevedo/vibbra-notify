<?= $this->Form->create(null); ?>
<?= $this->Form->control('email', [
    'required' => true
]); ?>
<?= $this->Form->control('password', [
    'required' => true,
]); ?>
<?= $this->Html->link(__('Add User'),'/users/add',[
    'style' => 'margin-right:10px'
]); ?>
<?= $this->Form->button('login'); ?>
<?= $this->Form->end() ?>