<?php
/**
 * Created by PhpStorm.
 * User: Andrius.Ukelis
 * Date: 5/9/2017
 * Time: 5:06 PM
 */

namespace AndriusUkelis\PostCodesLT;


class AddressComponent
{
    private $long_name;
    private $short_name;
    private $types;

    /**
     * AddressComponent constructor.
     * @param $long_name
     * @param $short_name
     * @param $types
     */
    public function __construct($long_name = null, $short_name = null, $types = null)
    {
        $this->long_name = $long_name;
        $this->short_name = $short_name;
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getLongName()
    {
        return $this->long_name;
    }

    /**
     * @return mixed
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }
}
