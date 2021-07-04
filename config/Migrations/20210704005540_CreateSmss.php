<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSmss extends AbstractMigration
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
        $table = $this->table('smss')
        ->addColumn('app_id', 'integer', ['limit' => 50])
        ->addColumn('provider', 'string', ['limit' => 50])
        ->addColumn('login', 'string', ['limit' => 50])
        ->addColumn('password', 'string', ['limit' => 50])
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('status', 'boolean', [
            'null' => false,
            'default' => true])
        ->create();
    }
}
