<?php namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
{
	// set login
	public function index()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			// do the validation
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|alpha_numeric_punct|validateUser[email,password]'
			];
			$errors = [
				'password' => [
					'validatUser' => 'You don\'t have your account!!! Please Register'
				]
			];

			if(!$this->validate($rules,$errors)){
				$data['validation'] = $this->validator;
			}else{
				$pizza = new UserModel();
				$user = $pizza->where('email',$this->request->getVar('email'))
							  ->first();
				$user = $pizza->where('password',$this->request->getVar('password'))
							  ->first();
				$this->setUserSession($user);

				return redirect()->to('views');
			}
		}
		return view('auths/login',$data);
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			'address' => $user['address'],
			'role' => $user['role'],
		];
		session()->set($data);
		return true;
	}	

	// register your account before login
	public function register()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			// do the validation
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|alpha_numeric_punct',
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$pizza = new UserModel();
				// insert to database
				$dataInfo = [
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'address' => $this->request->getVar('address'),
					'role' => $this->request->getVar('role'),
				];

				$pizza->save($dataInfo);
				$session = session();
				$session->setFlashdata('success','Successful For Register');
				return redirect()->to('/');
			}
		}
		return view('auths/register',$data);
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

}