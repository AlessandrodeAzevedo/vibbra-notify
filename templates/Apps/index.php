<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="apps">
    <?= $this->Html->link(__('New App'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    <div class="row my-3">
        <?php foreach($apps as $app): ?>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?= h($app->name) ?></h5>
                        <p class="card-text"></p>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $app->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $app->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $app->id], ['confirm' => __('Are you sure you want to delete # {0}?', $app->id), 'class' => 'btn btn-sm btn-danger']) ?> -->
                    </div>
                    <div class="card-footer text-muted"><?= __("Last Notify: {0} days ago", 2); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
