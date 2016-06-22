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
use Zend\Crypt\Password\Bcrypt;
use Zend\View\Model\ViewModel;
use Application\Form\RegisterUser;
use Application\Model\TblUserModel;

class RegisterController extends AbstractActionController {
   
    public $dbAdapter;
    
    public function __construct() {
       
    }

    public function indexAction() {
        
        $formRegister = new RegisterUser("formNewRegister");
        
        return new ViewModel(array('formRegister'=>$formRegister));
    }
    
    public function saveuserAction() {
        
        if($this->request->getPost("submit")){
            $request = $this->getRequest();
            $formRegister = new RegisterUser("form");
            $formRegister->setInputFilter($formRegister->getInputFilter());
            $formRegister->setData($request->getPost());
            
            if($formRegister->isValid()) {
                $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
                $datos = $request->getPost();
                
                $queryUser = new TblUserModel($this->dbAdapter);
                $result = $queryUser->getUserDiferent($datos->email, 0);
                if(count($result) == 0 ) {
                    $bcrypt = new Bcrypt(array(
                    'salt' => 'key_encrypt_click',
                    'cost' => 5));

                    $password = $bcrypt->create($datos->password_2);
                    
                    $queryUser->addUser($datos->name, $datos->email, $password, $datos->phone);
                    
                    if($queryUser) {
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/usersuccessful');
                    } else {
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/erroruser');
                    }
                } else {
                    return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/userexist');
                }
            } else {
                return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/errordata');
            }
        }
    }
    
    public function saveuserfbAction() {
            
            $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
            $name = $this->request->getPost("name_1");
            $phone = $this->request->getPost("phone_1");
            $email = $this->request->getPost("email_1");
            $password_2 = $this->request->getPost("password_2_1");

            $queryUser = new TblUserModel($this->dbAdapter);
            $result = $queryUser->getUserDiferent($email, 0);
            if(count($result) == 0 ) {
                $bcrypt = new Bcrypt(array(
                'salt' => 'key_encrypt_click',
                'cost' => 5));

                $password = $bcrypt->create($password_2);
                //echo $password;exit;
                $queryUser->addUser($name, $email, $password, $phone);

                if($queryUser) {
                    return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/usersuccessful');
                } else {
                    return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/erroruser');
                }
            } else {
                return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/userexist');
            }
    }
    
    public function usersuccessfulAction() {
        return new ViewModel();
    }
    
    public function erroruserAction() {
        return new ViewModel();
    }
    
    public function userexistAction() {
        return new ViewModel();
    }
    
    public function errordataAction() {
        return new ViewModel();
    }
}
