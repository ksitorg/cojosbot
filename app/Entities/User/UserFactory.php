<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 17.06.2016
 * Time: 00:55
 */

namespace App\Entity;


/**
 * Class UserFactory
 * @package App\Entity
 */
class UserFactory
{

    /**
     * @param int $id telegram user id
     * @return User
     */
    public static function create($id)
    {
        return new User($id);
    }
}