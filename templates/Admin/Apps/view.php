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
            <?= $this->Form->postLink(__('Delete App'), ['action' => 'delete', $app->id], ['confirm' => __('Are you sure you want to delete # {0}?', $app->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Apps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="apps view content">
            <h3><?= h($app->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($app->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $app->has('user') ? $this->Html->link($app->user->email, ['controller' => 'Users', 'action' => 'view', $app->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Enable Webpush') ?></th>
                    <td><?= $app->enable_webpush ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Enable Email') ?></th>
                    <td><?= $app->enable_email ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Enable Sms') ?></th>
                    <td><?= $app->enable_sms ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($app->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($app->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $app->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Emails') ?></h4>
                <?php if (!empty($app->emails)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('App Id') ?></th>
                            <th><?= __('Server Name') ?></th>
                            <th><?= __('Port') ?></th>
                            <th><?= __('Login') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Sender Name') ?></th>
                            <th><?= __('Sender Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($app->emails as $emails) : ?>
                        <tr>
                            <td><?= h($emails->id) ?></td>
                            <td><?= h($emails->app_id) ?></td>
                            <td><?= h($emails->server_name) ?></td>
                            <td><?= h($emails->port) ?></td>
                            <td><?= h($emails->login) ?></td>
                            <td><?= h($emails->password) ?></td>
                            <td><?= h($emails->sender_name) ?></td>
                            <td><?= h($emails->sender_email) ?></td>
                            <td><?= h($emails->created) ?></td>
                            <td><?= h($emails->modified) ?></td>
                            <td><?= h($emails->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Emails', 'action' => 'view', $emails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Emails', 'action' => 'edit', $emails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Emails', 'action' => 'delete', $emails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Smss') ?></h4>
                <?php if (!empty($app->smss)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('App Id') ?></th>
                            <th><?= __('Provider') ?></th>
                            <th><?= __('Login') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($app->smss as $smss) : ?>
                        <tr>
                            <td><?= h($smss->id) ?></td>
                            <td><?= h($smss->app_id) ?></td>
                            <td><?= h($smss->provider) ?></td>
                            <td><?= h($smss->login) ?></td>
                            <td><?= h($smss->password) ?></td>
                            <td><?= h($smss->created) ?></td>
                            <td><?= h($smss->modified) ?></td>
                            <td><?= h($smss->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Smss', 'action' => 'view', $smss->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Smss', 'action' => 'edit', $smss->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Smss', 'action' => 'delete', $smss->id], ['confirm' => __('Are you sure you want to delete # {0}?', $smss->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Web Pushes') ?></h4>
                <?php if (!empty($app->web_pushes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('App Id') ?></th>
                            <th><?= __('Site Name') ?></th>
                            <th><?= __('Site Address') ?></th>
                            <th><?= __('Site Icon') ?></th>
                            <th><?= __('Text Message') ?></th>
                            <th><?= __('Text Button Allow') ?></th>
                            <th><?= __('Text Button Deny') ?></th>
                            <th><?= __('Notify Title') ?></th>
                            <th><?= __('Notify Message') ?></th>
                            <th><?= __('Notify Link Enable') ?></th>
                            <th><?= __('Notify Link') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($app->web_pushes as $webPushes) : ?>
                        <tr>
                            <td><?= h($webPushes->id) ?></td>
                            <td><?= h($webPushes->app_id) ?></td>
                            <td><?= h($webPushes->site_name) ?></td>
                            <td><?= h($webPushes->site_address) ?></td>
                            <td><?= h($webPushes->site_icon) ?></td>
                            <td><?= h($webPushes->text_message) ?></td>
                            <td><?= h($webPushes->text_button_allow) ?></td>
                            <td><?= h($webPushes->text_button_deny) ?></td>
                            <td><?= h($webPushes->notify_title) ?></td>
                            <td><?= h($webPushes->notify_message) ?></td>
                            <td><?= h($webPushes->notify_link_enable) ?></td>
                            <td><?= h($webPushes->notify_link) ?></td>
                            <td><?= h($webPushes->created) ?></td>
                            <td><?= h($webPushes->modified) ?></td>
                            <td><?= h($webPushes->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'WebPushes', 'action' => 'view', $webPushes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'WebPushes', 'action' => 'edit', $webPushes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WebPushes', 'action' => 'delete', $webPushes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $webPushes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
