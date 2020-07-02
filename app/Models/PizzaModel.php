<?php namespace App\Models;

use CodeIgniter\Model;

class PizzaModel extends Model
{
    protected $table      = 'pizzas';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [ 'name', 'price','ingredients'];

}