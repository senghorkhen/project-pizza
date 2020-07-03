<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizzas extends BaseController
{
	
	public function index()
	{	
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->findAll();
		return view('index',$data);
	}
	
	// add pizza to table in database
	public function createPizza(){
		$data = [];
		if($this->request->getMethod() == "post"){
			helper(['form']);
			$rules = [
				'name'=>'required|alpha_space',
				'price'=>'required|min_length[1]|max_length[50]|numeric',	
			];

			 if($this->validate($rules)){
				 // insert to database
				$pizzaModel = new PizzaModel();
				$pizzaName = $this->request->getVar('name');
				$pizzaPrice = $this->request->getVar('price');
				$pizzaIngredient = $this->request->getVar('ingredients');
				$pizzaData = array(
					'name'=>$pizzaName,
					'price'=>$pizzaPrice,
					'ingredients'=>$pizzaIngredient
				);
				$pizzaModel->insert($pizzaData);

			}else{
				$sessionError = session();
                	$validation = $this->validator;
               		$sessionError->setFlashdata('error', $validation);
			}
		}
		return redirect()->to('/pizza');

	}

	// edit pizza data from table in database
	public function editPizza($id)
	{
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->find($id);
		return view('index',$data);
	}
		// update piza data from table in database
		public function updatePizza(){
		$pizza = new PizzaModel();
		$pizza->update($_POST['id'], $_POST);
		return redirect()->to('/pizza');
	}

	// delete pizza data from table in database
	public function deletePizza($id){
		$pizza = new PizzaModel();
		$pizza->find($id);
		$delete = $pizza->delete($id);
		return redirect()->to('/pizza');
	}
}