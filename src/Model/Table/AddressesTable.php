<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AddressesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Pgs', [
            'foreignKey' => 'pg_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('state')
            ->maxLength('state', 255)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('district')
            ->maxLength('district', 255)
            ->requirePresence('district', 'create')
            ->notEmptyString('district');

        $validator
            ->scalar('sector')
            ->maxLength('sector', 255)
            ->requirePresence('sector', 'create')
            ->notEmptyString('sector');

        $validator
            ->integer('pincode')
            ->requirePresence('pincode', 'create')
            ->notEmptyString('pincode');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['pg_id'], 'Pgs'));

        return $rules;
    }
}
