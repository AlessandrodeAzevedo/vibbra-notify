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
            <?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Notifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Notification'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="notifications view content">
            <h3><?= h($notification->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('App') ?></th>
                    <td><?= $notification->has('app') ? $this->Html->link($notification->app->name, ['controller' => 'Apps', 'action' => 'view', $notification->app->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= h($notification->model) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= h($notification->content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($notification->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foreign Id') ?></th>
                    <td><?= $this->Number->format($notification->foreign_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Origin') ?></th>
                    <td><?= $this->Number->format($notification->origin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sent At') ?></th>
                    <td><?= h($notification->sent_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Read Id') ?></th>
                    <td><?= h($notification->read_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($notification->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($notification->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $notification->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
