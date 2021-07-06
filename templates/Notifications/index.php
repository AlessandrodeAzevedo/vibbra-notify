<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification[]|\Cake\Collection\CollectionInterface $notifications
 */
?>

<h3><?= __('Notifications') ?></h3>
<section class="border p-2 text-center mb-4">
    <?= $this->Form->create(null, [
        'method' => 'GET',
        'class' => "row row-cols-lg-auto g-3 align-items-center"
    ]); ?>
        <div class="col-auto">
            <?= $this->Form->control('begin_date',[
                "data-format" => "**/**/****",
                "data-mask" => "DD/MM/YYYY",
                "value" => $this->request->getQuery('begin_date')
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Form->control('end_date',[
                "data-format" => "**/**/****",
                "data-mask" => "DD/MM/YYYY",
                "value" => $this->request->getQuery('end_date')
            ]); ?>
        
        </div>
        <div class="col-auto text-left">
            <?= $this->Form->control('origin',[
                'templates' => [
                    'inputContainer' => '{{content}}',
                ],
                'label' => false,
                'options' => $origins,
                'empty' => __('Select a origin'),
                "value" => $this->request->getQuery('origin')
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Form->submit('Filter',[
                "class" => "btn btn-primary"
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Html->link('Export to PDF', '#', [
                "class" => "btn btn-outline-primary"
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Html->link('Export to Excel', '#', [
                "class" => "btn btn-outline-primary"
            ]); ?>
        </div>
    <?= $this->Form->end(); ?>
</section>
<div class="notifications">
    <div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th></th>
                    <th><?= $this->Paginator->sort('app.name') ?></th>
                    <th><?= $this->Paginator->sort('sent_at') ?></th>
                    <th><?= $this->Paginator->sort('origin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification): ?>
                    <tr class="notification" id="notification-<?= $notification->id ?>" style="cursor:pointer">
                        <td>-</td>
                        <td><?= $notification->has('app') ? $notification->app->name : '' ?></td>
                        <td><?= h($notification->sent_at) ?></td>
                        <td><?= $origins[$notification->origin] ?></td>
                    </tr>
                    <tr class="d-none notification-details notification-details-<?= $notification->id ?>">
                        <td colspan="1"></td>
                        <td colspan="1">
                            <?php 
                                if ($notification->has('web_push')) {
                                    echo __("Sent by") . ": " . __("Web push");
                                } elseif ($notification->has('email')) {
                                    echo __("Sent by") . ": " . __("E-mail");
                                } elseif ($notification->has('sms')) {
                                    echo __("Sent by") . ": " . __("SMS");
                                }
                            ?>
                        </td>
                        <td colspan="1">
                            <?= __("Sent in") . ": " . $notification->sent_at ?>
                        </td>
                        <td colspan="2">
                            <?= __("Read") . ": " . (!!$notification->read_at ? __("Yes") : __("No")) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->Html->script('script-table'); ?>
<?= $this->Html->css('styles-table'); ?>