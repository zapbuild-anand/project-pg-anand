<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FacilitiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('facilities');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pgs', [
            'foreignKey' => 'pg_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Meals', [
            'foreignKey' => 'facility_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('furnishing')
            ->requirePresence('furnishing', 'create')
            ->notEmptyString('furnishing');

        $validator
            ->scalar('balcony')
            ->notEmptyString('balcony');

        $validator
            ->scalar('chair')
            ->notEmptyString('chair');

        $validator
            ->scalar('sofa')
            ->notEmptyString('sofa');

        $validator
            ->scalar('electricity')
            ->notEmptyString('electricity');

        $validator
            ->scalar('powerBackup')
            ->notEmptyString('powerBackup');

        $validator
            ->scalar('wifi')
            ->notEmptyString('wifi');

        $validator
            ->scalar('led')
            ->notEmptyString('led');

        $validator
            ->scalar('refrigerator')
            ->notEmptyString('refrigerator');

        $validator
            ->scalar('AC')
            ->notEmptyString('AC');

        $validator
            ->scalar('RO')
            ->notEmptyString('RO');

        $validator
            ->scalar('geaser')
            ->notEmptyString('geaser');

        $validator
            ->scalar('cooler')
            ->notEmptyString('cooler');

        $validator
            ->scalar('laundary')
            ->notEmptyString('laundary');

        $validator
            ->scalar('pgsecurity')
            ->notEmptyString('security');

        $validator
            ->scalar('cctv')
            ->notEmptyString('cctv');

        $validator
            ->scalar('parking')
            ->notEmptyString('parking');

        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['pg_id'], 'Pgs'));

        return $rules;
    }
}
