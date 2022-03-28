<?php

namespace App\Entity;

use \db_teste;
use \PDO;

class Agendamento{

  /**
   * Identificador único do agendamento
   * @var integer
   */
  public $id;

 
  /**
   * Descrição da vaga (pode conter html)
   * @var string
   */
  public $descricao;


  /**
   * Data de publicação do
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar um novo agendamento
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A VAGA NO BANCO
    $obDatabase = new Database('agendamento');
    $this->id = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'descricao' => $this->descricao,
                                      
                                      'data'      => $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o agendamento no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('agendamento'))->update('id = '.$this->id,[
                                                                'titulo'    => $this->titulo,
                                                                'descricao' => $this->descricao,
                                                               
                                                                'data'      => $this->data
                                                              ]);
  }

  /**
   * Método responsável por excluir o agendamento no banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('agendamento'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os agendamento do banco
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getAgendamento($where = null, $order = null, $limit = null){
    return (new Database('agendamento'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma vaga com base em seu ID
   * @param  integer $id
   * @return agendamento
   */
  public static function getAgendamento($id){
    return (new Database('agendamento'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}