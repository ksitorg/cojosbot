<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 16.06.2016
 * Time: 22:24
 */

namespace App\Entity;


class User extends RedisEntity implements iUser
{
    private $id;
    private $name = 'name';
    private $pintoSize = 'pinto';

    /**
     * iUser constructor.
     * @param int $id telegram user id
     * @return iUser
     */
    public function __construct($id)
    {
        parent::__construct(['user',$id]);
    }

    /**
     * @return string user name
     */
    public function getName()
    {
        return $this->get($this->name);
    }

    /**
     * @param string $name user name
     * @return iUser
     */
    public function setName($username)
    {
        $this->set($this->name,$username);
        return $this;
    }

    /**
     * @return float pinto size in cm
     */
    public function getPintoSize()
    {
        return $this->get($this->pintoSize);
    }

    /**
     * @param double $size pinto size in cm
     * @return iUser
     */
    public function setPintoSize($size)
    {
        $this->set($this->pintoSize,$size);
        return $this;
    }

    /**
     * @return int telegram user id
     */
    public function getId()
    {
        return $this->id;
    }
}