<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sms[]|\Cake\Collection\CollectionInterface $smss
 */
?>
<div class="smss index content">
    <?= $this->Html->link(__('New Sms'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Smss') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('app_id') ?></th>
                    <th><?= $this->Paginator->sort('provider') ?></th>
                    <th><?= $this->Paginator->sort('login') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smss as $sms): ?>
                <tr>
                    <td><?= $this->Number->format($sms->id) ?></td>
                    <td><?= $sms->has('app') ? $this->Html->link($sms->app->name, ['controller' => 'Apps', 'action' => 'view', $sms->app->id]) : '' ?></td>
                    <td><?= h($sms->provider) ?></td>
                    <td><?= h($sms->login) ?></td>
                    <td><?= h($sms->password) ?></td>
                    <td><?= h($sms->created) ?></td>
                    <td><?= h($sms->modified) ?></td>
                    <td><?= h($sms->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sms->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sms->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sms->id)]) ?>
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
