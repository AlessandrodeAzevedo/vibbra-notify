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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $webPush->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $webPush->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Web Pushes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="webPushes form content">
            <?= $this->Form->create($webPush) ?>
            <fieldset>
                <legend><?= __('Edit Web Push') ?></legend>
                <?php
                    echo $this->Form->control('app_id', ['options' => $apps]);
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
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
