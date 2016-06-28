<?php
/**
 * Copyright (C) 2015 Orange
 *
 * This software is confidential and proprietary information of Orange.
 * You shall not disclose such Confidential Information and shall use it only
 * in accordance with the terms of the agreement you entered into.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 *
 * If you are Orange employee you shall use this software in accordance with
 * the Orange Source Charter (http://opensource.itn.ftgroup/index.php/Orange_Source).
 */

namespace Oft\Test\Mock\Auth;

use Oft\Auth\AuthInterface;
use Oft\Auth\IdentityStoreInterface;

class Auth implements AuthInterface
{
    public static $authenticateReturn, $data, $getFormReturn, $store;
    
    public function __construct(IdentityStoreInterface $store)
    {
        self::$store = $store;
    }
    
    public function authenticate(array $data = array())
    {
        self::$data = $data;
        return self::$authenticateReturn;
    }

    public function getForm()
    {
        return self::$getFormReturn;
    }
}
