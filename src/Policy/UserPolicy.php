<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

class UserPolicy
{
    public function canEdit(IdentityInterface $user, User $resource)
    {
        if($user->type==3)
            return true;
        return $this->isAuthor($user, $resource);
    }

    public function canDelete(IdentityInterface $user, User $resource)
    {
        if($user->get('type')==3)
            return true;
        else
            return false;
    }

    public function canView(IdentityInterface $user, User $resource)
    {
        return $this->isAuthor($user, $resource);
    }
    protected function isAuthor(IdentityInterface $user,User $resource)
    {
        return $resource->id === $user->getIdentifier();
    }
}
