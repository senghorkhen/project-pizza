<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizzas extends BaseController
{
	public function index()
	{	
		$pizza = new PizzaModel();
		$data['listPizza'] = $pizza->findAll();
		return view('index',$data);
	}

	public function addPizza(){
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'name'=>'required|alpha_numeric',
				'price'=>'required|min_length[1]|max_length[50]|numeric',
				'ingredient'=>'required'
			];
		    if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to('/dashboard');
			}
			else{			
				$pizza = new PizzaModel();
				$pizzaData = array(
					'name'=>$this->request->getVar('name'),
					'price'=>$this->request->getVar('price'),
					'ingredient'=>$this->request->getVar('ingredient'),
				);
				$pizza->createPizza($pizzaData);
				return redirect()->to('/dashboard');
			}
	    }	
		return view('index',$data);
	}

	//-----------------------------edit pizza-------------------------
	public function editPizza($id)
	{
		$pizza = new PizzaModel();
		$data['listPizza'] = $pizza->find($id);
		return view('index',$data);
	}

	//---------------------------update pizza---------------------------
	public function updatePizza(){
		$pizza = new PizzaModel();
		$pizza->update($_POST['id'], $_POST);
		return redirect()->to('/dashboard');
	}

	//--------------------------detele pizza--------------------------
	public function deletePizza($id){
		$pizza = new PizzaModel();
		$pizza->find($id);
		$delete = $pizza->delete($id);
		return redirect()->to('/dashboard');
	}
}
