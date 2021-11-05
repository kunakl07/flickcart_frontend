<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;

class UsersController extends AppController{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Curl');
        $this->Auth->allow(['login', 'signup', 'index']);
    }

    public function signup() {
        $api = new User;
        $this->viewBuilder()->layout('login');
        if($this->request->is('post')){
            $result = $api->signup($this->request->getData());
            $this->set(['resp' => $result]);
            if($result->message === true){
                $this->Flash->success(__('Sign up successful, please log in'));
                $this->redirect(['action' => 'login']);
            }
            else {
                $this->Flash->error(__('Incorrect username or password'));
            }
        }
    }

    public function login() {
        $api = new User;
        $this->viewBuilder()->layout('login');
        $token = $this->request->session()->read('token');
        if($token){
            $this->redirect($this->referer());
        }
        if($this->referer()=='http://localhost.flickcart.com/signup') {
            $this->set('sign', 'Sign up successful, please login');
        }
        if($this->request->is('post')){
            $result = $api->login($this->request->getData());
            if($result->message === true){
                $this->Auth->setUser($result->token);
                $this->request->session()->write('token', $result->token);
                $this->request->session()->write('user', $result->user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else {
                $this->set('error', 'Incorrect email or password');
            }
        }
    }

    public function profile() {
        $api = new User;
        $result = $api->profile($this->headers());
        $product = $this->Curl->get("productIdType=SZOID&productId=14736444265");
        $this->set(['result' => $result, 'product' => $product[0]]);
    }

    public function index(){
        $token = $this->request->session()->read('token');
        if(!$token)
            $this->viewBuilder()->layout('search');
        $api = new User;
        $response = $api->index($this->headers());
        $this->set(['products' => json_decode(json_encode($response->products), true)]);
    }

    public function logout() {
        $this->request->session()->delete('token');
        $this->request->session()->delete('user');
        $this->request->session()->delete('jwt');
        $this->request->session()->delete('cart');
        $this->request->session()->delete('address');
        $this->Auth->logout();
        return $this->redirect($this->referer());
    }
}
