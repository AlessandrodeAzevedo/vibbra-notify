<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Notifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="notifications form content">
            <?= $this->Form->create($notification) ?>
            <fieldset>
                <legend><?= __('Add Notification') ?></legend>
                <?php
                    echo $this->Form->control('app_id', ['options' => $apps]);
                    echo $this->Form->control('sent_at', ['empty' => true]);
                    echo $this->Form->control('foreign_id');
                    echo $this->Form->control('model');
                    echo $this->Form->control('origin');
                    echo $this->Form->control('read_id', ['empty' => true]);
                    echo $this->Form->control('content');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
