<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	
	public function index()
	{
		return view('auths/login');
	}

	// set to register
	public function signup()
	{
		return view('auths/register');
	}
	
	public function loginAccount()
	{
		helper(['form']);
		$data = [];
		// do the validation
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|alpha_numeric_punct|validateUser[email,password]'
			];
			$error = [
				'password' => [
					'validateUser' => 'password not match!'
				]
			];
			$email = $this->request->getVar('email');
			if(!$this->validate($rules,$error)){
				$data['message'] = $this->validator;
				return view('auths/login',$data);
			}else{
				$model = new UserModel();
				$user = $model->where('email',$email)->first();
							 
				$this->setUserSession($user);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/pizza');
			}

		}
		
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'address' => $user['address'],
			'password' => $user['password'],
			'email' => $user['email'],
			'role' => $user['role']
		];

		session()->set($data);
		return true;
	}	

	public function registerAccount()
	{
		$data = [];
		helper(['form']);
		// validation form register
		if($this->request->getMethod() == "post"){
			$rules = [
				'email'=>'required|valid_email',
				'password'=>'required|alpha_numeric_punct',
			];
			 if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return view('auths/register',$data);

			}else{
				$userModel = new UserModel();
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$role = $this->request->getVar('checkUser');
				$userData = [ 
					'email'=>$email ,
					'password'=>$password ,
					'address'=>$address ,
					'role'=>$role ,	
				];

				$userModel->registerUser($userData);
				$session = session();
				$session->setFlashdata('success','Successfully');
				return redirect()->to('/loginAccount');
			}
		}

	}

	// back from login form
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

}