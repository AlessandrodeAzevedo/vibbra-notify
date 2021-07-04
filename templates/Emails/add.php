<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Email $email
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
        <div class="emails form content">
            <?= $this->Form->create($email) ?>
            <fieldset>
                <legend><?= __('Add Email') ?></legend>
                <?php
                    echo $this->Form->control('server_name');
                    echo $this->Form->control('port');
                    echo $this->Form->control('login');
                    echo $this->Form->control('password',[
                        'type' => 'text'
                    ]);
                    echo $this->Form->control('sender_name');
                    echo $this->Form->control('sender_email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
