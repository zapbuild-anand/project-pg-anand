<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rule Entity
 *
 * @property int $id
 * @property int $pg_id
 * @property string $pets
 * @property string $visitors
 * @property string $smoking
 * @property string $alcohal
 * @property string $events
 * @property \Cake\I18n\FrozenTime|null $lateEntry
 * @property string|null $others
 *
 * @property \App\Model\Entity\Pg $pg
 */
class Rule extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'pg_id' => true,
        'pets' => true,
        'visitors' => true,
        'smoking' => true,
        'alcohal' => true,
        'events' => true,
        'lateEntry' => true,
        'others' => true,
        'pg' => true,
    ];
}
