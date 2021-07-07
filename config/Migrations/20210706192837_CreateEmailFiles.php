<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEmailFiles extends AbstractMigration
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
        $table = $this->table('email_files')
        ->addColumn('email_id', 'integer', ['limit' => 50])
        ->addColumn('name', 'string')
        ->addColumn('file', 'string')
        ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
        ->addColumn('modified', 'datetime', ['null' => true])
        ->create();
    }
}
