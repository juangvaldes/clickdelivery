<?php

namespace Application\Model;

/*
 * Usamos el componente tablegateway que nos permite hacer consultas
 * utilizando una capa de abstracción, aremos las consultas sobre
 * una tabla que indicamos en el constructor
 */

use Zend\Db\TableGateway\TableGateway;

/*
 * Usamos el componente Dd\Adapter que nos permite hacer consultas
 * convencionales en formato SQL así como para servir de conexión
 * para el componente SQL que nos provee de una capa de abstracción
 * mas potente que la que da tablagateway
 */
use Zend\Db\Adapter\Adapter;

/*
  Usamos el componente SQL que nos permite realizar consultas
  utilizando métodos.
 */
use Zend\Db\Sql\Sql;
/*
  Igual que el anterior pero solamente con la cláusula select
 */
use Zend\Db\Sql\Select;

/*
 * Nos da algunas herramientas para trabajar con el resulset de las consultas, puede ser prescindible
 */
use Zend\Db\ResultSet\ResultSet;

class TblUserModel extends TableGateway {

    private $dbAdapter;

    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null) {

        //Conseguimos el adaptador
        $this->dbAdapter = $adapter;
        /* Al estar utilizando TableGateway necesitamos
          montar el constructor de la clase padre al que le  pasamos
          como parámetros principales la tabla de la base de datos que
          corresponde a este modelo y le pasamos el adaptador de conexión
         */
        return parent::__construct('tbl_user', $this->dbAdapter, $databaseSchema, $selectResultPrototype);
    }
    
    public function getUser($id) {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select();
        $select->from('tbl_user')
                ->where(array('id_user' => $id));
        $selectString = $sql->getSqlStringForSqlObject($select);
        $execute = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
        $result = $execute->toArray();
        return $result;
    }
    
    public function getUserDiferent($email, $id) {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select();
        $select->from('tbl_user')
                ->where(array('email' => $email, 'id_user !='.$id));
        $selectString = $sql->getSqlStringForSqlObject($select);
        $execute = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
        $result = $execute->toArray();
        return $result;
    }
    
    public function getAllUser($id) {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select();
        $select->from(array('s'=>'tbl_user'))
                ->join(array('r'=>'tbl_rol'), 'r.id_rol = s.id_rol', 'nombre_rol')
                ->where(array('id_user !='.$id));
        $selectString = $sql->getSqlStringForSqlObject($select);
        $execute = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
        $result = $execute->toArray();
        return $result;
    }
    
    public function addUser($name,$email,$password_2,$phone){
        
         $insert=$this->insert(array(
                            "name"    => $name,
                            "email" => $email,
                            "password_2"   => $password_2,
                            "phone" => $phone,
                            "id_rol" => 3
                       ));
        
         return $insert;
     }
     
     public function addUserAdmin($name,$email,$password_2,$phone, $rol, $reading, $status){
        
         $insert=$this->insert(array(
                            "name"    => $name,
                            "email" => $email,
                            "password_2"   => $password_2,
                            "phone" => $phone,
                            "id_rol" => $rol,
                            "reading" => $reading,
                            "estado" => $status
                       ));
        
         return $insert;
     }
     
    public function updateEditUser($name,$email,$password_2,$phone, $id) {
        $update = $this->update(array(
                        "name"    => $name,
                        "email" => $email,
                        "password_2"   => $password_2,
                        "phone" => $phone
                ), array("id_user" => $id));
        return $update;
    }
    
    public function updateEditUserAdmin($name,$email,$password_2,$phone, $rol, $reading, $status, $id) {
        $update = $this->update(array(
                        "name"    => $name,
                        "email" => $email,
                        "password_2"   => $password_2,
                        "phone" => $phone,
                        "id_rol" => $rol,
                        "reading" => $reading,
                        "estado" => $status
                ), array("id_user" => $id));
        return $update;
    }
    
    public function deleteUser($idUser) {
        $delete = $this->delete(array("id_user" => $idUser));
        return $delete;
    }
}
