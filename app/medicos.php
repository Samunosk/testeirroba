<?php

namespace App\Entity;

use \db_teste;
use \PDO;

class Medico{

  /**
   * Identificador único do Paciente
   * @var integer
   */
  public $id;

  /**
   * Nome
   * @var string
   */
  public $nm_medico;

  /**
   * especializaão do médico
   * @var string
   */
  public $especializacao;

/**
   * Senha do médico
   * @var integer
   */
  public $senha;
 

  /**
   * Método responsável por cadastrar um novo paciente
   * @return boolean
   */
  public function cadastrar(){
   
    //INSERIR O MEDICO NO BANCO
    $obDatabase = new Database('medico');
    $this->id = $obDatabase->insert([
                                      'nome do medico'    => $this->nm_medico,
                                      'especialização' => $this->especializacao,
                                       'senha' =>$this ->senha
                                      
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o paciente no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('medico'))->update('id = '.$this->id,[
        'nome do medico'    => $this->nm_medico,
        'especialização' => $this->especializacao,
        'senha' =>$this ->senha
                                                              ]);
  }

  /**
   * Método responsável por excluir o paciente no banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('medico'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os pacientes do banco
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getMedico($where = null, $order = null, $limit = null){
    return (new Database('medico'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma vaga com base em seu ID
   * @param  integer $id
   * @return medico
   */
  public static function getMedico($id){
    return (new Database('medico'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}