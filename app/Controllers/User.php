<?php namespace App\Controllers;
use App\Medels\UserModel;
class User extends BaseController
{

	public function index()
	{
		return view('auths/login');
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
			];
			if($this->validate($rules)) // check rules
			{
				$dataModel = new UserMedel();
				// insert to database
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$dateRegister = array(
					'email' => $email,
					'password' => $password,
					'address' => $address
				);
				$dataModel->createRegister($dateRegister);
				
			}else{
				$data['validation'] = $this->validator;
			}	
		}
		return view('auths/register',$data);
	}

}