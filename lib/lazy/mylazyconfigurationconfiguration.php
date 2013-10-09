<?php
/**
 * File containing the myConfigurationConfiguration.
 *
 * @version //autogentag//
 * @package ezcDemo
 * @copyright Copyright (c) 2011-2012 Guillaume Kulakowski and contributors
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2.0
 */

/**
 * The myConfigurationConfiguration.
 *
 * @version //autogentag//
 */
class myLazyConfigurationConfiguration implements ezcBaseConfigurationInitializer
{
    public static function configureObject( $cfg )
    {
        $cfg->init( 'ezcConfigurationIniReader', CONFIG_PATH );
    }
} 

?>
