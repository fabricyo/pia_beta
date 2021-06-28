<?php

namespace App\Controllers;

use App\Models\OSs;
use App\Models\Supressoes;
use App\Models\Podas;
use App\Models\OM;

class PodasController extends BaseController
{
    public function index()
    {
        $data['ps'] = (new Podas)->findAll();
        //load js
        load_libs(['dataTables']);
        load_view('podas/index', $data);
    }

    public function create()
    {
        $data['os_id'] = '';
        if (isset($_GET['os_id'])) {
            $data['os_id'] = $_GET['os_id'];
            $data['oss'][] = (new OSs())->find($_GET['os_id']);
        } else {
            $data['oss'] = (new OSs())->findAll();
        }
        load_libs(['form_utils']);
        load_view('podas/create', $data);
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
            'alt_poda' => 'required',
            'diametro' => 'required',
            'intensidade' => 'required',
            'local' => 'required',
        ]);

        if (!$input) {
            setSystemMsg("danger", "Corrija os erros nas informações");
            return redirect()->route('podas/create')->withInput()->with('validation', $this->validator);
        } else {
            $podas = new Podas();
            $cols = ['os', 'tipo', 'quantidade', 'especie', 'alt_arv', 'alt_poda', 'diametro', 'intensidade', 'local'];
            $data = [];
            foreach ($cols as $c) {
                $data[$c] = $this->request->getVar($c);
            }
            ## Insert Record
            if ($podas->insert($data)) {
                setSystemMsg('success', "Poda cadastrada com sucesso!");
                $url = '/podas/create';
                if ($this->request->getVar('os_id')) {
                    $url .= "?os_id=" . $this->request->getVar('os_id');
                }
                return redirect()->to($url);
            } else {
                setSystemMsg("danger", "Não foi possível cadastrar a poda");
                return redirect()->route('podas/create')->withInput();
            }
        }

    }

    public function edit($id = 0)
    {
        $data['p'] = (new Podas)->find($id);
        load_libs(['form_utils']);
        load_view('podas/edit', $data);
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
            'alt_poda' => 'required',
            'diametro' => 'required',
            'intensidade' => 'required',
            'local' => 'required',
        ]);

        if (!$input) {
            setSystemMsg("danger", "Corrija os erros nas informações");
            return redirect()->to('/podas/edit/' . $id)->withInput()->with('validation', $this->validator);
        } else {
            $cols = ['os', 'tipo', 'quantidade', 'especie', 'alt_arv', 'alt_poda', 'diametro', 'intensidade', 'local'];
            $data = [];
            foreach ($cols as $c) {
                $data[$c] = $this->request->getVar($c);
            }
            ## Update record
            if ((new Podas())->update($id, $data)) {
                setSystemMsg('success', "Poda atualizada com sucesso!");
                return redirect()->to('/podas/details/' . $id);
            } else {
                setSystemMsg("danger", "Não foi possível editar a poda");
                return redirect()->route('podas/edit/' . $id)->withInput();
            }
        }
    }

    public function delete($id = 0)
    {
        $podas = new Podas();
        if ($podas->find($id)) {
            $podas->delete($id);
            setSystemMsg('success', 'Poda excluída com sucesso');
        } else {
            setSystemMsg('danger', 'Poda não encontrada');
        }
        return redirect()->route('podas');
    }

    public function details($id)
    {
        $poda = (new Podas())->find($id);
        $poda->os_id = (new OSs())->where(['numero'=> $poda->os])->find()[0]->id;
        load_view('podas/details', ['p' => $poda]);
    }

}

