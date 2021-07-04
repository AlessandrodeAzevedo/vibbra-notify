<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apps Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EmailsTable&\Cake\ORM\Association\HasMany $Emails
 * @property \App\Model\Table\SmssTable&\Cake\ORM\Association\HasMany $Smss
 * @property \App\Model\Table\WebPushesTable&\Cake\ORM\Association\HasMany $WebPushes
 *
 * @method \App\Model\Entity\App newEmptyEntity()
 * @method \App\Model\Entity\App newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\App[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\App get($primaryKey, $options = [])
 * @method \App\Model\Entity\App findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\App patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\App[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\App|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\App saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AppsTable extends Table
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

        $this->setTable('apps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Emails', [
            'foreignKey' => 'app_id',
        ]);
        $this->hasMany('Smss', [
            'foreignKey' => 'app_id',
        ]);
        $this->hasMany('WebPushes', [
            'foreignKey' => 'app_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->boolean('enable_webpush')
            ->requirePresence('enable_webpush', 'create')
            ->notEmptyString('enable_webpush');

        $validator
            ->boolean('enable_email')
            ->requirePresence('enable_email', 'create')
            ->notEmptyString('enable_email');

        $validator
            ->boolean('enable_sms')
            ->requirePresence('enable_sms', 'create')
            ->notEmptyString('enable_sms');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
