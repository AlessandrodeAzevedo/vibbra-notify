<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebPush $webPush
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
        <div class="webPushes form content">
            <?= $this->Form->create($webPush) ?>
            <fieldset>
                <legend><?= __('Add Web Push') ?></legend>
                <?php
                    echo $this->Form->control('site_name');
                    echo $this->Form->control('site_address');
                    echo $this->Form->control('site_icon');
                    echo $this->Form->control('text_message');
                    echo $this->Form->control('text_button_allow');
                    echo $this->Form->control('text_button_deny');
                    echo $this->Form->control('notify_title');
                    echo $this->Form->control('notify_message');
                    echo $this->Form->control('notify_link_enable');
                    echo $this->Form->control('notify_link');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
