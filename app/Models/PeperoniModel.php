<?php namespace App\Models;
use CodeIgniter\Model;
class PeperoniModel extends Model
{
    protected $table = 'pizzas';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'ingredient', 'price'];

}