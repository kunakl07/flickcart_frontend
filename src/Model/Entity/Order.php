<?php
namespace App\Model\Entity;

use App\Model\Entity\App;

class Order extends Api{
    public $route = "products";

    function view($id, $headers){
        return $this->getWithHeaders("$this->route/view/$id.json", $headers);
    }

    function placed($order, $address, $headers) {
        return $this->postWithHeaders("$this->route/order.json", "order=$order&address=$address", $headers);
    }
}
