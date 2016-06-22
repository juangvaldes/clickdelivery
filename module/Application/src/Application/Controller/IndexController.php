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
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
//Componentes de autenticación
use Zend\Authentication\AuthenticationService;
//Incluir formularios
use Application\Form\LoginForm;
use Application\Model\DeportesModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController {
    /**
     *
     * @var type 
     */
    private $dbAdapter;
    private $auth;

    public function __construct() {
        //Cargamos el servicio de autenticación en el constructor
        $this->auth = new AuthenticationService();
    }

    public function indexAction() {
        $auth = $this->auth;
        $identi = $auth->getStorage()->read();
        $text = null;
        
        //DbAdapter
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');

        //Creamos el formulario de login
        $form = new LoginForm("form");

        //Si nos llegan datos por post
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            ///if(!empty($this->request->getPost("pass")) && !empty($this->getRequest()->getPost("usu"))) {
                $authAdapter = new AuthAdapter($this->dbAdapter, 'tbl_user', 'email', 'password_2');

                /*
                  En el caso de que la contraseña en la db este cifrada
                  tenemos que utilizar el mismo algoritmo de cifrado
                 */
                $bcrypt = new Bcrypt(array(
                    'salt' => 'key_encrypt_click',
                    'cost' => 5));

                $securePass = $bcrypt->create($data->pass);

                //Establecemos como datos a autenticar los que nos llegan del formulario
                $authAdapter->setIdentity($data->usu)
                        ->setCredential($securePass);

                //Le decimos al servicio de autenticación que el adaptador
                $auth->setAdapter($authAdapter);

                //Le decimos al servicio de autenticación que lleve a cabo la identificacion
                $result = $auth->authenticate();

                //Si el resultado del login es falso, es decir no son correctas las credenciales
                if ($authAdapter->getResultRowObject() == false) {
                    //Crea un mensaje flash y redirige
                    $this->flashMessenger()->addMessage("Credenciales incorrectas, intentalo de nuevo");
                    return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/');
                } else {
                    // Le decimos al servicio que guarde en una sesión
                    // el resultado del login cuando es correcto
                    $auth->getStorage()->write($authAdapter->getResultRowObject());
                    //Nos redirige a una pagina interior
                    $datosUsuario = $this->auth->getStorage()->read();
                    if($datosUsuario->estado != 0) {
                        $container = new Container('datosUsuario');
                        $container->datosUsuario = $datosUsuario;

                        //if($datosUsuario->perfil == 2){
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/panel');
                        /*} else {
                            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/application/index/administrador');
                        }*/
                    } else {
                        $text = "The user is not authorized by the administrator.";
                    }
                }
            //} 
        }
        
        return new ViewModel(array("form" => $form, "text"=>$text));
    }
    
    public function closedAction() {
        //Cerramos la sesión borrando los datos de la sesión.
        $this->auth->clearIdentity();
        $container = new Container('datosUsuario');
        unset($container);
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/');
    }
}
