<?php namespace App\Controllers;
use App\Medels\PeperoniModel;
class Peperoni extends BaseController
{
	public function index()
	{
		$pizza = new PeperoniModel();
		$data['listPizza'] = $pizza->findAll();
		return view('index', $data);
	}

    public function addPizza()
	{
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == 'post') 
		{
			// do the validation
			$rules = [
				'name' => 'required|alpha_numeric',
				'ingredient'=>'required',
				'price'=>'required|min_length[1]|max_length[50]|numeric',				
			];
			if($this->validate($rules)) // check rules
			{
			// insert to database
			$pizza = new PeperoniModel();
			
			$name = $this->request->getVar('name');
			$price = $this->request->getVar('price')."$";			
			$ingredient = $this->request->getVar('ingredient');
			
			$dataPizza = array(
				'name' => $name,
				'price' => $price,
				'ingredient' => $ingredient,
			);

			$pizza->insert($dataPizza);
			return redirect()->to('/signin');	
			
			}else{
				$data['validation'] = $this->validator;			}	
		}
		return view('index',$data);
	}

	// public function editPizza($id)
	// {
	// 	$pizza = new PeperoniModel();
	// 	$data['pizzaList'] = $pizza->find($id);
	// 	return view('index', $data);
	// }

	// public function updatePizza()
	// {
	// 	$pizza = new PeperoniModel();
	// 	$pizza->update($_POST['id'], $_POST);
	// 	return redirect()->to('/viewPizza');
	// }

	// public function deletePizza($id) 
	//{
	// 	$pizza = new PeperoniModel();
	// 	$pizza->find($id);
	// 	$delete = $pizza->delete($id);
	// 	return redirect()->to('/viewPizza');
	// }
		
}
