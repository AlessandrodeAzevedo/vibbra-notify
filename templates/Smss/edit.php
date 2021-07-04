<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sms $sms
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sms->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sms->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smss'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smss form content">
            <?= $this->Form->create($sms) ?>
            <fieldset>
                <legend><?= __('Edit Sms') ?></legend>
                <?php
                    echo $this->Form->control('app_id', ['options' => $apps]);
                    echo $this->Form->control('provider');
                    echo $this->Form->control('login');
                    echo $this->Form->control('password');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
