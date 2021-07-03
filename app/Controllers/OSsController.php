<?php

namespace App\Controllers;

use App\Models\OSs;
use App\Models\Supressoes;
use App\Models\Podas;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class OSsController extends BaseController
{
    public function index()
    {
        $data['oss'] = (new OSs())->findAll();
        //load js
        load_libs(['dataTables']);
        load_view('oss/index', $data);
    }

    public function create()
    {
        $data['lotes'] = ['Lote 1', 'Lote 2', 'Lote 3', 'Lote 4', 'Lote 5','Lote 6', 'Lote 7', 'Lote 8', 'Lote 9'];
        load_libs(['form_utils']);
        load_view('oss/create', $data);
    }

    public function store()
    {
        ## Validation
        $input = $this->validate([
            'numero' => [
                'rules' => 'required|exact_length[10]|is_unique[oss.numero]',
                'errors' => ['required' => 'Informação necessária', 'is_unique' => 'Número de OS já cadastrado']
            ],
            'dt_vistoria' => [
                'rules' => 'required',
                'errors' => ['required' => 'Informação necessária',]
            ],
            'nome_vistoriador' => [
                'rules' => 'required|max_length[50]|is_unique[oss.numero]',
                'errors' => ['required' => 'Informação necessária', 'max_length' => 'Máximo de 50 caracteres']
            ],
            'lote' => [
                'rules' => 'required',
                'errors' => ['required' => 'Informação necessária']
            ],
            'endereco' => [
                'rules' => 'max_length[100]',
                'errors' => ['max_length' => 'Máximo de 100 caracteres']
            ],
        ]);
        if (!$input) {
            setSystemMsg("danger", "Corrija os erros nas informações");
            return redirect()->route('oss/create')->withInput()->with('validation', $this->validator);
        } else {
            $cols = ['numero', 'nome_vistoriador', 'lote', 'endereco'];
            $data = [];
            foreach ($cols as $c) {
                $data[$c] = $this->request->getVar($c);
            }
            $data['dt_vistoria'] = dateSwap($this->request->getVar('dt_vistoria'));
            ## Insert Record
            $id = $id = (new OSs())->insert($data);
            if ($id) {
                setSystemMsg('success', "OS cadastrada com sucesso!");
                return redirect()->to('/oss/details/' . $id);
            } else {
                setSystemMsg("danger", "Não foi possível cadastrar a OS");
                return redirect()->route('oss/create')->withInput();
            }
        }

    }

    public function edit($id = 0)
    {
        $data['os'] = (new OSs)->find($id);
        load_libs(['form_utils']);
        load_view('oss/edit', $data);
    }

    public function update($id = 0)
    {
        ## Validation
        $input = $this->validate([
            'numero' => [
                'rules' => 'required|exact_length[10]',
                'errors' => ['required' => 'Informação necessária']
            ],
            'dt_vistoria' => [
                'rules' => 'required',
                'errors' => ['required' => 'Informação necessária',]
            ],
            'nome_vistoriador' => [
                'rules' => 'required|exact_length[50]|is_unique[oss.numero]',
                'errors' => ['required' => 'Informação necessária', 'exact_length' => 'Máximo de 50 caracteres']
            ],
            'lote' => [
                'rules' => 'required',
                'errors' => ['required' => 'Informação necessária']
            ],
            'endereco' => [
                'rules' => 'required|exact_length[100]',
                'errors' => ['required' => 'Informação necessária', 'exact_length' => 'Máximo de 100 caracteres']
            ],
        ]);
        if (!$input) {
            setSystemMsg("danger", "Corrija os erros nas informações");
            return redirect()->to('/oss/edit/' . $id)->withInput()->with('validation', $this->validator);
        } else {
            $cols = ['numero', 'nome_vistoriador', 'lote', 'endereco'];
            $data = [];
            foreach ($cols as $c) {
                $data[$c] = $this->request->getVar($c);
            }
            $data['dt_vistoria'] = dateSwap($this->request->getVar('dt_vistoria'));
            ## Update record
            if ((new OSs())->update($id, $data)) {
                setSystemMsg('success', "Ordem de Serviço atualizada com sucesso!");
                return redirect()->to('/oss/details/' . $id);
            } else {
                setSystemMsg("danger", "Não foi possível editar a Ordem de Serviço");
                return redirect()->route('oss/edit/' . $id)->withInput();
            }
        }
    }

    public function delete($id = 0)
    {
        $os = (new OSs())->find($id);
        if ($os) {
            $sps = (new Supressoes())->where(['os' => $os->numero])->findAll();
            foreach ($sps as $s)
                (new Supressoes())->delete($s->id);

            $ps = (new Podas())->where(['os' => $os->numero])->findAll();
            foreach ($ps as $p)
                (new Podas())->delete($p->id);
            (new OSs())->delete($id);
            setSystemMsg('success', 'OS excluída com sucesso');
        } else {
            setSystemMsg('danger', 'OS não encontrada');
        }
        return redirect()->to('/oss');
    }

    public function details($id)
    {
        $os = (new OSs())->find($id);
        $os->svs = [];
        foreach ((new Podas())->where(['os' => $os->numero])->findAll() as $p) {
            $m = "$p->alt_arv - $p->alt_poda - $p->diametro";
            $created_at = dateSwap(explode(" ", $p->created_at)[0]) . " " . explode(" ", $p->created_at)[1];
            $os->svs[] = (object)['sv' => 'Poda', 'os' => $p->os, 'tipo' => $p->tipo, 'especie' => $p->especie,
                'link' => base_url("podas/details/$p->id"), 'quantidade' => $p->quantidade, 'medicoes' => $m,
                'intensidade' => $p->intensidade, 'local' => $p->local, 'created_at' => $created_at];
        }
        foreach ((new Supressoes())->where(['os' => $os->numero])->findAll() as $s) {
            $m = "$s->alt_arv - $s->alt_copa - $s->diametro";
            $created_at = dateSwap(explode(" ", $s->created_at)[0]) . " " . explode(" ", $s->created_at)[1];
            $os->svs[] = (object)['sv' => 'Supressão', 'os' => $s->os, 'tipo' => $s->tipo, 'especie' => $s->especie,
                'link' => base_url("supressoes/details/$s->id"), 'quantidade' => $s->quantidade, 'medicoes' => $m,
                'perimetro' => $s->perimetro, 'local' => $s->local, 'created_at' => $created_at];
        }
        load_libs(['dataTables']);
        load_view('oss/details', ['o' => $os]);
    }

    public function gerar_relatorio()
    {
        load_view('oss/relatorios');
    }


    public function gerar_excel($ids)
    {
        $supressoes = [];
        $podas = [];
        foreach (explode("|", $ids) as $id) {
            $os = (new OSs())->find($id);
            $sups = (new Supressoes())->where(['os' => $os->numero])->findAll();
            foreach ($sups as $s){
                $s->nome_vistoriador = $os->nome_vistoriador;
                $s->dt_vistoria = $os->dt_vistoria;
            }
            $supressoes = array_merge($supressoes, $sups);

            $ps = (new Podas())->where(['os' => $os->numero])->findAll();
            foreach ($ps as $p){
                $p->nome_vistoriador = $os->nome_vistoriador;
                $p->dt_vistoria = $os->dt_vistoria;
            }
            $podas = array_merge($podas, $ps);
        }
        d($podas);
        d($supressoes);
        return $this->gerar_excel_doc($podas, $supressoes);
    }

    private function gerar_excel_doc($podas, $supressoes)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //Fazendo planilha de podas
        $sheet->setTitle("Podas");
        //Cabeçalho
        $sheet->setCellValue('A1', 'PIA - Relatório de Podas gerado em ' . date("d/m/Y") . " às " . date("H:i:s"));
        $sheet->mergeCells('A1:N1');
        $sheet->getStyle('A1:N1')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                    'size' => 14
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );
        //Cabeçalhos
        $sheet->setCellValue('A2', 'Data e Hora do Registro');
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B2', 'Vistoriador');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C2', 'OS nº');
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->setCellValue('D2', 'RA');
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->setCellValue('E2', 'Data da Vistoria');
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->setCellValue('F2', 'Espécie (nome popular)');
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->setCellValue('G2', 'Espécie (nome científico)');
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->setCellValue('H2', 'Quantidade');
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->setCellValue('I2', 'Altura da Árvore');
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->setCellValue('J2', 'Altura da Poda');
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->setCellValue('K2', 'Diâmetro');
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->setCellValue('L2', 'Intervenção');
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->setCellValue('M2', 'Intensidade');
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->setCellValue('N2', 'Local');
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getStyle('A2:N2')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                    'size' => 12
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        //Popular os dados

        for ($i = 0; $i < sizeof($podas); $i++) {
            $p = $podas[$i];
            $created_at = dateSwap(explode(" ", $p->created_at)[0]) . " " . explode(" ", $p->created_at)[1];
            $sheet->setCellValue('A' . ($i + 3), $created_at);
            $sheet->setCellValue('B' . ($i + 3), $p->nome_vistoriador);
            $sheet->setCellValue('C' . ($i + 3), $p->os);
            $sheet->setCellValue('D' . ($i + 3), "RA-JB");
            $sheet->setCellValue('E' . ($i + 3), dateSwap($p->dt_vistoria));
            $sheet->setCellValue('F' . ($i + 3), explode("-", $p->especie)[0]);
            $sheet->setCellValue('G' . ($i + 3), explode("-", $p->especie)[1]);
            $sheet->setCellValue('H' . ($i + 3), $p->quantidade);
            $sheet->setCellValue('I' . ($i + 3), $p->alt_arv);
            $sheet->setCellValue('J' . ($i + 3), $p->alt_poda);
            $sheet->setCellValue('K' . ($i + 3), $p->diametro);
            $sheet->setCellValue('L' . ($i + 3), $p->tipo);
            $sheet->setCellValue('M' . ($i + 3), $p->intensidade);
            $sheet->setCellValue('N' . ($i + 3), $p->local);
        }

        //Fazendo planilha de Supressões
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Supressões");
        //Cabeçalho Supressões
        $sheet->setCellValue('A1', 'PIA - Relatório de Supressões gerado em ' . date("d/m/Y") . " às " . date("H:i:s"));
        $sheet->mergeCells('A1:N1');
        $sheet->getStyle('A1:N1')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                    'size' => 14
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );
        //Cabeçalhos
        $sheet->setCellValue('A2', 'Data e Hora do Registro');
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B2', 'Vistoriador');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C2', 'OS nº');
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->setCellValue('D2', 'RA');
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->setCellValue('E2', 'Data da Vistoria');
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->setCellValue('F2', 'Espécie (nome popular)');
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->setCellValue('G2', 'Espécie (nome científico)');
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->setCellValue('H2', 'Quantidade');
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->setCellValue('I2', 'Altura da Árvore');
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->setCellValue('J2', 'Altura da Copa');
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->setCellValue('K2', 'Diâmetro');
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->setCellValue('L2', 'Perímetro');
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->setCellValue('M2', 'Intervenção');
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->setCellValue('N2', 'Local');
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getStyle('A2:N2')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                    'size' => 12
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        //Popular os dados
        for ($i = 0; $i < sizeof($supressoes); $i++) {
            $p = $supressoes[$i];
            $created_at = dateSwap(explode(" ", $p->created_at)[0]) . " " . explode(" ", $p->created_at)[1];
            $sheet->setCellValue('A' . ($i + 3), $created_at);
            $sheet->setCellValue('B' . ($i + 3), $p->nome_vistoriador);
            $sheet->setCellValue('C' . ($i + 3), $p->os);
            $sheet->setCellValue('D' . ($i + 3), "RA-JB");
            $sheet->setCellValue('E' . ($i + 3), dateSwap($p->dt_vistoria));
            $sheet->setCellValue('F' . ($i + 3), explode("-", $p->especie)[0]);
            $sheet->setCellValue('G' . ($i + 3), explode("-", $p->especie)[1]);
            $sheet->setCellValue('H' . ($i + 3), $p->quantidade);
            $sheet->setCellValue('I' . ($i + 3), $p->alt_arv);
            $sheet->setCellValue('J' . ($i + 3), $p->alt_copa);
            $sheet->setCellValue('K' . ($i + 3), $p->diametro);
            $sheet->setCellValue('M' . ($i + 3), $p->perimetro);
            $sheet->setCellValue('L' . ($i + 3), $p->tipo);
            $sheet->setCellValue('N' . ($i + 3), $p->local);
        }


        $writer = new Xlsx($spreadsheet);
        $writer->save('world.xlsx');
        return $this->response->download('world.xlsx', null)->setFileName('Relatório - PIA.xlsx');
    }
}

