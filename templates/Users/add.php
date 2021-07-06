<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="login">
    <div class="row" style="height: 100%; ">
        <div class="col-md-5 text-center d-flex justify-content-center align-items-center" style="height: 100%;">
            <div style="width: 100%; ">
                <?= $this->Html->image('logo.png',[
                    'width' => '200px'
                ]); ?>
                <?= $this->Form->create($user) ?>
                <?= $this->Form->control('email', [
                    'required' => true
                ]); ?>
                <?= $this->Form->control('password', [
                    'required' => true,
                ]); ?>
                <?= $this->Form->control('role',[
                    'options' => [
                        1 => 'admin',
                        2 => 'client'
                    ],
                    'label' => false,
                    'empty' => __('Set a role')
                ]); ?>
                <?= $this->Form->button(__('Save'), [
                    'class' => 'btn btn-primary'
                ]); ?>
                <?= $this->Html->link(__('I already have a login'),'/users/login',[
                    'class' => 'btn btn-link'
                ]); ?>
                <?= $this->Form->end() ?>

                <?= $this->Html->css('login'); ?>
            </div>
        </div>
        <div class="col-md-7 text-center d-none d-md-flex justify-content-center align-items-center">
            <?= $this->Html->image('undraw_Push_notifications_re_t84m.svg', [
                'width' => '80%'
            ]); ?>
        </div>
    </div>
</div>
