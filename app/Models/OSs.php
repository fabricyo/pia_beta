<?php
namespace App\Models;

use CodeIgniter\Model;

class OSs extends Model
{
    protected $table = 'oss';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['numero', 'dt_vistoria', 'nome_vistoriador'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationMessages = [];
    protected $skipValidation = false;

}