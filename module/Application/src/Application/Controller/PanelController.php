<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Crypt\Password\Bcrypt;
//Componentes de autenticación
use Zend\Authentication\AuthenticationService;
//Incluir formularios
use Application\Form\EditInfoUser;
use Application\Form\RegisterUserAdmin;
use Application\Form\UpdateUserAdmin;
use Zend\Session\Container;
use Application\Model\TblUserModel;

class PanelController extends AbstractActionController {
    /**
     *
     * @var type 
     */
    private $dbAdapter;
    private $auth;
    private $container;

    public function __construct() {
        //Cargamos el servicio de autenticación en el constructor
        $this->container = new Container('datosUsuario');
        $this->auth = new AuthenticationService();
        if(count($this->auth->getStorage()->read()) == 0) {
            header("Location: /Prueba");
            exit;
        }
    }

    public function indexAction() {
        
        return new ViewModel(array("datosUsuario" => $this->container->datosUsuario));
    }
    
    public function editinfoAction() {
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
        $formEditInfoUser = new EditInfoUser();
        $queryUser = new TblUserModel($this->dbAdapter);
        $result = $queryUser->getUser($this->container->datosUsuario->id_user);
        if(count($result) > 0) {
            $formEditInfoUser->setData($result[0]);
        }
        return new ViewModel(array("datosUsuario" => $this->container->datosUsuario, "editInfo" => $formEditInfoUser));
    }
    
    public function editinfouserAction() {
        
        if($this->request->getPost("submit")){
            $request = $this->getRequest();
            $formRegister = new EditInfoUser();
            $formRegister->setInputFilter($formRegister->getInputFilter());
            $formRegister->setData($request->getPost());
            
            if($formRegister->isValid()) {
                $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
                $datos = $request->getPost();
                
                $queryUser = new TblUserModel($this->dbAdapter);
                $result = $queryUser->getUserDiferent($datos->email, $datos->id_user);
                if(count($result) == 0 ) {
                    if($datos->password_2 != "") {
                        $bcrypt = new Bcrypt(array(
                        'salt' => 'key_encrypt_click',
                        'cost' => 5));

                        $password = $bcrypt->create($datos->password_2);
                    } else {
                        $password = $this->container->datosUsuario->password_2;
                    }
                    $queryUser->updateEditUser($datos->name, $datos->email, $password, $datos->phone, $datos->id_user);
                    
                    if($queryUser) {
                        $text = "Data updated correctly.";
                    } else {
                        $text = "The data could not be updated correctly.";
                    }
                } else {
                    $text = "The email you want to update already exists.";
                }
            } else {
                $text = "Error while trying to send data.";
            }
            
            return new ViewModel(array("result" => $text));
        }
    }
    
    public function listuserAction() {
        if($this->container->datosUsuario->id_rol == 1 || $this->container->datosUsuario->id_rol == 2) {
            $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
            $queryUser = new TblUserModel($this->dbAdapter);
            $result = $queryUser->getAllUser($this->container->datosUsuario->id_user);
            return new ViewModel(array("result" => $result, "datosUsuario" => $this->container->datosUsuario));
        } else {
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/panel');
        }
    }
    
    public function edituserAction() {
        if($this->container->datosUsuario->id_rol == 1) {
            $id = $_GET['id'];
            $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
            $formEditInfoUser = new UpdateUserAdmin();
            $queryUser = new TblUserModel($this->dbAdapter);
            $result = $queryUser->getUser($id);
            if(count($result) > 0) {
                $formEditInfoUser->setData($result[0]);
            }
            return new ViewModel(array("datosUsuario" => $this->container->datosUsuario, "editInfo" => $formEditInfoUser));
        } else {
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/panel');
        }
    }
    
    public function deleteuserAction() {
        if($this->container->datosUsuario->id_rol == 1) {
            $id = $_GET['id'];
            $yes = isset($_GET['yes']) ? $_GET['yes'] : "";
            if($yes == 1) {
                $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
                $queryUser = new TblUserModel($this->dbAdapter);
                $queryUser->deleteUser($id);

                return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/listuser');
            } else {
                return new ViewModel(array("id"=>$id));
            }
        } else {
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/panel');
        }
    }
    
    public function createuserAction() {
        if($this->container->datosUsuario->id_rol == 1) {
            $formRegister = new RegisterUserAdmin("form");

            return new ViewModel(array('formRegister'=>$formRegister));
        } else {
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/panel');
        }
    }
    
    public function savenewuserAction() {
        
        if($this->request->getPost("submit")){
            $request = $this->getRequest();
            $formRegister = new RegisterUserAdmin();
            $formRegister->setInputFilter($formRegister->getInputFilter());
            $formRegister->setData($request->getPost());
            
            if($formRegister->isValid()) {
                $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
                $datos = $request->getPost();
                
                $queryUser = new TblUserModel($this->dbAdapter);
                $result = $queryUser->getUserDiferent($datos->email, 0);
                if(count($result) == 0 ) {
                    if($datos->password_2 != "") {
                        $bcrypt = new Bcrypt(array(
                        'salt' => 'key_encrypt_click',
                        'cost' => 5));

                        $password = $bcrypt->create($datos->password_2);
                    } else {
                        $password = $this->container->datosUsuario->password_2;
                    }
                    $queryUser->addUserAdmin($datos->name, $datos->email, $password, $datos->phone, $datos->id_rol, $datos->reading, $datos->estado);
                    
                    if($queryUser) {
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/listuser');
                    } else {
                        $text = "The data could not be saved correctly.";
                    }
                } else {
                    $text = "The email you want to saved already exists.";
                }
            } else {
                $text = "Error while trying to send data.";
            }
            
            return new ViewModel(array("result" => $text));
        }
    }
    
    public function editinfouseradminAction() {
        
        if($this->request->getPost("submit")){
            $request = $this->getRequest();
            $formRegister = new RegisterUserAdmin();
            $formRegister->setInputFilter($formRegister->getInputFilter());
            $formRegister->setData($request->getPost());
            
            if($formRegister->isValid()) {
                $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
                $datos = $request->getPost();
                
                $queryUser = new TblUserModel($this->dbAdapter);
                $result = $queryUser->getUserDiferent($datos->email, $datos->id_user);
                if(count($result) == 0 ) {
                    if($datos->password_2 != "") {
                        $bcrypt = new Bcrypt(array(
                        'salt' => 'key_encrypt_click',
                        'cost' => 5));

                        $password = $bcrypt->create($datos->password_2);
                    } else {
                        $password = $this->container->datosUsuario->password_2;
                    }
                    $queryUser->updateEditUserAdmin($datos->name, $datos->email, $password, $datos->phone, $datos->id_rol, $datos->reading, $datos->estado, $datos->id_user);
                    
                    if($queryUser) {
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/listuser');
                    } else {
                        $text = "The data could not be updated correctly.";
                    }
                } else {
                    $text = "The email you want to update already exists.";
                }
            } else {
                $text = "Error while trying to send data.";
            }
            
            return new ViewModel(array("result" => $text));
        }
    }
}
