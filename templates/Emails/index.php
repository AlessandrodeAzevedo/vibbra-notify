<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Email[]|\Cake\Collection\CollectionInterface $emails
 */
?>
<div class="emails index content">
    <?= $this->Html->link(__('New Email'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Emails') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('app_id') ?></th>
                    <th><?= $this->Paginator->sort('server_name') ?></th>
                    <th><?= $this->Paginator->sort('port') ?></th>
                    <th><?= $this->Paginator->sort('login') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('sender_name') ?></th>
                    <th><?= $this->Paginator->sort('sender_email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emails as $email): ?>
                <tr>
                    <td><?= $this->Number->format($email->id) ?></td>
                    <td><?= $email->has('app') ? $this->Html->link($email->app->name, ['controller' => 'Apps', 'action' => 'view', $email->app->id]) : '' ?></td>
                    <td><?= h($email->server_name) ?></td>
                    <td><?= h($email->port) ?></td>
                    <td><?= h($email->login) ?></td>
                    <td><?= h($email->password) ?></td>
                    <td><?= h($email->sender_name) ?></td>
                    <td><?= h($email->sender_email) ?></td>
                    <td><?= h($email->created) ?></td>
                    <td><?= h($email->modified) ?></td>
                    <td><?= h($email->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $email->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $email->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
