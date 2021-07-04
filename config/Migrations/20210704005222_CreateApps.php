<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateApps extends AbstractMigration
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
        $table = $this->table('apps')
        ->addColumn('name', 'string', ['limit' => 50])
        ->addColumn('user_id', 'integer', ['limit' => 50])
        ->addColumn('enable_webpush', 'boolean', ['limit' => 50])
        ->addColumn('enable_email', 'boolean', ['limit' => 50])
        ->addColumn('enable_sms', 'boolean', ['limit' => 50])
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->addColumn('status', 'boolean', [
            'null' => false,
            'default' => true])
        ->create();
    }
}
