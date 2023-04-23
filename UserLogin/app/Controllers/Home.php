<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['product'] = $this->my_model->GetAllData('product','','id','desc');
        return view('site/product',$data);
    }

    public function signup()
    {
        return view('site/signup');
    }

    public function add_User()
    {
        $this->validation->setRule('name','name','trim|required');
        $this->validation->setRule('email','email','trim|required');
        $this->validation->setRule('password','password','trim|required');
        $this->validation->setRule('phone','phone','trim|required');
        $this->validation->setRule('address','address','trim|required');

        if($this->validation->withRequest($this->request)->run()){
            $insert['name'] = $this->request->getVar('name');
            $insert['email'] = $this->request->getVar('email');
            $insert['password'] = $this->request->getVar('password');
            $insert['phone'] = $this->request->getVar('phone');
            $insert['address'] = $this->request->getVar('address');

            if(isset($_FILES['profile_image']['name'])){
                $name_arr = explode('.',$_FILES['profile_image']['name']);
                $ext = end($name_arr);
                $newName = rand().time().'.'.$ext;
                $path = 'assets/uploads/'.$newName;

                if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $path)){
                    $insert['profile_image'] = $path;                    
                }

            }
            
            $run = $this->my_model->InsertData('user',$insert);

            if($run){
                $this->session->setFlashdata('msg', '<div class="alert alert-success">Your account has been created successfully.</div>');
                $response['status'] = 1;
                $response['message'] = 'Your account has been created successfully.';
            }else{
                $this->session->setFlashdata('msg', '<div class="alert alert-success">Something went wrong.</div>');
                $response['status'] = 0;
                $response['message'] = 'Something went wrong.'; 
            }
        }else{
            $response['status'] = 0;
            $response['message'] = $this->validation->getErrors();
        }

        echo json_encode($response);
    }

}
