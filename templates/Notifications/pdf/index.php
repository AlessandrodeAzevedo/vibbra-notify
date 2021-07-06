<div style="text-align: center;">
    <?= $this->Html->image('logo.png',[
        'fullBase' => true,
        'width' => '150px'
    ]); ?>
</div>
<hr>
<h3><?= __('Notifications') ?></h3>
<div class="notifications">
    <div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('app.name') ?></th>
                    <th><?= $this->Paginator->sort('sent_at') ?></th>
                    <th><?= $this->Paginator->sort('origin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification): ?>
                    <tr class="notification" id="notification-<?= $notification->id ?>" style="cursor:pointer">
                        <td><?= $notification->has('app') ? $notification->app->name : '' ?></td>
                        <td><?= h($notification->sent_at) ?></td>
                        <td><?= $origins[$notification->origin] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    <?php require_once WWW_ROOT . 'css' . DS . 'styles-table.css'; ?>
</style>