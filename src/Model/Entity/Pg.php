<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pg extends Entity
{
    protected $_accessible = [
        'name' => true,
        'user_id' => true,
        'type' => true,
        'sharing' => true,
        'totalFloors' => true,
        'pgOnFloor' => true,
        'noOfRooms' => true,
        'houseNumber' => true,
        'landmark' => true,
        'availableFrom' => true,
        'description' => true,
        'status' => true,
        'approved' => true,
        'expire' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'addresses' => true,
        'facilities' => true,
        'images' => true,
        'pricings' => true,
        'ratings' => true,
        'requests' => true,
        'rules' => true,
    ];
}
