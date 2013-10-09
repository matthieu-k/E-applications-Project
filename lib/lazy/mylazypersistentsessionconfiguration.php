<?php
/**
 * File containing the myLazyPersistentSessionConfiguration.
 *
 * @version //autogentag//
 * @package ezcDemo
 * @copyright Copyright (c) 2011-2012 Guillaume Kulakowski and contributors
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2.0
 */

/**
 * The myLazyPersistentSessionConfiguration.
 *
 * @version //autogentag//
 */
class myLazyPersistentSessionConfiguration implements ezcBaseConfigurationInitializer
{
    public static function configureObject( $instance )
    {
        switch ( $instance )
        {
            default:
                $session = new ezcPersistentSession(
                    ezcDbInstance::get( $instance ),
                    new ezcPersistentCodeManager( MAPPING_PATH )
                );
        }
        return $session;
    }
} 

?>
