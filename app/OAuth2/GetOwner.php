<?php

namespace SpedRest\OAuth2;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class GetOwner
{
    
    public static function owner($cnpj)
    {
        $userId = Authorizer::getResourceOwnerId();
        
    }
}
