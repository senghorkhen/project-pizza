<?php namespace App\Controllers;
use App\Medels\UserModel;
class User extends BaseController
{
	
	public function addPizza()
	{
		return view('index');
	}

	public function login()
	{
		$data = [];
		helper(['form']);

		return view('auths/login');
	}

	public function register() 
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post') {
			// do the validation
			$rules = [
				'email' =>'required|valid_email|min_length[6]|max_length[50]',
				'password' => 'required|min_length[8]|max_length[255]',
				'address' => 'required|alpha_numeric|min_length[3]|max_length[20]'
			];
			if($this->validate($rules))
			//insert to database
			{
			$registerForm = new UserModel();
				
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$registerData = array(
					'email'=>$email,
					'password'=>$password,
					'address'=>$address
				);
				$registerForm->insert($registerData);
				return redirect()->to('/signup');

			}else {
				$data['messages'] = $this->validator;
				return view('auths/register',$data);
			}
		}
		// return view('auths/register');
	}

}
