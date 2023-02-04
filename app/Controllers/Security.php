<?php namespace App\Controllers;

use Modules\UserManagement\Models as UserManagement;
use Modules\Maintenance\Models as Maintenance;
use App\Controllers\SendMail as SendMail;

class Security extends BaseController {

    function __construct(){
        helper(['form','link']);
        $this->usersModel = new UserManagement\UsersModel();
        $this->rolePermissionsModel = new UserManagement\RolesPermissionsModel();
        $this->email = \Config\Services::email();
    }

    public function index(){
        if(empty(session()->get('isLoggedIn'))) {
            $data = [
                'page_title' => 'DTS | Login',
                'title' => 'Detect Tracker System',
            ];
            helper(['form']);
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'username' => 'required|min_length[5]|max_length[25]',
                    'password' => 'required|min_length[8]|max_length[50]|validateUser[username,password]',
                ];
                $errors = [
                    'password' => [ 
                        'validateUser' => 'Username or Password don\'t match.'
                    ]
                ];

                if (!$this->validate($rules, $errors)) {
                    $data['validation'] = $this->validator;
                } else {

                    $user = $this->usersModel->getDetails(['users.username'=>$this->request->getVar('username'),'users.status'=>'a'])[0];

                    $this->setUserMethod($user);
                    $this->session->setFlashdata('success_login', 'Successfully logged in!');

                    return redirect()->to(session()->get('landing_page'));

                }
            }

            return view('Login/login', $data);
        }else{
            return redirect()->to(session()->get('landing_page'));
        }
    }

    private function setUserMethod($user) {
        $data = [
            'id' => $user['id'],
            'role_id' => $user['role_id'],
            'role_name' => $user['role_name'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'last_name' => $user['last_name'], 
            'username' => $user['username'], 
            'email_address' => $user['email_address'],
            'landing_page' => $user['slug'],
            'isLoggedIn' => true,
            'permissions' => $this->rolePermissionsModel->getPermissions(['role_permissions.role_id' => $user['role_id']]),
            'modules' => $this->rolePermissionsModel->getModules(['role_permissions.role_id' => $user['role_id']]),
        ];
        session()->set($data);
        return true;
    }

    public function fileNotFound($slugs) {
		$data['view'] = 'errors/error_403';
		$data['slugs'] = $slugs;
        $data['page_title'] = 'DTS | 403!';
        return view('templates/index',$data);
	}

    public function signOut() {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}