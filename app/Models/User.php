<?php
namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'data_karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['id_karyawan'];
    public function getUser()
    {
        return $this->findAll();
    }
    public function getUserById($id)
    {
        return $this->where('id_karyawan', $id)->first();
    }
    public function getUserIdByEmail($email)
    {
        // Assuming the email field in your table is named 'email'
        $user = $this->where('email', $email)->first();

        if ($user) {
            return $user['id_karyawan'];
        }

        return null; // Or handle the case when the user is not found
    }
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}