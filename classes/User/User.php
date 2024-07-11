<?php

/**
 * AjaxMerakiBlocks\User Class
 *
 * This class is responsible for managing user-related operations in a WordPress environment, including
 * retrieving the user ID, fetching user metadata, and more.
 *
 * @package AjaxMerakiBlocks
 * @since   1.0.0
 */

namespace User;

/**
 * This class represents the process of saving data in the Wordpress database.
 */
if(! class_exists('User\User')){
    class User {

         /**
         * The ID of the current user.
         *
         * @var int
         */
        public $id;

        /**
         * User constructor.
         *
         * Initializes the User object and retrieves the current user's ID.
         */
        function __construct(){
            $this->id = get_current_user_id();
        }

        /**
         * Get the current user's ID.
         *
         * @return int The current user's ID.
         */
        function get_id() {
            return $this->id;
        }

        /**
         * Get user metadata for a specific meta key.
         *
         * @param string $meta_key The user meta key for which you want to retrieve the value.
         * @return mixed The value of the specified user meta key.
         */
        function get_user_metadata_by_meta_key($meta_key) {
            $user_meta = get_user_meta($this->id, $meta_key, true);
            return $user_meta;
        }

        function get_user() {
            $current_user = wp_get_current_user();
            return $current_user;
        }

        function get_user_email() {
            $current_user = wp_get_current_user();
            $email = $current_user->user_email;
            return $email;
        }

        function get_user_roles() {
            $current_user = wp_get_current_user();
            $roles = $current_user->roles;
            return $roles;
        }

    }
}