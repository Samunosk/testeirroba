<?php

namespace App\Entity;

use \db_teste;
use \PDO;

class Pacientes{

  /**
   * Identificador único do Paciente
   * @var integer
   */
  public $id;

  /**
   * Nome
   * @var string
   */
  public $nm_pacientes;

  /**
   * cpf do paciente
   * @var string
   */
  public $cpf_pacientes;


 

  /**
   * Método responsável por cadastrar um novo paciente
   * @return boolean
   */
  public function cadastrar(){
   
    //INSERIR O PACIENTE NO BANCO
    $obDatabase = new Database('pacientes');
    $this->id = $obDatabase->insert([
                                      'nome do paciente'    => $this->nm_pacientes,
                                      'cpf' => $this->cpf_paciente,
                                      
                                      
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o paciente no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('pacientes'))->update('id = '.$this->id,[
        'nome do paciente'    => $this->nm_pacientes,
        'cpf' => $this->cpf_paciente,
                                                              ]);
  }

  /**
   * Método responsável por excluir o paciente no banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('pacientes'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os pacientes do banco
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getPacientes($where = null, $order = null, $limit = null){
    return (new Database('pacientes'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma vaga com base em seu ID
   * @param  integer $id
   * @return pacientes
   */
  public static function getPacientes($id){
    return (new Database('pacientes'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}