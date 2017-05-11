<?php
/**
 * Created by PhpStorm.
 * User: Andrius.Ukelis
 * Date: 5/9/2017
 * Time: 5:06 PM
 */

namespace AndriusUkelis\PostCodesLT;


class PostCodeResolver
{
    public function resolve($address){
        $process = \curl_init('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&language=lt&sensor=false');
        \curl_setopt($process, CURLOPT_TIMEOUT, 30);
        \curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
        $return = \curl_exec($process);
        \curl_close($process);
        return self::Parse($return);
    }

    public function getPostalCodes($address){
        /**
         * @var PostCodeResolverResult[] $parsed
         */
        $parsed = $this->resolve($address);
        $postalCodes = [];
        foreach ($parsed as $item){
            $postalCode = "";
            /**
             * @var AddressComponent $addressComponent
             */
            foreach ($item->getAddressComponents() as $addressComponent){
                $key = in_array("postal_code", $addressComponent->getTypes());
                if($key != null){
                    $postalCode = $addressComponent->getLongName();
                }
            }

            $postalCodes[] = [
                'formatted_address' => $item->getFormattedAddress(),
                'postal_code' => $postalCode
            ];
        }
        return $postalCodes;
    }

    public static function Parse($json){
        $object = json_decode($json);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException('json_decode error: ' . json_last_error_msg());
        }

        $toReturn = [];
        $results = $object->results;

        foreach ($results as $result){
            $components = [];
            foreach ($result->address_components as $address_component){
                $components[] = new AddressComponent($address_component->long_name, $address_component->short_name, $address_component->types);
            }


            $toReturn[] = new PostCodeResolverResult($object->status, $components, $result->formatted_address, $result->geometry, $result->place_id, $result->types);
        }
        return $toReturn;
    }
}
