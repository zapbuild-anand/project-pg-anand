<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pricing Entity
 *
 * @property int $id
 * @property int $pg_id
 * @property int $rent
 * @property int $security
 * @property int $minimumDuration
 * @property int $leavingNotice
 * @property int $earlyLeavingCharge
 * @property string $food
 * @property string $laundary
 * @property string $electricity
 * @property string $wifi
 * @property string $housekeeping
 * @property string $dth
 *
 * @property \App\Model\Entity\Pg $pg
 */
class Pricing extends Entity
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
        'rent' => true,
        'security' => true,
        'minimumDuration' => true,
        'leavingNotice' => true,
        'earlyLeavingCharge' => true,
        'food' => true,
        'laundary' => true,
        'electricity' => true,
        'wifi' => true,
        'housekeeping' => true,
        'dth' => true,
        'pg' => true,
    ];
}
