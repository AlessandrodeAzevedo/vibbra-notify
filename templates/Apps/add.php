<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\App $app
 */
?>

<div class="row">
    <div class="col">
        <h4 class="heading"><?= __('Add new app') ?> </h4>
    </div>
</div>

<?= $this->Form->create($app) ?>

<div class="row">
    <div class="col-8 py-2">
        <?= $this->Form->control('name'); ?>
        <div class="row my-2">
            <div class="col d-flex justify-content-between">
                <?= $this->Form->control('enable_webpush',[
                    'templates' => [
                        'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                    ],
                    'label' => 'WebPush'
                ]); ?>
                <?= $this->Form->control('enable_email',[
                    'templates' => [
                        'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                    ],
                    'label' => 'Email'
                ]); ?>
                <?= $this->Form->control('enable_sms',[
                    'templates' => [
                        'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                    ],
                    'label' => 'SMS'
                ]); ?>
            </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-primary']) ?>
        <?= $this->Html->link(__('Return to apps'), ['action' => 'index'], ['class' => 'btn btn-sm btn-link']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
