<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebPush[]|\Cake\Collection\CollectionInterface $webPushes
 */
?>
<div class="webPushes index content">
    <?= $this->Html->link(__('New Web Push'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Web Pushes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('app_id') ?></th>
                    <th><?= $this->Paginator->sort('site_name') ?></th>
                    <th><?= $this->Paginator->sort('site_address') ?></th>
                    <th><?= $this->Paginator->sort('site_icon') ?></th>
                    <th><?= $this->Paginator->sort('text_message') ?></th>
                    <th><?= $this->Paginator->sort('text_button_allow') ?></th>
                    <th><?= $this->Paginator->sort('text_button_deny') ?></th>
                    <th><?= $this->Paginator->sort('notify_title') ?></th>
                    <th><?= $this->Paginator->sort('notify_message') ?></th>
                    <th><?= $this->Paginator->sort('notify_link_enable') ?></th>
                    <th><?= $this->Paginator->sort('notify_link') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($webPushes as $webPush): ?>
                <tr>
                    <td><?= $this->Number->format($webPush->id) ?></td>
                    <td><?= $webPush->has('app') ? $this->Html->link($webPush->app->name, ['controller' => 'Apps', 'action' => 'view', $webPush->app->id]) : '' ?></td>
                    <td><?= h($webPush->site_name) ?></td>
                    <td><?= h($webPush->site_address) ?></td>
                    <td><?= h($webPush->site_icon) ?></td>
                    <td><?= h($webPush->text_message) ?></td>
                    <td><?= h($webPush->text_button_allow) ?></td>
                    <td><?= h($webPush->text_button_deny) ?></td>
                    <td><?= h($webPush->notify_title) ?></td>
                    <td><?= h($webPush->notify_message) ?></td>
                    <td><?= h($webPush->notify_link_enable) ?></td>
                    <td><?= h($webPush->notify_link) ?></td>
                    <td><?= h($webPush->created) ?></td>
                    <td><?= h($webPush->modified) ?></td>
                    <td><?= h($webPush->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $webPush->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $webPush->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $webPush->id], ['confirm' => __('Are you sure you want to delete # {0}?', $webPush->id)]) ?>
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
