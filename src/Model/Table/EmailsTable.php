<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emails Model
 *
 * @property \App\Model\Table\AppsTable&\Cake\ORM\Association\BelongsTo $Apps
 * @method \App\Model\Entity\Email newEmptyEntity()
 * @method \App\Model\Entity\Email newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Email[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Email get($primaryKey, $options = [])
 * @method \App\Model\Entity\Email findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Email patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Email[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Email|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Email saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('emails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Apps', [
            'foreignKey' => 'app_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('EmailFiles', [
            'foreignKey' => 'email_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('server_name')
            ->maxLength('server_name', 50)
            ->requirePresence('server_name', 'create')
            ->notEmptyString('server_name');

        $validator
            ->scalar('port')
            ->maxLength('port', 50)
            ->requirePresence('port', 'create')
            ->notEmptyString('port');

        $validator
            ->scalar('login')
            ->maxLength('login', 50)
            ->requirePresence('login', 'create')
            ->notEmptyString('login');

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('sender_name')
            ->maxLength('sender_name', 50)
            ->requirePresence('sender_name', 'create')
            ->notEmptyString('sender_name');

        $validator
            ->scalar('sender_email')
            ->maxLength('sender_email', 50)
            ->requirePresence('sender_email', 'create')
            ->notEmptyString('sender_email');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        return $validator;
    }
}
