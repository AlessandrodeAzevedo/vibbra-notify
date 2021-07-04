<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\App[]|\Cake\Collection\CollectionInterface $apps
 */
?>
<div class="apps index content">
    <?= $this->Html->link(__('New App'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Apps') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('user') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apps as $app): ?>
                <tr>
                    <td><?= $this->Number->format($app->id) ?></td>
                    <td><?= h($app->name) ?></td>
                    <td><?= $this->Html->link($app->user->email, ['controller' => 'Users', 'action' => 'view', $app->user->id])  ?></td>
                    <td><?= h($app->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $app->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $app->id], ['confirm' => __('Are you sure you want to delete # {0}?', $app->id)]) ?>
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
