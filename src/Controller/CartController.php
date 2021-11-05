<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Cart;

class CartController extends AppController{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function view() {
        $api = new Cart;
        $response = $api->view($this->headers());
        $cart = json_decode(json_encode($response->cart->products), true);
        $this->request->session()->write('cart', $cart);
        $this->set(['cart' => json_decode(json_encode($cart), true)]);
    }

    public function add(){
        $api = new Cart;
        $id = $this->request->getData('id');
        $response = $api->add($id, $this->headers());
        $response = json_decode(json_encode($response));
        if($response->code ===200){
            $this->redirect(['action' => 'index']);
        }
    }

    public function delete($id) {
        if($this->request->is('post')){
            $api = new Cart;
            $response = $api->delete($id, $this->headers());
            if($response->code ===200){
                $this->redirect($this->referer());
            }
        }
    }
}