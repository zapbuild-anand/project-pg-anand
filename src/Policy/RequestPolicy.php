<?php

namespace App\Policy;

use Authorization\Policy\RequestPolicyInterface;
use Cake\Http\ServerRequest;

class RequestPolicy implements RequestPolicyInterface
{
    /**
     * Method to check if the request can be accessed
     *
     * @param \Authorization\IdentityInterface|null Identity
     * @param \Cake\Http\ServerRequest $request Server Request
     * @return bool
     */
    public function canAccess($identity, ServerRequest $request)
    {
        if (isset($identity) && $identity->type != 3 && $request->getParam('prefix') === 'Admin') {
            return false;
        }

        return true;
    }
}
?>