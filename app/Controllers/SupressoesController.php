<?php

namespace App\Controllers;

use App\Models\Impedimentos;
use App\Models\Impedimentos_Semanais;
use App\Models\OSs;
use App\Models\Supressoes;

class SupressoesController extends BaseController
{
    public function index()
    {
        $data['sp'] = (new Supressoes())->findAll();
        //load js
        load_libs(['dataTables']);
        load_view('supressoes/index', $data);
    }

    public function create()
    {
        $data['os_id'] = '';
        if(isset($_GET['os_id'])){
            $data['os_id'] = $_GET['os_id'];
            $data['oss'][] = (new OSs())->find($_GET['os_id']);
        }else{
            $data['oss'] = (new OSs())->findAll();
        }
        helper('form');
        load_libs(['form_utils', 'input_file']);
        load_view('supressoes/create', $data);
    }

    public function store()
    {
        ## Validation
        $input = $this->validate([
            'os' => 'required|exact_length[10]',
            'tipo' => 'required',
            'especie' => 'required',
            'quantidade' => 'required|numeric|greater_than[0]',
            'alt_arv' => 'required',
            'alt_copa' => 'required',
            'diametro' => 'required',
            'perimetro' => 'required',
            'local' => 'required',
        ]);

        //Gato do gato, mas vamos
        $file_raw = $_FILES['image'];
        $validate_file = true;
        if($file_raw['size'] > 0){
            $file = new \CodeIgniter\Files\File($file_raw['tmp_name']);
            $validate_file = validate_file($file, 'image', ['image/png', 'image/jpg', 'image/jpeg'], 15);
        }
        if (!$input || !$validate_file) {
            setSystemMsg("danger", "Corrija os erros nas informações");
            return redirect()->route('supressoes/create')->withInput()->with('validation', $this->validator);
        } else {
            $sps = new Supressoes();
            $cols = ['os', 'tipo', 'quantidade', 'especie', 'alt_arv', 'alt_copa', 'diametro', 'perimetro', 'local'];
            $data = [];
            foreach ($cols as $c) {
                $data[$c] = $this->request->getVar($c);
            }
            ## Insert Record
            $id_sp = $sps->insert($data);
            if ($id_sp) {
                ///Checa se há foto
                $file_raw = $_FILES['image'];
                if($file_raw['size'] > 0){
                    move_uploaded_file($file_raw['tmp_name'], ROOTPATH."public/uploads/supressoes/supressao__$id_sp.jpeg");
                    correctImageOrientation(ROOTPATH."public/uploads/supressoes/supressao__$id_sp.jpeg");
                    $sps->update($id_sp, ['file_path' => base_url("uploads/supressoes/supressao__$id_sp.jpeg")]);
                }
                setSystemMsg('success', "Supressão cadastrada com sucesso!");
                $url = '/supressoes/create';
                if($this->request->getVar('os_id')){
                    $url .= "?os_id=" .$this->request->getVar('os_id');
                }
                return redirect()->to($url);
            } else {
                setSystemMsg("danger", "Não foi possível cadastrar a supressão");
                return redirect()->route('supressoes/create')->withInput();
            }
        }

    }

    public function edit($id = 0)
    {
        ## Select record by id
        $data['s'] = (new Supressoes())->find($id);
        helper('form');
        load_libs(['form_utils', 'input_file']);
        load_view('supressoes/edit', $data);
    }

    public function update($id = 0)
    {
        ## Validation
        $input = $this->validate([
            'os' => 'required|exact_length[10]',
            'tipo' => 'required',
            'especie' => 'required',
            'quantidade' => 'required|numeric|greater_than[0]',
            'alt_arv' => 'required',
            'alt_copa' => 'required',
            'diametro' => 'required',
            'perimetro' => 'required',
            'local' => 'required',
        ]);

        if (!$input) {
            setSystemMsg("danger", "Corrija os erros nas informações");
            return redirect()->to('/supressoes/edit/' . $id)->withInput()->with('validation', $this->validator);
        } else {
            $sps = new Supressoes();
            $cols = ['os', 'tipo', 'quantidade', 'especie', 'alt_arv', 'alt_copa', 'diametro', 'perimetro', 'local'];
            $data = [];
            foreach ($cols as $c) {
                $data[$c] = $this->request->getVar($c);
            }
            ## Update record
            if ($sps->update($id, $data)) {
                ///Checa se há foto
                $file_raw = $_FILES['image'];
                if($file_raw['size'] > 0){
                    move_uploaded_file($file_raw['tmp_name'], ROOTPATH."public/uploads/supressoes/supressao__$id.jpeg");
                    correctImageOrientation(ROOTPATH."public/uploads/supressoes/supressao__$id.jpeg");
                }
                setSystemMsg('success', "Supressão atualizada com sucesso!");
                return redirect()->to('/supressoes/details/' . $id);
            } else {
                setSystemMsg("danger", "Não foi possível editar a supressão");
                return redirect()->route('supressoes/edit/' . $id)->withInput();
            }
        }
    }

    public function delete($id = 0)
    {
        $sp = new Supressoes();
        if ($sp->find($id)) {
            $sp->delete($id);
            setSystemMsg('success', 'Supressão excluída com sucesso');
        } else {
            setSystemMsg('danger', 'Supressão não encontrada');
        }
        return redirect()->route('supressoes');
    }

    public function details($id)
    {
        $sp = (new Supressoes())->find($id);
        $sp->os_id = (new OSs())->where(['numero'=> $sp->os])->find()[0]->id;
        if($sp->file_path)
            $sp->image = new \CodeIgniter\Files\File($sp->file_path);
        load_view('supressoes/details', ['s' => $sp]);
    }

}

