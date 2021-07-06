<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Filter\NotificationsCollection;

/**
 * Notifications Model
 *
 * @property \App\Model\Table\AppsTable&\Cake\ORM\Association\BelongsTo $Apps
 * @property \App\Model\Table\ForeignsTable&\Cake\ORM\Association\BelongsTo $Foreigns
 * @property \App\Model\Table\ReadsTable&\Cake\ORM\Association\BelongsTo $Reads
 *
 * @method \App\Model\Entity\Notification newEmptyEntity()
 * @method \App\Model\Entity\Notification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Notification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Notification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificationsTable extends Table
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

        $this->setTable('notifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Search.Search',[
            'collectionClass' => NotificationsCollection::class,
            'actions' => ['index'],
        ]);
        
        $this->belongsTo('Apps', [
            'foreignKey' => 'app_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Emails', [
            'foreignKey' => 'foreign_id',
            'joinType' => 'LEFT',
        ])
        ->setConditions(['Notifications.model' => 'Emails']);
        $this->belongsTo('WebPushes', [
            'foreignKey' => 'foreign_id',
            'joinType' => 'LEFT'
        ])
        ->setConditions(['Notifications.model' => 'WebPushes']);
        $this->belongsTo('Smss', [
            'foreignKey' => 'foreign_id',
            'joinType' => 'LEFT'
        ])
        ->setConditions(['Notifications.model' => 'Smss']);
        $this->hasMany('NotificationOptions', [
            'foreignKey' => 'notification_id'
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
            ->dateTime('sent_at')
            ->allowEmptyDateTime('sent_at');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->integer('origin')
            ->requirePresence('origin', 'create')
            ->notEmptyString('origin');

        $validator
            ->scalar('content')
            ->maxLength('content', 255)
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

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
        $rules->add($rules->existsIn(['foreign_id'], 'Foreigns'), ['errorField' => 'foreign_id']);
        $rules->add($rules->existsIn(['read_id'], 'Reads'), ['errorField' => 'read_id']);

        return $rules;
    }
}
