<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Facility extends Entity
{
    protected $_accessible = [
        'pg_id' => true,
        'furnishing' => true,
        'balcony' => true,
        'chair' => true,
        'sofa' => true,
        'electricity' => true,
        'powerBackup' => true,
        'wifi' => true,
        'led' => true,
        'refrigerator' => true,
        'AC' => true,
        'RO' => true,
        'geaser' => true,
        'cooler' => true,
        'laundary' => true,
        'security' => true,
        'cctv' => true,
        'parking' => true,
        'pg' => true,
        'meals' => true,
    ];
}
