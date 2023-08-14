<?php

namespace App\Models;

use function Composer\Autoload\includeFile;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EnderecoModel extends Model
{
    public function getEndereco()
    {
        $sql = "SELECT * FROM ENDERECO";
        $endereco = DB::select($sql);

        return $endereco;
    }
}