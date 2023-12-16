<?php
namespace App\Models;
use CodeIgniter\Model;
class Login extends Model
{
    public function getDataUsers($email, $password)
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT * FROM data_karyawan WHERE 
                        email = "'.$email.'" 
                        AND password = "'.$password.'"';
        $query   = $db->query($queryString);
        $results = $query->getResult();
        return count($results);
    }
}
