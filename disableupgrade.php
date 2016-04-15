<?php
/*
 Plugin Name: Disable Upgrade
*/

add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );