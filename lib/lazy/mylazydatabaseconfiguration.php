<?php
/**
 * File containing the myLazyDatabaseConfiguration.
 *
 * @version //autogentag//
 * @package ezcDemo
 * @copyright Copyright (c) 2011-2012 Guillaume Kulakowski and contributors
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2.0
 */

/**
 * The myLazyDatabaseConfiguration.
 *
 * @version //autogentag//
 */
class myLazyDatabaseConfiguration implements ezcBaseConfigurationInitializer
{
    public static function configureObject( $instance )
    {
        switch ( $instance )
        {
            default: // Default instance
                $cfg = ezcConfigurationManager::getInstance();
                $dbSettings = $cfg->getSettingsInGroup( 'mysql', 'MySQLSettings' ); 
                return ezcDbFactory::create( "mysql://${dbSettings['User']}:${dbSettings['Password']}@${dbSettings['Host']}/${dbSettings['Database']}" );
        } 
    }
} 

?>
