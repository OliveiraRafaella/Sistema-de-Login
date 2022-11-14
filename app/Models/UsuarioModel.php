<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'idusuarios';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object'; /* pode ser array */
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome','usuario','senha','perfil'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nome' => 'required',
        'usuario' => 'required|is_unique[usuarios.usuario]',
        'senha' => 'required',
        'perfil' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashSenha'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function hashSenha($data)
    {
        // senha criptografada
        $data['data']['senha'] = password_hash($data['data']['senha'],PASSWORD_DEFAULT);
        return $data;
    }

    public function validarSenha($usuario,$senha)
    {
        // busca o usuario
        $buscaUsuario = $this->where('usuario', $usuario)->first();
        if(is_null($buscaUsuario)){
            return false;
        }
        // validar a senha
        if(!password_verify($senha, $buscaUsuario->senha)){
            return false;
        }
        return $buscaUsuario;
    }
}