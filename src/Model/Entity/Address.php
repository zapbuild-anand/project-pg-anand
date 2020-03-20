<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Address extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'pg_id' => true,
        'state' => true,
        'district' => true,
        'sector' => true,
        'pincode' => true,
        'user' => true,
        'pg' => true,
    ];
}
