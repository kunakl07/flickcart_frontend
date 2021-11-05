<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Product;

class ProductsController extends AppController{
    
    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['search', 'view']);
    }

    public function search() {
        $api = new Product;
        $token = $this->request->session()->read('token');
        if(!$token){
            $this->viewBuilder()->layout('search');
        }
        if($this->request->is('get')){
            $query = $this->request->query('q');
            $query = preg_replace('/\s+/', '%2B', $query);
            $start = $this->request->query('start');
            $header = $this->headers();
            $user = $this->request->session()->read('user')->user_id;
            array_push($header, "id: $user");
            $response = $api->search($query, $start, $header);
            $this->set(['result' => $response]);
            if($response->code === 200){
                $this->set([
                    'data' => json_decode(json_encode($response->result), true),
                ]);
            } 
            else
                    $this->set('code', 404);
        }
    }

    public function view($id) {
        $api = new Product;
        $token= $this->request->session()->read('token');
        if(!$token){
            $this->viewBuilder()->layout('search');
        }
        $header = $this->headers();
        $user = $this->request->session()->read('user')->user_id;
        array_push($header, "id: $user"); 
        $response = $api->search($query, $start, $header);
        $response = $api->view($id, $header);
        if($response->code === 200){
            $this->set([
                'exists' => $response->exists,
                'data' => json_decode(json_encode($response->result), true),
                'comments' => json_decode(json_encode($response->comments), true),
            ]);
        }
        else
            $this->set('code', 404);
    }

    public function comment() {
        $api = new Product;
        $this->autoRender = false;
        $id = $this->request->getData('id');
        $comment = $this->request->getData('comment');
        $response = $api->comment($id, $comment, $this->headers());
        if($response->code===200) $this->redirect("/product/$id");
    }
}