<?php
declare(strict_types=1);

use Cake\Auth\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * AddUser seed.
 */
class AddUserSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('users');
        $data['email'] = 'admin@admin.com';
        $data['password'] = (new DefaultPasswordHasher())->hash('admin');
        $data['role'] = 2;
        $table->insert($data)->save();
    }
}
