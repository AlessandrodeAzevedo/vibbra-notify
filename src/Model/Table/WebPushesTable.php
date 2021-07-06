<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebPushes Model
 *
 * @property \App\Model\Table\AppsTable&\Cake\ORM\Association\BelongsTo $Apps
 * @method \App\Model\Entity\WebPush newEmptyEntity()
 * @method \App\Model\Entity\WebPush newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\WebPush[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebPush get($primaryKey, $options = [])
 * @method \App\Model\Entity\WebPush findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\WebPush patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WebPush[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebPush|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebPush saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebPush[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WebPush[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\WebPush[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\WebPush[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WebPushesTable extends Table
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

        $this->setTable('web_pushes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Apps', [
            'foreignKey' => 'app_id',
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
            ->scalar('site_name')
            ->maxLength('site_name', 50)
            ->requirePresence('site_name', 'create')
            ->notEmptyString('site_name');

        $validator
            ->scalar('site_address')
            ->maxLength('site_address', 50)
            ->requirePresence('site_address', 'create')
            ->notEmptyString('site_address');

        $validator
            ->scalar('site_icon')
            ->maxLength('site_icon', 50)
            ->requirePresence('site_icon', 'create')
            ->notEmptyString('site_icon');

        $validator
            ->scalar('text_message')
            ->maxLength('text_message', 50)
            ->requirePresence('text_message', 'create')
            ->notEmptyString('text_message');

        $validator
            ->scalar('text_button_allow')
            ->maxLength('text_button_allow', 50)
            ->requirePresence('text_button_allow', 'create')
            ->notEmptyString('text_button_allow');

        $validator
            ->scalar('text_button_deny')
            ->maxLength('text_button_deny', 50)
            ->requirePresence('text_button_deny', 'create')
            ->notEmptyString('text_button_deny');

        $validator
            ->scalar('notify_title')
            ->maxLength('notify_title', 50)
            ->requirePresence('notify_title', 'create')
            ->notEmptyString('notify_title');

        $validator
            ->scalar('notify_message')
            ->maxLength('notify_message', 50)
            ->requirePresence('notify_message', 'create')
            ->notEmptyString('notify_message');

        $validator
            ->scalar('notify_link_enable')
            ->maxLength('notify_link_enable', 50)
            ->requirePresence('notify_link_enable', 'create')
            ->notEmptyString('notify_link_enable');

        $validator
            ->scalar('notify_link')
            ->maxLength('notify_link', 50)
            ->requirePresence('notify_link', 'create')
            ->notEmptyString('notify_link');

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
        $rules->add($rules->existsIn(['app_id'], 'Apps'), ['errorField' => 'app_id']);

        return $rules;
    }
}
