<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Address;

class AddressesController extends AppController{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function view() {
        if($this->request->is('get')){
            $api = new Address;
            $response = $api->index($this->headers());
            $this->set('addresses', json_decode(json_encode($response->addresses), true));
        }
    }

    public function add(){
        if($this->request->is('post')){
            $api = new Address;
            $response = $api->add($this->request->getData('address'), $this->headers());
            if($response->code===200){
                $this->redirect(['action'=>'view']);
            }else{
                return $this->redirect($this->referer());
            }
        }
    }

    public function select(){
        if($this->request->is('post')) {
            if(!$this->request->getData('id')) return $this->redirect($this->referer());
            $this->request->session()->write('address', $this->request->getData('id'));
            $this->redirect(['controller'=>'Orders', 'action' => 'checkout']);
        }
    }
}