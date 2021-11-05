<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class CurlComponent extends Component{

    public function get($extension) {
        $jwt = $this->request->session()->read('jwt');
        $id = $this->request->session()->read('id');
        $url = 'http://localhost/api.flickcart';
        $ch = curl_init();
        $curlheader = array();
        $options = array(
            CURLOPT_URL =>"$url/$extension",
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array($ch, $options);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output);
    }

    public function post($extension, $values) {
        $url = 'http://localhost/api.flickcart';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL =>"$url/$extension",
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $values,
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array($ch, $options);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output);
    }

    public function getWithHeaders($extension) {
        $jwt = $this->request->session()->read('jwt');
        $id = $this->request->session()->read('id');
        $url = 'http://localhost/api.flickcart';
        $ch = curl_init();
        $curlheader = array();
        $options = array(
            CURLOPT_URL =>"$url/$extension",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array("Authorization: Bearer ".$jwt->token, "id: $id")
        );
        curl_setopt_array($ch, $options);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output);
    }

    public function postWithHeaders($extension, $values) {
        $jwt = $this->request->session()->read('jwt');
        $id = $this->request->session()->read('id');
        $url = 'http://localhost/api.flickcart';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL =>"$url/$extension",
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $values,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array("Authorization: Bearer ".$jwt->token, "id: $id")
        );
        curl_setopt_array($ch, $options);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output);
    }
}