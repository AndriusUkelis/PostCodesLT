<?php
/**
 * Created by PhpStorm.
 * User: Andrius.Ukelis
 * Date: 5/9/2017
 * Time: 5:06 PM
 */

namespace AndriusUkelis\PostCodesLT;


class PostCodeResolverResult
{
    private $status;
    private $address_components;
    private $formatted_address;
    private $geometry;
    private $place_id;
    private $types;

    /**
     * PostCodeResolverResult constructor.
     * @param $status
     * @param $address_components
     * @param $formatted_address
     * @param $geometry
     * @param $place_id
     * @param $types
     */
    public function __construct($status = null, $address_components = null, $formatted_address = null, $geometry = null, $place_id = null, $types = null)
    {
        $this->status = $status;
        $this->address_components = $address_components;
        $this->formatted_address = $formatted_address;
        $this->geometry = $geometry;
        $this->place_id = $place_id;
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getAddressComponents()
    {
        return $this->address_components;
    }

    /**
     * @return mixed
     */
    public function getFormattedAddress()
    {
        return $this->formatted_address;
    }

    /**
     * @return mixed
     */
    public function getGeometry()
    {
        return $this->geometry;
    }

    /**
     * @return mixed
     */
    public function getPlaceId()
    {
        return $this->place_id;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }
}
