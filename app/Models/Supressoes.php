<?php
namespace App\Models;

use CodeIgniter\Model;

class Supressoes extends Model
{
    protected $table = 'supressoes';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['os', 'tipo', 'quantidade', 'especie', 'alt_arv', 'alt_copa', 'diametro', 'perimetro', 'local'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationMessages = [];
    protected $skipValidation = false;

}