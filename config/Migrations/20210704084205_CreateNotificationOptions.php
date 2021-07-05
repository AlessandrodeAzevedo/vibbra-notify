<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateNotificationOptions extends AbstractMigration
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
        $table = $this->table('notification_options')
        ->addColumn('notification_id', 'integer', ['limit' => 50])
        ->addColumn('option_name', 'string')
        ->addColumn('option_value', 'string')
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->create();
    }
}
