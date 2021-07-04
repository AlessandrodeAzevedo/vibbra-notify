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
            <?= $this->Html->link(__('Edit Sms'), ['action' => 'edit', $sms->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sms'), ['action' => 'delete', $sms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sms->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smss'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sms'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smss view content">
            <h3><?= h($sms->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('App') ?></th>
                    <td><?= $sms->has('app') ? $this->Html->link($sms->app->name, ['controller' => 'Apps', 'action' => 'view', $sms->app->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Provider') ?></th>
                    <td><?= h($sms->provider) ?></td>
                </tr>
                <tr>
                    <th><?= __('Login') ?></th>
                    <td><?= h($sms->login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($sms->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sms->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sms->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sms->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $sms->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
