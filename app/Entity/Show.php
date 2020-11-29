<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 17:07
 */

namespace App\Entity;


use JsonSerializable;

class Show implements JsonSerializable
{
    private $id;
    private $name;

    /**
     * Show constructor.
     * @param $id
     * @param $name
     */
    public function __construct( $id, $name )
    {
        $this->id=$id;
        $this->name=$name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function jsonSerialize() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }

}