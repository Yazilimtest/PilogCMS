<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 16:07
 */

/**
 * Get gravatar url by email
 * @param $email
 * @return string
 */
function gratavarUrl($email) {

    return "http://www.gravatar.com/avatar/" . md5($email) . "?s=100";
}