<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class RulesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('rules');
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
            ->scalar('pets')
            ->notEmptyString('pets');

        $validator
            ->scalar('visitors')
            ->notEmptyString('visitors');

        $validator
            ->scalar('smoking')
            ->notEmptyString('smoking');

        $validator
            ->scalar('alcohal')
            ->notEmptyString('alcohal');

        $validator
            ->scalar('events')
            ->notEmptyString('events');

        $validator
            ->time('lateEntry')
            ->allowEmptyTime('lateEntry');

        $validator
            ->scalar('others')
            ->allowEmptyString('others');

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
