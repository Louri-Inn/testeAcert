<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\EnderecoModel;

class atividade3Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $endereco;

    public function atividade3()
    {
        return view('atividade3');
    }

    public function consultaCep(Request $request)
    {
        $cep = $request->input('cep');
        $cep = trim($cep, ",");
        $ceps = explode(',' , $cep);
        $guardaCep = [];

        foreach ($ceps as $key => $value) {
            $value = trim($value);
            $apiViaCep = json_decode($this->get_content("viacep.com.br/ws/$value/json/"));
            if ($apiViaCep && !property_exists($apiViaCep,'erro')) {
                $guardaCep = array_merge($guardaCep,[$apiViaCep]);
            }
        }
        return $guardaCep;
    }

    private function get_content($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
      ]);
      $response = curl_exec($curl);
      return $response;
    }
    
}
