<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class atividade2Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function atividade2()
    {
      return view('atividade2');
    }
  
    public function consultaUsuario($usuario)
    {

      $url = "https://api.github.com/users/".$usuario;
      $retorno = $this->get_content($url);
      $resultado = json_decode($retorno);

      if (property_exists($resultado, 'message')) {
        return $resultado;
      }

      $dataCriado = explode('T' , $resultado->created_at);
      $dataAtualizada = explode('T' , $resultado->updated_at);

      $resultado->created_at = $this->formataData($dataCriado);
      $resultado->updated_at = $this->formataData($dataAtualizada);

      return view('usuarios',compact('resultado'));
      
    }

    private function formataData($data)
    {
      $dataAno = explode('-' , $data[0]);
      $dataFormatada = $dataAno[2]."/".$dataAno[1]."/".$dataAno[0];

      $dataHora =  substr($data[1], 0, -1);
      return $dataFormatada." ".$dataHora;
    }

    private function get_content($url)
    {
      $curl = curl_init();
      curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => 1, 
      CURLOPT_HTTPHEADER => array('Content-Type: application/vnd.github+json', "User-Agent: Atividade2-teste"),
      CURLOPT_URL => $url
      ]);
      $response = curl_exec($curl);
      return $response;
    }
    
}
