<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Order;
use App\Model\Entity\Address;

class OrdersController extends AppController{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function view(){
        $api = new Order;
        if($this->request->is('post')){
            $id = $this->request->getData('id');
            $response = $api->view($id, $this->headers());
            if($response->code === 200){
                $order = $this->request->session()->write('cart', json_decode(json_encode($response->result), true));
                $this->set(['data' => json_decode(json_encode($response->result), true)]);
            }
        }else if($this->request->is('get')){
            $order = $this->request->session()->read('cart');
            if(count($order)===0) $this->redirect(['controller' => 'users', 'action' => 'index']);
            $this->set(['data' => $order]);
        }
    }

    public function checkout(){
        $api = new Address;
        $order = $this->request->session()->read('cart');
        $id = $this->request->session()->read('address');
        $response = $api->view($id, $this->headers());
        $address = $response->address;
        $this->set([
            'data' => $order,
            'address' => $address
        ]);
    }

    public function placed(){
        $api = new Order;
        $response = $api->placed(
            json_encode($this->request->session()->read('cart')), 
            $this->request->session()->read('address'),
            $this->headers()
        );
        $this->redirect(['action' => 'confirmation']);
    }

    public function confirmation()
    {
        $this->request->session()->delete('cart');
        $this->request->session()->delete('address');
    }
}