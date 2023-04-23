<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Dashboard extends BaseController
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
        return view('site/dashboard');  
    }
    
    public function chat()
    {

        $where = "id!= ".$this->user_id." ";
        $data['users'] = $this->my_model->GetAllData('user',$where,'id','desc');

        return view('site/chat',$data);  
    } 

    public function add_chat()
    {
        $this->validation->setRule('message','message','trim|required');

        if($this->validation->withRequest($this->request)->run()){
            $insert['sender_id'] = $this->user_id;
            $insert['receiver_id'] = $this->request->getVar('receiver_id');
            $insert['message'] = $this->request->getVar('message');
            $insert['created_at'] = date('Y-m-d H:i:s');
            
            $run = $this->my_model->InsertData('chat',$insert);

            if($run){
                $response['status'] = 1;
                $response['message'] = 'Your account has been created successfully.';
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

    public function get_chat()
    {
        //echo "hello get chat";
        $sender_id = $this->user_id;
        $receiver_id = $this->request->getVar('receiver_id');
        $senderData = $this->my_model->GetSingleData('user',array('id'=>$sender_id ));
        $receiverData = $this->my_model->GetSingleData('user',array('id'=>$receiver_id));
        $where = "(sender_id = ".$sender_id." and  receiver_id = ".$receiver_id.") or (receiver_id = ".$sender_id." and  sender_id = ".$receiver_id.")";
        $chat = $this->my_model->GetAllData('chat',$where,'id','asc');

        $update['is_read'] = 1;
        $where1 ="sender_id = ".$receiver_id." and receiver_id = ".$this->user_id." ";
        $this->my_model->UpdateData('chat',$where,$update);


        $html = '';
        foreach ($chat as $key => $chatV) {

            if($chatV['sender_id'] == $this->user_id)
            {
                
                $html .= '<div class="chat_container">
                      <img src="'.base_url($senderData['profile_image']).'" style="height: 40px;width:40px;border-radius: 50%;">
                      <p>'.$chatV['message'].'</p>
                      <span class="time-right">'.date('g:i a',strtotime($chatV['created_at'])).'</span>
                    </div>';
                }
            if($chatV['receiver_id'] == $this->user_id)
            {
                
                $html .= '<div class="chat_container">
                      <img src="'.base_url($receiverData['profile_image']).'" style="height: 40px;width:40px;border-radius: 50%;" class="right">
                      <p>'.$chatV['message'].'</p>
                      <span class="time-left">'.date('g:i a',strtotime($chatV['created_at'])).'</span>
                    </div>';
            }
        }
        /**/

        $response['status'] = 1;
        $response['html'] = $html;
        
        echo json_encode($response); 
    }

    public function logout()
    {
        $this->session->remove('user_id');
        $this->session->setFlashdata('msg','<div class="alert alert-success">You have been Logged out successfully.</div>');
        return redirect('user/login');
    }
    
    
}
?>