<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.11.2020
 * Time: 22:22
 */

namespace App\Entity;


class Place implements \JsonSerializable
{
    private $id;
    private $x;
    private $y;
    private $width;
    private $height;
    private $is_available;

    /**
     * Place constructor.
     * @param $id
     * @param $x
     * @param $y
     * @param $width
     * @param $height
     * @param $is_available
     */
    public function __construct(int $id, float $x, float $y,float $width,float $height, bool $is_available )
    {
        $this->id=$id;
        $this->x=$x;
        $this->y=$y;
        $this->width=$width;
        $this->height=$height;
        $this->is_available=$is_available;
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
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getisAvailable()
    {
        return $this->is_available;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'x' => $this->getX(),
            'y' => $this->getY(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'isAvailable' => $this->getisAvailable(),
        ];

    }
}