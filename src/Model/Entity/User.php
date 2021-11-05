<?php
namespace App\Model\Entity;

use App\Model\Entity\App;

class User extends Api{
    public $route="users";

    function signup($data) {
        return $this->post("$this->route/signup.json", $data);
    }

    function login($data) {
        return $this->post("$this->route/login.json", $data);
    }

    function profile($headers){
        return $this->getWithHeaders("$this->route/profile.json", $headers);
    }

    function index($headers){
        return $this->getWithHeaders("$this->route.json", $headers);
    }
}
