<?php

namespace Tasty\Util;

/**
 * Responsible for initialization common to different requests
 */

class Startup {
    
    public const VIEWS_PATH = 'resources/views/';
    public const CSS_PATH = 'resources/css/';
    public const IMG_PATH = 'resources/images/';
    
    
    private function __construct(){}
    
    /**
     * Performs all initialization that must be done before request handling starts
     */
    public static function initRequest() {
        
        # Suppress error reporting
        error_reporting(E_ALL & ~E_NOTICE);

        # Start session
        session_start();   
        
        self::createClassLoader();
    }
    
    private static function createClassLoader() {
        spl_autoload_register(function($className) {
            require_once 'classes/' . \str_replace('\\', '/', $className) . '.php';
        });
    }
}

