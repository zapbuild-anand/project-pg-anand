<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; 
use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'firstname' => true,
        'lastname' => true,
        'password' => true,
        'email' => true,
        'phone' => true,
        'gender' => true,
        'dob' => true,
        'image' => true,
        'type' => true,
        'token' => true,
        'created' => true,
        'modified' => true,
        'addresses' => true,
        'pgs' => true,
        'ratings' => true,
        'requests' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
