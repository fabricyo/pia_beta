<?php
namespace App\Models;

use CodeIgniter\Model;

class Podas extends Model
{
    protected $table = 'podas';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['os', 'tipo', 'quantidade', 'especie', 'alt_arv', 'alt_poda', 'diametro', 'intensidade', 'local'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationMessages = [];
    protected $skipValidation = false;

    protected $validationRules = [
//        'espec_veiculo' => 'required|min_length[4]|max_length[30]',
//        'marca' => 'required|min_length[2]|max_length[30]',
//        'modelo' => 'required|min_length[2]|max_length[30]',
//        'cor' => 'required|min_length[2]|max_length[15]',
//        'placa' => [
//            'rules' => 'required|exact_length[7]|is_unique[viaturas.placa]',
//            'errors' => ['is_unique' => 'Placa já cadastrada']
//        ],
//        'placa_vinculada' => 'exact_length[7]',
//        'impedimento'     => 'min_length[3]|max_length[3]',
//        'funcao' => 'max_length[30]',
//        'obs' => 'max_length[40]',
    ];

}