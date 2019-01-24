<?php
/**
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1/23/2019
 * Time: 9:23 PM
 */

interface IEntity
{
    /**
     * @return array
     */
    function to_json_array();
}