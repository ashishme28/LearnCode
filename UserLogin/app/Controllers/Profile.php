<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Profile extends BaseController
{
    public function __construct() {   
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->user_id = $this->session->get('user_id');
        return $this->check_login();

    } 

   public function check_login()
    {
      if (!$this->session->get('user_id')) {
        header('Location: '.base_url('user/login'));
        exit();
        
      }
    }

    public function index()
    {
        $data['user'] = $this->my_model->GetSingleData('user',array('id'=>$this->user_id));
        return view('site/profile',$data);  
    }
    
    public function chat()
    {

        $where = "id!= ".$this->user_id." ";
        $data['users'] = $this->my_model->GetAllData('user',$where,'id','desc');

        return view('site/chat',$data);  
    } 

    public function update_user()
    {
        $this->validation->setRule('name','name','trim|required');
        $this->validation->setRule('phone','phone','trim|required');
        $this->validation->setRule('address','address','trim|required');
       
        if($this->validation->withRequest($this->request)->run()){
            
            $id = $this->request->getVar('id');
            $insert['name'] = $this->request->getVar('name');
            $insert['phone'] = $this->request->getVar('phone');
            $insert['address'] = $this->request->getVar('address');
            $insert['created_at'] = date('Y-m-d H:i:s');
             if(isset($_FILES['profile_image']['name'])){
                $name_arr = explode('.',$_FILES['profile_image']['name']);
                $ext = end($name_arr);
                $newName = rand().time().'.'.$ext;
                $path = 'assets/uploads/'.$newName;

                if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $path)){
                    $insert['profile_image'] = $path;                    
                }

            }
            $run = $this->my_model->UpdateData('user',array('id'=>$id),$insert);

            if($run){
                $this->session->setFlashdata('msg', '<div class="alert alert-success">Your profile has been updated successfully.</div>');
                $response['status'] = 1;
                $response['message'] = 'Your profile has been updated successfully.';
            }else{
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
?>