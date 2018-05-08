<?php

/* 
 * Plugin Name: Server NFO
 * Description: Displays server information for the current WP installation.
 * Version: 1.0
 * 
 * Built for programming challenge 3 from Awesome Motive.
 * Author: Jeff Windhorst
 * Date: 5/7/2018
 */

namespace ServerNFO;

const NAME ='ServerNFO';

const VERSION = '1.0';

const SLUG = 'server-nfo';

const PREFIX = 'SNFO';

const PATH = __DIR__;

add_action('plugins_loaded', function() {
    do_action(SLUG . '-load');
    
    require_once PATH . 'global/index.php';
    
    if(is_admin()) {
        require_once PATH . 'backend/index.php';
    }
    
    if(!is_admin()) {
        require_once PATH . 'frontend/index.php';
    }
    do_action(SLUG . '-loaded');
});
