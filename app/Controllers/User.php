<?php namespace App\Controllers;
use App\Medels\UserModel;
class User extends BaseController
{
	// action of login
	public function index()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == 'post')
		{
			// do the validation
			$rules = [
				'email' =>'required|alpha_numeric|valid_email',
				// 'password' => 'required|alpha_numeric_punct',
				'password' => 'required|alpha_numeric_punct|validateUser[email,password]',
			];
			$errors = [
				'password' => [
					'validateUser' => 'You don\'t have account! Please Register'
				]
			];

			if(! $this->validate($rules,$errors)) {
				$data['validation'] = $this->validator;
			}else {
				$pizza = new UserModel();
				$user = $pizza->where('email', $this->request->getVar('email'))
							->first();
				$this->setUserSession($user);
				return redirect()->to('viewPizza');
			}
		}
		return view('auths/login',$data);
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			// 'address' => $user['address'],
			// 'role' => $user['role'],
		];
		session()->set($data);
		return true;
	}

	public function register() 
	{
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == 'post') 
		{
			// do the validation
			$rules = [
				'email' =>'required|alpha_numeric|valid_email',
				'password' => 'required|alpha_numeric_punct',
				'address' => 'required',
				'role' => 'required',
			];

			if(!$this->validate($rules)) // check rules
			{
				$data['validation'] = $this->validator;
				
			}else{
				$pizza = new UserModel();

				$dataInfo = [
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'address' => $this->request->getVar('address'),
					'role' => $this->request->getVar('role'),
				];
				$pizza->save($dataInfo);
				$session = session();
				$session ->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');
			}	
		}
		return view('auths/register',$data);
	}

	// public function logout()
	// {
	// 	session()->destroy();
	// 	return redirect()->to('/');
	// }

}