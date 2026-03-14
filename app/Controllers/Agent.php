<?php

namespace App\Controllers;

class Agent extends BaseController
{

    public function users()
    {
        $data['users'] = $this->mymodel->select_data('users');
        return view('agent/users', $data);
    }
    
 
    public function save_user()
    {
        $response = ['success' => false, 'message' => [], 'before' => true];
        $in = $this->request->getPost();
        $valid = service('validation');

        // Validation 
        $valid->setRule('name', 'Name', 'required|min_length[3]');
        $valid->setRule('email', 'Email', 'required|valid_email|is_unique[users.email_address]');
        $valid->setRule('phone', 'Phone', 'required|numeric|min_length[10]');
        $valid->setRule('password', 'Password', 'required|min_length[6]');
        $valid->setRule('role', 'Role', 'required');

        if ($valid->run($in)) {
            $this->db->transBegin();
            try {

                //Image
                // $imgName = null; 
                // $file = $this->request->getFile('profile_image');
                // if ($file && $file->isValid() && !$file->hasMoved()) {
                //     $imgName = $file->getRandomName(); 
                //     $file->move('uploads/users/', $imgName); 
                // }
              
                $data = [
                    'user_name'     => $in['name'],        
                    'email_address' => $in['email'],       
                    'phone'         => $in['phone'],      
                    'role'          => $in['role'],     
                    // 'status'        => 'Active',         
                    // 'password'      => password_hash($in['password'], PASSWORD_DEFAULT) 
                    // 'profile_image' => $in['imgName']
                ];

                $q = $this->mymodel->insert_data('users', $data);

                if ($q) {
                    $this->db->transCommit();
                    $response['success'] = true;
                    $response['rlink'] = base_url('users'); 
                    $response['message'] = 'User added successfully';
                } else {
                    $this->db->transRollback();
                    $response['message']['name'] = 'Error In Data Inster';
                }
            } catch (\Exception $e) {
                $this->db->transRollback();
                $response['message']['name'] = $e->getMessage();
            }
        } else {
            $response['message'] = $valid->getErrors();
        }
        
        return $this->response->setJSON($response);
    }


    public function user_profile($id)
    {
        $result = $this->mymodel->select_data('users', ['id' => $id]);

        if (empty($result)) {
            return redirect()->to('users'); 
        }
        $data['user'] = $result[0]; 
        return view('agent/user_profile', $data);
    }

    public function update_user(){
        $response = ['success' => false, 'message' => [], 'before' => true];
        $in = $this->request->getPost();
        $valid = service('validation');

        $valid->setRule('name', 'Full Name', 'required|min_length[3]');
        $valid->setRule('phone', 'Phone', "required|numeric|min_length[10]");
        $valid->setRule('email', 'Email', 'permit_empty|valid_email');
       

        if($valid->run($in)){
            try{
        
                $data = [
                    'user_name' =>$in['name'],
                    'email_address' => $in['email'],
                    'phone' => $in['phone'],
                ];
                $q = $this->mymodel->update_data('users', $data, ['id' => $in['user_id']]);
                if ($q) {
                    $response['success'] = true;
                    $response['message'] = 'User updated successfully';
                    $response['rlink'] = base_url('user'); 
                } else {
                    $response['message']['name'] = 'Database Error: Could not update';
                }
            }catch (\Exception $e) {
                $response['message']['name'] = $e->getMessage();
            }
        }else {
            $response['message'] = $valid->getErrors();
        }
        return $this->response->setJSON($response);
    }

    public function agent_report()
    {
        return view('agent/agent_report');
    }  
    
    public function source_report()
    {
        return view('report/source_report');
    }  

    public function roles()
    {
        return view('agent/roles');
    }  
}