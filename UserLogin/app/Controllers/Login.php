<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Login extends BaseController
{
    public function __construct() {   
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        return $this->check_login();
    } 

   public function check_login()
    {
      if ($this->session->get('user_id')) {
          header('Location: '.base_url('user/dashboard'));
        }
    }
     
    public function login()
    {
        return view('site/login');
    }

    public function do_login()
    {
        //echo "hello";die;
        if ($this->request->getMethod() == "post") {
            $validation =  \Config\Services::validation();

            $rules = [
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|valid_email|"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required"
                ]
            ];

            if ($this->validate($rules)) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $run = $this->my_model->GetSingleData('user',array('email' =>$email ,'password'=>$password));
                
                if($run)
                {
                    $this->session->set('user_id', $run['id']);
                    $login_id = $this->session->get('user_id');
                    
                    $output['status']=1;
                    $output['redirect']= 'dashboard';
                }
                else 
                {
                    $output['message']='<div class="alert alert-danger">Invaild login Details !</div>';  
                }
            } else {
                    $output['status']= 0 ; 
                    $output["validation"] = $validation->getErrors();
            }
        }
        echo json_encode($output);
    }

   
    
}
?>