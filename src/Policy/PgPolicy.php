<?php
namespace App\Policy;

use App\Model\Entity\pg;
use Authorization\IdentityInterface;

class PgPolicy
{
    public function canAdd(IdentityInterface $user,Pg $pg)
    {
        // All logged in users can createPgs.
        return true;
    }

    public function canEdit(IdentityInterface $user,Pg $pg)
    {
        // logged in users can edit their ownPgs.
        if($user->type==3)
            return true;
        return $this->isAuthor($user, $pg);
    }

    public function canDelete(IdentityInterface $user,Pg $pg)
    {
        // logged in users can delete their ownPgs.
        if($user->type==3)
            return true;
        return $this->isAuthor($user, $pg);
    }

    protected function isAuthor(IdentityInterface $user,Pg $pg)
    {
        return $pg->user_id === $user->getIdentifier();
    }
}