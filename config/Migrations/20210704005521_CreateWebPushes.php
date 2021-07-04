<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateWebPushes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('web_pushes')
        ->addColumn('app_id', 'integer', ['limit' => 50])
        ->addColumn('site_name', 'string', ['limit' => 50])
        ->addColumn('site_address', 'string', ['limit' => 50])
        ->addColumn('site_icon', 'string', ['limit' => 50])
        ->addColumn('text_message', 'string', ['limit' => 50])
        ->addColumn('text_button_allow', 'string', ['limit' => 50])
        ->addColumn('text_button_deny', 'string', ['limit' => 50])
        ->addColumn('notify_title', 'string', ['limit' => 50])
        ->addColumn('notify_message', 'string', ['limit' => 50])
        ->addColumn('notify_link_enable', 'string', ['limit' => 50])
        ->addColumn('notify_link', 'string', ['limit' => 50])
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('status', 'boolean', [
            'null' => false,
            'default' => true])
        ->create();
    }
}
