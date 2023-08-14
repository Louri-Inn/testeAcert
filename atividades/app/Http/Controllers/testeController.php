<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\EnderecoModel;
use Illuminate\Database\Eloquent\Model;

class testeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $endereco;

    public function _construct(EnderecoModel $endereco)
    {
        $this->endereco = $endereco;
    }

    public function louri()
    {
        $cep = '08575700';
        $apiViaCep = json_decode($this->get_content("viacep.com.br/ws/$cep/json/"));
        return view('teste',compact('apiViaCep'));
    }

    public function teste1()
    {
        return view('teste1');
    }

    public function consultaCep(Request $request)
    {
        $cep = $request->input('cep');
        $cep = trim($cep, ",");
        $ceps = explode(',' , $cep);
        $guardaCep = [];
        //$guardaCep[0] = '08575700';
        foreach ($ceps as $key => $value) {
            $value = trim($value);
            $apiViaCep = json_decode($this->get_content("viacep.com.br/ws/$value/json/"));
            if ($apiViaCep && !property_exists($apiViaCep,'erro')) {
                $guardaCep = array_merge($guardaCep,[$apiViaCep]); //Mantem o valor da linha 30.
            }
            //$guardaCep[$key] = $apiViaCep;
        }
        //$apiViaCep = json_decode($this->get_content("viacep.com.br/ws/$cep/json/"));
        return $guardaCep;
    }

    public function buscaEndereco()
    {
        //$model = $this->endereco->getEndereco();
        $model = new EnderecoModel();
        return $model->getEndereco();
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
