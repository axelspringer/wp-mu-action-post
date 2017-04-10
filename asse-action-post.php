<?php

// @codingStandardsIgnoreFile

use Asse\Plugin\AsseHelpers\HelperFactory;

/**
 * Sets the GUID after post was imported.
 *
 * @wp-hook save_post
 * @wp-hook edit_attachment
 * @wp-hook add_attachment
 * @param $postId
 * @return mixed
 */
function setPostGuid($postId)
{
    global $wpdb;
    $where = array('ID' => $postId);
    $wpdb->update($wpdb->posts, array('guid' => $postId), $where);

    return $postId;
}
add_action('save_post', 'setPostGuid');
add_action('edit_attachment', 'setPostGuid');
add_action('add_attachment', 'setPostGuid');
