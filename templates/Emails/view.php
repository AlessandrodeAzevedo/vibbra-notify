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
            <?= $this->Html->link(__('Edit Email'), ['action' => 'edit', $email->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Email'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Emails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Email'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="emails view content">
            <h3><?= h($email->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('App') ?></th>
                    <td><?= $email->has('app') ? $this->Html->link($email->app->name, ['controller' => 'Apps', 'action' => 'view', $email->app->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Server Name') ?></th>
                    <td><?= h($email->server_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Port') ?></th>
                    <td><?= h($email->port) ?></td>
                </tr>
                <tr>
                    <th><?= __('Login') ?></th>
                    <td><?= h($email->login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($email->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender Name') ?></th>
                    <td><?= h($email->sender_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender Email') ?></th>
                    <td><?= h($email->sender_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($email->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($email->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($email->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $email->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
