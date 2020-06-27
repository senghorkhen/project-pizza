<?php namespace App\Controllers;

class Peperoni extends BaseController
{
    public function pizza()
	{
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == 'post') 
		{
			// do the validation
			$rules = [
				'name' => 'required|alpha_numeric',
				'price'=>'required|min_length[1]|max_length[50]|numeric',
			];
			if(! $this->validate($rules)) // check rules
			{
				$data['validation'] = $this->validator;
			}else{
				// insert to database
				echo "successfully";
			}	
		}
		return view('index',$data);
	}
		
}
