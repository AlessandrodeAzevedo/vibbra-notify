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
            <?= $this->Html->link(__('Edit Web Push'), ['action' => 'edit', $webPush->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Web Push'), ['action' => 'delete', $webPush->id], ['confirm' => __('Are you sure you want to delete # {0}?', $webPush->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Web Pushes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Web Push'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="webPushes view content">
            <h3><?= h($webPush->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('App') ?></th>
                    <td><?= $webPush->has('app') ? $this->Html->link($webPush->app->name, ['controller' => 'Apps', 'action' => 'view', $webPush->app->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Site Name') ?></th>
                    <td><?= h($webPush->site_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Site Address') ?></th>
                    <td><?= h($webPush->site_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Site Icon') ?></th>
                    <td><?= h($webPush->site_icon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Text Message') ?></th>
                    <td><?= h($webPush->text_message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Text Button Allow') ?></th>
                    <td><?= h($webPush->text_button_allow) ?></td>
                </tr>
                <tr>
                    <th><?= __('Text Button Deny') ?></th>
                    <td><?= h($webPush->text_button_deny) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notify Title') ?></th>
                    <td><?= h($webPush->notify_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notify Message') ?></th>
                    <td><?= h($webPush->notify_message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notify Link Enable') ?></th>
                    <td><?= h($webPush->notify_link_enable) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notify Link') ?></th>
                    <td><?= h($webPush->notify_link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($webPush->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($webPush->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($webPush->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $webPush->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
