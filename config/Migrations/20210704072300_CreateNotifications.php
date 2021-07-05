<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateNotifications extends AbstractMigration
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
        $table = $this->table('notifications')
        ->addColumn('app_id', 'integer', ['limit' => 50])
        ->addColumn('sent_at', 'datetime', ['null' => true])
        ->addColumn('foreign_id', 'integer')
        ->addColumn('model', 'string')
        ->addColumn('origin', 'integer', ['limit' => 50])
        ->addColumn('read_at', 'datetime', ['null' => true])
        ->addColumn('content', 'string')
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('status', 'boolean', [
            'null' => false,
            'default' => true])
        ->create();
    }
}
