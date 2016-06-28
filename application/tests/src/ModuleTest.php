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

namespace App\Test;

use App\Module;
use Oft\Mvc\Application;
use PHPUnit_Framework_TestCase;

class ModuleTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testGetName()
    {
        $this->assertSame('app', $this->module->getName());
    }

    public function testGetConfig()
    {
        if (!defined('CACHE_DIR')) {
            define('CACHE_DIR', '/');
        }
        
        $config = $this->module->getConfig();
        $this->assertInternalType('array', $config);
        $this->assertArrayHasKey('application', $config);
        $this->assertArrayHasKey('layout', $config);
        $this->assertArrayHasKey('db', $config);
        $this->assertArrayHasKey('gir', $config);
        $this->assertArrayHasKey('cache', $config);
    }

    public function testGetViewDir()
    {
        $viewDir = $this->module->getDir('views');

        $this->assertTrue(is_string($viewDir));
        $this->assertContains('views', $viewDir);
    }
    
    public function testGetDir()
    {
        $dir = $this->module->getDir();
        
        $this->assertTrue(is_string($dir));
        $this->assertTrue(is_dir($dir));
    }

    public function testInit()
    {
        $app = new Application();
        $this->module->init($app);
    }

}
