<?php
/**
 * File containing the index.php.
 *
 * @version //autogentag//
 * @package ezcDemo
 * @copyright Copyright (c) 2011-2012 Guillaume Kulakowski and contributors
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2.0
 */

/*
 * Define all paths
 */
// ROOT application path
define( 'ROOT_PATH', dirname( __FILE__ ) );

// Cache path /!\ make sure than cache has 777 chmod /!\
define( 'CACHE_PATH', ROOT_PATH . '/cache' );

// Config
define( 'CONFIG_PATH', ROOT_PATH . '/lib/config/' );

// Mapping
define( 'MAPPING_PATH', ROOT_PATH . '/lib/persistentobjectmapping/' );

// Template cache
define( 'TPL_PATH', ROOT_PATH . '/templates' );

// Path to ezc bootstrap.php
define( 'EZC_BOOTSTRAP', ROOT_PATH . '/ezc/Base/src/ezc_bootstrap.php' );


/*
 * Define php
 */
date_default_timezone_set( 'Europe/Paris' );


/*
 * Test cache folder
 */
if ( !is_writable( CACHE_PATH ) )
{
    trigger_error( 'Cache folder "' . CACHE_PATH . '" is not writable by apache user. Run "chmod -R 777 ' . CACHE_PATH . '".', E_USER_ERROR );
}

/*
 * Load eZ Components
 */
if ( !@include EZC_BOOTSTRAP )
{
    trigger_error( 'Bad path for eZ Components bootstrap "' . EZC_BOOTSTRAP .'". Is what the ezC are in the directory ezc ?', E_USER_ERROR );
}


/*
 * Add the class repository containing our application's classes. We store
 * those in the /lib directory and the classes have the "hello" prefix.
 */
ezcBase::addClassRepository( dirname( __FILE__ ) . '/lib' );

/*
 * Configure the template system by telling it where to find templates, and
 * where to put the compiled templates.
 */
$tc = ezcTemplateConfiguration::getInstance();
$tc->templatePath = dirname( __FILE__ ) . '/templates';
$tc->compilePath = dirname( __FILE__ ) . '/cache';

/*
 * Add lazy
 */
ezcBaseInit::setCallback(
    'ezcInitConfigurationManager',
    'myLazyConfigurationConfiguration'
); 
ezcBaseInit::setCallback(
    'ezcInitDatabaseInstance',
    'myLazyDatabaseConfiguration'
);

ezcBaseInit::setCallback(
    'ezcInitPersistentSessionInstance',
    'myLazyPersistentSessionConfiguration'
);

?>
