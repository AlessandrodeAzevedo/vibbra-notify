<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotificationOptions Model
 *
 * @property \App\Model\Table\NotificationsTable&\Cake\ORM\Association\BelongsTo $Notifications
 * @method \App\Model\Entity\NotificationOption newEmptyEntity()
 * @method \App\Model\Entity\NotificationOption newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\NotificationOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NotificationOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\NotificationOption findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\NotificationOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NotificationOption[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NotificationOption|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NotificationOption saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NotificationOption[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NotificationOption[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\NotificationOption[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NotificationOption[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificationOptionsTable extends Table
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

        $this->setTable('notification_options');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Notifications', [
            'foreignKey' => 'notification_id',
            'joinType' => 'INNER',
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
            ->scalar('option_name')
            ->maxLength('option_name', 255)
            ->requirePresence('option_name', 'create')
            ->notEmptyString('option_name');

        $validator
            ->scalar('option_value')
            ->maxLength('option_value', 255)
            ->requirePresence('option_value', 'create')
            ->notEmptyString('option_value');

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
        $rules->add($rules->existsIn(['notification_id'], 'Notifications'), ['errorField' => 'notification_id']);

        return $rules;
    }
}
