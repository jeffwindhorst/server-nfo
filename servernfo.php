<?php
namespace ServerNFO;

if ( ! defined( '\ABSPATH' ) ) { exit; }

/* 
 * Plugin Name: Server NFO
 * Description: Displays server information for the current WP installation.
 * Version: 1.0
 * 
 * Built for programming challenge 3 from Awesome Motive.
 * Author: Jeff Windhorst
 * Date: 5/7/2018
 */

const NAME ='ServerNFO';

const VERSION = '1.0';

const SLUG = 'server-nfo';

const PREFIX = 'SNFO';

const PATH = __DIR__;

add_action('plugins_loaded', function() {
    do_action(SLUG . '-load');
    
    require_once PATH . 'global/index.php';
    
    if(is_admin()) {
        require_once PATH . 'admin/class/ServerNFOManager.php';
        require_once PATH . 'admin/class/MysqlManager.php';
        require_once PATH . 'admin/class/PhpManager.php';
        require_once PATH . 'admin/class/StorageManager.php';
    }
    
    do_action(SLUG . '-loaded');
});

register_activation_hook(__FILE__, function(){
    
    require_once PATH . '/admin/inc/class/ServerNFOManager.php';
    \ServerNFO\admin\activation();
    
    register_uninstall_hook(__FILE__, function(){
       admin\uninstall();
    });
});

register_deactivation_hook(__DIR__, function(){
    admin\deactivate();
});

