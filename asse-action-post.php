<?php

defined( 'ABSPATH' ) || exit;

Class Asse_Post {

    public function __construct() {
        add_action( 'save_post', array( $this, 'set_post_guid' ) );
        add_action( 'edit_attachment', array( $this, 'set_post_guid' ) );
        add_action( 'add_attachment', array( $this, 'set_post_guid' ) );
    }

    public function set_post_guid( $post_id ) {
        global $wpdb;
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array( 'guid' => $post_id) , $where );

        return $post_id;
    }

}

$asse_post = new Asse_Post();
