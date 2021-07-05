<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\App $app
 */
?>

<div class="row">
    <div class="col">
        <h4 class="heading"><?= __('Edit app') ?> </h4>
    </div>
</div>

<?= $this->Form->create($app) ?>
<div class="row">
    <div class="col-md-8 py-2">
        <?= $this->Form->control('name'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <hr>
        <h5 class="heading"><?= __('Configure channels') ?> </h5>
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <?php if($app->enable_webpush): ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="webpush-tab" data-mdb-toggle="tab" href="#webpush-content" role="tab" aria-controls="webpush-content" aria-selected="true"><?= __("Web push") ?></a>
                </li>
            <?php endif; ?>
            <?php if($app->enable_email): ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="email-tab" data-mdb-toggle="tab" href="#email-content" role="tab" aria-controls="email-content" aria-selected="false"><?= __("E-mail") ?></a>
            </li>
            <?php endif; ?>
            <?php if($app->enable_sms): ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="sms-tab" data-mdb-toggle="tab" href="#sms-content" role="tab" aria-controls="sms-content" aria-selected="false"><?= __("SMS") ?></a>
            </li>
            <?php endif; ?>
        </ul>
        <div class="tab-content border p-2" id="ex2-content">
            <?php if($app->enable_webpush): ?> 
                <div class="tab-pane fade show active" id="webpush-content" role="tabpanel" aria-labelledby="webpush-tab">
                    <?php
                        echo $this->Form->control('web_pushes.0.site_name');
                        echo $this->Form->control('web_pushes.0.site_address');
                        echo $this->Form->control('web_pushes.0.site_icon');
                        echo $this->Form->control('web_pushes.0.text_message');
                        echo $this->Form->control('web_pushes.0.text_button_allow');
                        echo $this->Form->control('web_pushes.0.text_button_deny');
                        echo $this->Form->control('web_pushes.0.notify_title');
                        echo $this->Form->control('web_pushes.0.notify_message');
                        echo $this->Form->control('web_pushes.0.notify_link_enable');
                        echo $this->Form->control('web_pushes.0.notify_link');
                        ?>
                </div>
            <?php endif; ?>
            <?php if($app->enable_email): ?> 
                <div class="tab-pane fade" id="email-content" role="tabpanel" aria-labelledby="email-tab">
                    <?php
                        echo $this->Form->control('emails.0.server_name');
                        echo $this->Form->control('emails.0.port');
                        echo $this->Form->control('emails.0.login');
                        echo $this->Form->control('emails.0.password',[
                            'type' => 'text'
                        ]);
                        echo $this->Form->control('emails.0.sender_name');
                        echo $this->Form->control('emails.0.sender_email');
                        ?>
                </div>
            <?php endif; ?>
            <?php if($app->enable_sms): ?> 
                <div class="tab-pane fade" id="sms-content" role="tabpanel" aria-labelledby="sms-tab">
                    <?php
                        echo $this->Form->control('smss.0.provider');
                        echo $this->Form->control('smss.0.login');
                        echo $this->Form->control('smss.0.password',[
                            'type' => 'text'
                        ]);
                        ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Tabs content -->
    </div>
</div>

<div class="row my-3">
    <div class="col-md-8">
    <hr>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-primary']) ?>
        <?= $this->Html->link(__('Return to apps'), ['action' => 'index'], ['class' => 'btn btn-sm btn-link']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
