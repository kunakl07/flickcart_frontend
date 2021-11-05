<?php

namespace App\Model\Entity;
use App\Model\Entity\App;

class Cart extends Api{
    public $route="carts";

    function view($headers){
        return $this->getWithHeaders("$this->route/view.json", $headers);
    }

    function add($id, $headers){
        return $this->postWithHeaders("$this->route/add/$id.json", "", $headers);
    }

    function delete($id, $headers){
        return $this->postWithHeaders("$this->route/delete/$id.json", "", $headers);
    }
}
