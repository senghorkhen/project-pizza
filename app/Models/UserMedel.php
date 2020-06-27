<?php namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['email', 'password', 'address'];

    public function createRegister($registerInfo)
    {
        $this->insert([
                'email'=>$registerInfo['email'],
                'password'=>password_hash($registerInfo['password'], PASSWORD_DEFAULT),
                'address'=>$registerInfo['address'],
        ]);
    }

}