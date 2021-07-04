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
            <?= $this->Html->link(__('Return to app'), ['action' => 'view', 'controller' => 'Apps', $app_id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smss form content">
            <?= $this->Form->create($sms) ?>
            <fieldset>
                <legend><?= __('Add Sms') ?></legend>
                <?php
                    echo $this->Form->control('provider');
                    echo $this->Form->control('login');
                    echo $this->Form->control('password',[
                        'type' => 'text'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
