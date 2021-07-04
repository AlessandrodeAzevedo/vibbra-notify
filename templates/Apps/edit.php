<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\App $app
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $app->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $app->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Apps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="apps form content">
            <?= $this->Form->create($app) ?>
            <fieldset>
                <legend><?= __('Edit App') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('enable_webpush');
                    echo $this->Form->control('enable_email');
                    echo $this->Form->control('enable_sms');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
