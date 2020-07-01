<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizzas extends BaseController
{
	public function index()
	{
		$pizza = new PizzaModel();
		$data['listPizza'] = $pizza->findAll();
		return view('index', $data);
	}

    public function addPizza()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post") 
		{
			// do the validation
			$rules = [
				'name' => 'required|alpha_numeric',
				'price'=>'required|min_length[1]|max_length[50]|numeric',
			];				
			if($this->validate($rules)) // check rules
			{
				
			$pizza = new PizzaModel();
			$name = $this->request->getVar('name');
			$price = $this->request->getVar('price');			
			$ingredient = $this->request->getVar('ingredient');
			
			$pizzaData = array(
				'name' => $name,
				'price' => $price,
				'ingredient' => $ingredient
			);

			$pizza->createPizza($pizzaData);
			return redirect()->to('/views');	
			
			}else{
				$data['validation'] = $this->validator;			
			}				
		}
		return view('index',$data);
	}

	public function editPizza($id)
	{
		$pizza = new PizzaModel();
		$data['listPizza'] = $pizza->find($id);
		return view('index',$data);
	}

	public function updatePizza(){
		$pizza = new PizzaModel();
		$pizza->update($_POST['id'], $_POST);
		return redirect()->to('/views');
	}

	public function deletePizza($id){
		$pizza = new PizzaModel();
		$pizza->find($id);
		$delete = $pizza->delete($id);
		return redirect()->to('/views');
	}
}