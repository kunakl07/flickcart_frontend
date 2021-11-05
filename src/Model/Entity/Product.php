<?php
namespace App\Model\Entity;

use App\Model\Entity\App;

class Product extends Api{
    public $route = "products";

    function search($query, $start, $headers){
        return $this->getWithHeaders("$this->route/search/$query.json?start=$start", $headers);
    }

    function view($id, $headers){
        return $this->getWithHeaders("$this->route/view/$id.json", $headers);
    }

    function comment($id, $comment, $headers) {
        return $this->postWithHeaders("$this->route/comment.json", "id=$id&text=$comment", $headers);
    }
}
