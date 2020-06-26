<?php namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['email', 'password', 'address'];

    public function register($register)
    {
        $this->insert([
                'email'=>$register['email'],
                'password'=>$register['password'],
                'address'=>$register['address'],
        ]);
    }

}