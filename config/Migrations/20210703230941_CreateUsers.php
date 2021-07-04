<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users')
        ->addColumn('email', 'string', ['null' => true, 'limit' => 50])
        ->addColumn('password', 'string', ['null' => true, 'limit' => 60])
        ->addColumn('role', 'integer', ['null' => true, 'limit' => 50])
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('status', 'boolean', [
            'null' => false,
            'default' => true])
        ->create();
    }
}
