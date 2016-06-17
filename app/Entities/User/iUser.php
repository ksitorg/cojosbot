<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 16.06.2016
 * Time: 22:28
 */

namespace App\Entity;

/**
 * Interface iUser
 * @package App\Entity
 */
interface iUser
{
    /**
     * iUser constructor.
     * @param int $id telegram user id
     * @return iUser
     */
    public function __construct($id);

    /**
     * @return int telegram user id
     */
    public function getId();

    /**
     * @return string user name
     */
    public function getName();

    /**
     * @param string $name user name
     * @return iUser
     */
    public function setName($name);

    /**
     * @return double pinto size in cm
     */
    public function getPintoSize();

    /**
     * @param double $size pinto size in cm
     * @return iUser
     */
    public function setPintoSize($size);
}