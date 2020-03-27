<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PricingsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pricings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pgs', [
            'foreignKey' => 'pg_id',
            'joinType' => 'INNER',
        ]);
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('rent')
            ->requirePresence('rent', 'create')
            ->notEmptyString('rent');

        $validator
            ->integer('security')
            ->requirePresence('security', 'create')
            ->notEmptyString('security');

        $validator
            ->integer('minimumDuration')
            ->requirePresence('minimumDuration', 'create')
            ->notEmptyString('minimumDuration');

        $validator
            ->integer('leavingNotice')
            ->requirePresence('leavingNotice', 'create')
            ->notEmptyString('leavingNotice');

        $validator
            ->integer('earlyLeavingCharge')
            ->requirePresence('earlyLeavingCharge', 'create')
            ->notEmptyString('earlyLeavingCharge');

        $validator
            ->scalar('food')
            ->requirePresence('food', 'create')
            ->notEmptyString('food');

        $validator
            ->scalar('laundary')
            ->requirePresence('laundary', 'create')
            ->notEmptyString('laundary');

        $validator
            ->scalar('electricity')
            ->requirePresence('electricity', 'create')
            ->notEmptyString('electricity');

        $validator
            ->scalar('wifi')
            ->requirePresence('wifi', 'create')
            ->notEmptyString('wifi');

        $validator
            ->scalar('housekeeping')
            ->requirePresence('housekeeping', 'create')
            ->notEmptyString('housekeeping');

        $validator
            ->scalar('dth')
            ->requirePresence('dth', 'create')
            ->notEmptyString('dth');

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
        $rules->add($rules->existsIn(['pg_id'], 'Pgs'));

        return $rules;
    }
}
