<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('index');
        }

        return view('auth/login');
    }


    public function login_auth()
    {
        $response = ['success' => false, 'message' => [], 'after' => true];
        $in = $this->request->getPost();
        $valid = service('validation');

        $valid->setRule('loginid', 'Full Name', 'required|min_length[3]');
        $valid->setRule('password', 'Phone', "required|min_length[3]");

        if($valid->run($in)){
            $user = $this->mymodel->select_one('*', 'users', "(email_address='".$in['loginid']."' OR phone='".$in['loginid']."') and status=1");

            if($user){
                if($user->login_password === $in['password']){
                    $data = array(
                        'id' => $user->id,
                        'name' => $user->user_name,
                        'dp' => $user->profile_image,
                        'status' => $user->status,
                        'user_type' => $user->role
                    );

                    $this->session->set('lead_crm', $data);
                    $response['success'] = true;
                    $response['reload'] = true;

                }else{
                    $response['message']['password'] = 'Invalid Password. Plz Try Again.';
                }
            }else{
                $response['message']['loginid'] = 'Invalid user. Plz Try Again.';
            }
            
        }else {
            $response['message'] = $valid->getErrors();
        }
        return $this->response->setJSON($response);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/'); 
        }
        return view('auth/register');
    }

    public function save_register()
    {
        $in = $this->request->getPost();
        $valid = service('validation');

        $valid->setRule('name', 'Full Name', 'required|min_length[3]');
        $valid->setRule('email', 'Email', 'required|valid_email|is_unique[register.email_address]');
        $valid->setRule('password', 'Password', 'required|min_length[6]');
        $valid->setRule('conf_password', 'Confirm Password', 'required|matches[password]');

        if ($valid->run($in)) {
            try {
                $data = [
                    'full_name'     => $in['name'], 
                    'email_address' => $in['email'],
                    'password'      => password_hash($in['password'], PASSWORD_DEFAULT), 
                    'confirm_password'      => password_hash($in['password'], PASSWORD_DEFAULT), 
                     
                ];
                $q = $this->mymodel->insert_data('register', $data);

                if ($q) {
                    $this->session->setFlashdata('msg', 'Registration Successful! Please Login.');
                    return redirect()->to('login');
                } else {
                    $this->session->setFlashdata('msg', 'Database Error: Could not register.');
                    return redirect()->to('register');
                }

            } catch (\Exception $e) {
                $this->session->setFlashdata('msg', 'Error: ' . $e->getMessage());
                return redirect()->to('register');
            }
        } else {
            $this->session->setFlashdata('msg', $valid->listErrors());
            return redirect()->to('register');
        }
    }
}