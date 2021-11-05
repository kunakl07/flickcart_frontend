<?php
namespace App\Model\Entity;

use App\Model\Entity\App;

class Address extends Api{
    public $route = "addresses";

    function index($headers){
        return $this->getWithHeaders('addresses/index.json', $headers);
    }

    function view($id, $headers){
        return $this->getWithHeaders("$this->route/view/$id.json", $headers);
    }

    function add($address, $headers){
        return $this->postWithHeaders('addresses/add.json', "address=$address", $headers);
    }
}
