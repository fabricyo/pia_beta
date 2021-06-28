<?php

namespace App\Libraries;

use DateInterval;

class MyRules
{
    public function dia($input, string $modo, array $data, string &$error = null): bool
    {
        if(is_null($input)){
            $error = "O campo data é necessário";
            return false;
        }
        if ($data['tipo_dia'] === "dia_semana") {
            foreach ($input as $dia) {
                $dias = ['domingo', 'segunda', "terça", "quarta", "quinta", "sexta", "sábado"];
                if (in_array($dia, $dias)) {
                    return true;
                }
            }
        } else if ($data['tipo_dia'] === "data"){
            $dia = new \DateTime($data['dia_submit']);
            $today = new \DateTime(date("Y/m/d"));
            if ($modo == "impedimento") {
                if ($dia < $today) {
                    $error = "A data não pode ser anterior à hoje";
                    return false;
                }
            } else {
                //Snippet inspirado na solução https://stackoverflow.com/a/17362348
                $dates = array();
                $date = new \DateTime();
                while (count($dates) < 2) {
                    $date->add(new DateInterval('P1D'));
                    if ($date->format('N') < 6)
                        $dates[] = $date->format('Y-m-d');
                }
                if ($dia < new \DateTime(end($dates))) {
                    $error = "A data deve estar dois dias úteis à frente";
                    return false;
                }
            }
        }else{
            $dia_inicio = new \DateTime($data['dia'][1]." ".$data['hr_inicio']);
            $dia_fim = new \DateTime($data['dia'][3]." ".$data['hr_fim']);
            if ($dia_inicio > $dia_fim) {
                $error = "A data não pode ser posterior à data final";
                return false;
            }
        }
        return true;
    }

    public function hr_inicio($input, $modo, array $data, string &$error = null): bool
    {
        if(is_null($input)){
            $error = "O campo hora inicial é necessário";
            return false;
        }
        if(!array_key_exists("hr_fim_submit", $data) ){
            $error = "O campo hora final é necessário";
            return false;
        }
        if ($data['tipo_dia'] !== "periodo"){
            $inicio = new \DateTime(date("Y/m/d").$data['hr_inicio_submit']);
            $fim = new \DateTime(date("Y/m/d").$data['hr_fim_submit']);
            if($inicio > $fim){
                $error = "A hora inicial não pode posterior à hora final";
                return false;
            }
        }
        return true;
    }
}