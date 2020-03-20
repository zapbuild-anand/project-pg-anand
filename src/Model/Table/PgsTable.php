<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PgsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pgs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'pg_id',
        ]);
        $this->hasMany('Facilities', [
            'foreignKey' => 'pg_id',
        ]);
        $this->hasMany('Images', [
            'foreignKey' => 'pg_id',
        ]);
        $this->hasMany('Pricings', [
            'foreignKey' => 'pg_id',
        ]);
        $this->hasMany('Ratings', [
            'foreignKey' => 'pg_id',
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'pg_id',
        ]);
        $this->hasMany('Rules', [
            'foreignKey' => 'pg_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('type')
            ->notEmptyString('type');

        $validator
            ->integer('sharing')
            ->requirePresence('sharing', 'create')
            ->notEmptyString('sharing');

        $validator
            ->integer('totalFloors')
            ->requirePresence('totalFloors', 'create')
            ->notEmptyString('totalFloors');

        $validator
            ->integer('pgOnFloor')
            ->requirePresence('pgOnFloor', 'create')
            ->notEmptyString('pgOnFloor');

        $validator
            ->integer('noOfRooms')
            ->requirePresence('noOfRooms', 'create')
            ->notEmptyString('noOfRooms');

        $validator
            ->integer('houseNumber')
            ->requirePresence('houseNumber', 'create')
            ->notEmptyString('houseNumber');

        $validator
            ->scalar('landmark')
            ->maxLength('landmark', 50)
            ->requirePresence('landmark', 'create')
            ->notEmptyString('landmark');

        $validator
            ->date('availableFrom')
            ->requirePresence('availableFrom', 'create')
            ->notEmptyDate('availableFrom');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->scalar('approved')
            ->notEmptyString('approved');

        $validator
            ->dateTime('expire')
            ->allowEmptyDateTime('expire');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
