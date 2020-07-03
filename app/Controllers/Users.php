<?php namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
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
					'validateUser' => 'email and password not match!'
				]
			];

			$email = $this->request->getVar('email');
			if(!$this->validate($rules,$error)){
				$data['message'] = $this->validator;
				return view('auths/login',$data);
			}else{
				$model = new UserModel();
				$user = $model->where('email',$email)->first();
				
				// set session for user register success and then back to login and show Successfully
				$this->setUserSession($user);
				$session = session();
				$session->setFlashdata('success','Successfully');
				return redirect()->to('/pizza');
			}

		}
		
	}

	public function setUserSession($user){
		// set session for user
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			'address' => $user['address'],
			'role' => $user['role']
		];
		session()->set($data);
		return true;
	}	

	// register account
	public function registerAccount()
	{
		$data = [];
		helper(['form']);
		// validation form register
		if($this->request->getMethod() == "post"){
			$rules = [
				'email'=> 'required|valid_email',
				'password'=> 'required|alpha_numeric_punct',
				'address' => 'required'
			];
			 if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return view('auths/register',$data);

			}else{
				// insert to database
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
				return redirect()->to('/');
			}
		}

	}

	// back from login form
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

}