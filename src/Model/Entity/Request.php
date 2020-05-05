<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int $pg_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $checkindate
 * @property string $message
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Pg $pg
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Booking[] $bookings
 */
class Request extends Entity
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
        'user_id' => true,
        'checkindate' => true,
        'message' => true,
        'status' => true,
        'created' => true,
        'pg' => true,
        'user' => true,
        'bookings' => true,
    ];
}
