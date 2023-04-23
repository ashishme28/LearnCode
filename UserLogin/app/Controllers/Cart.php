<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Cart extends BaseController
{
    public function __construct() {   
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->user_id = $this->session->get('user_id');
        return $this->check_login();

    } 

    public function check_login(){
      if (!$this->session->get('user_id')) {
        header('Location: '.base_url('user/login'));
        exit();
        
      }
    }

    public function addcart(){
        $insert['user_id'] = $this->user_id;
        $insert['product_id'] = $this->request->getVar('id');
        $insert['date'] = date('Y-m-d');
        $insert['time'] = strtotime('now');
        $insert['status'] = 0;
        $insert['created_at'] = date('Y-m-d H:i:s');
        
        $run = $this->my_model->InsertData('cart',$insert);

        if($run){
            $response['status'] = 1;
            //$response['message'] = 'Your account has been created successfully.';
        }else{
            $response['status'] = 0;
            //$response['message'] = 'Something went wrong.'; 
        }
    

        echo json_encode($response);
    }

    public function cart_view()
    {
        $update['status'] = 1;
        $this->my_model->UpdateData('cart',array('user_id'=>$this->user_id),$update);
        $data['cart'] = $this->my_model->GetAllData('cart',array('user_id'=>$this->user_id));
        return view('site/cart_view',$data);
    }
    
    
}
?>