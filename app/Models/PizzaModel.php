<?php
namespace App\Models;
use CodeIgniter\Model;

class PizzaModel extends Model{
    protected $table = "peperoi_info";
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name','price','ingredient'];
    
    public function createPizza($pizzaInfo){
        $this->insert([
            'name' => $pizzaInfo['name'],
            'price' => $pizzaInfo['price'],
            'ingredient' => $pizzaInfo['ingredient'],
        ]);
    }

}
