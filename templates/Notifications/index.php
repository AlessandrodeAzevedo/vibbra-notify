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
                "data-mask" => "DD/MM/YYYY"
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Form->control('end_date',[
                "data-format" => "**/**/****",
                "data-mask" => "DD/MM/YYYY"
            ]); ?>
        
        </div>
        <div class="col-auto text-left">
            <?= $this->Form->control('origin',[
                'templates' => [
                    'inputContainer' => '{{content}}',
                ],
                'label' => false,
                'options' => $origins,
                'empty' => __('Select a origin')
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Form->submit('Filter',[
                "class" => "btn btn-primary"
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Html->link('Export to PDF', '#', [
                "class" => "btn btn-primary"
            ]); ?>
        </div>
        <div class="col-auto">
            <?= $this->Html->link('Export to Excel', '#', [
                "class" => "btn btn-primary"
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
<style>
    .styled-table th a{
        color: white !important;
    }
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: var(--mdb-primary);
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid var(--mdb-primary);
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: var(--mdb-primary);
    }
    .form-select:focus{
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: var(--mdb-primary);
        -webkit-box-shadow: inset 0 0 0 1px var(--mdb-primary);
        box-shadow: inset 0 0 0 1px var(--mdb-primary);
    }
</style>
<script>
    var notifications = document.getElementsByClassName("notification");

    function removeAllViews(){
        let all_details = document.getElementsByClassName('notification-details');
        all_details.classList.remove('d-none');
    }

    var toogleNotification = function() {
        let id = this.id.split('-')[1];
        let element_detail = document.querySelector(`.notification-details-${id}`);
        element_detail.classList.toggle('d-none');
    };

    
    for (var i = 0; i < notifications.length; i++) {
        notifications[i].addEventListener('click', toogleNotification, false);
    }
    function doFormat(x, pattern, mask) {
  var strippedValue = x.replace(/[^0-9]/g, "");
  var chars = strippedValue.split('');
  var count = 0;

  var formatted = '';
  for (var i=0; i<pattern.length; i++) {
    const c = pattern[i];
    if (chars[count]) {
      if (/\*/.test(c)) {
        formatted += chars[count];
        count++;
      } else {
        formatted += c;
      }
    } else if (mask) {
      if (mask.split('')[i])
        formatted += mask.split('')[i];
    }
  }
  return formatted;
}

document.querySelectorAll('[data-mask]').forEach(function(e) {
  function format(elem) {
    const val = doFormat(elem.value, elem.getAttribute('data-format'));
    elem.value = doFormat(elem.value, elem.getAttribute('data-format'), elem.getAttribute('data-mask'));
    
    if (elem.createTextRange) {
      var range = elem.createTextRange();
      range.move('character', val.length);
      range.select();
    } else if (elem.selectionStart) {
      elem.focus();
      elem.setSelectionRange(val.length, val.length);
    }
  }
  e.addEventListener('keyup', function() {
    format(e);
  });
  e.addEventListener('keydown', function() {
    format(e);
  });
  format(e)
});
</script>