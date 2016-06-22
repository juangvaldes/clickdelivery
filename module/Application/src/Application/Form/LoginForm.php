<?php
namespace Application\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
     {
        parent::__construct($name);
      
       $this->setAttributes(array(
            'action'=>"",
            'method' => 'post'
        ));

        $this->add(array(
            'name' => 'usu',
            'attributes' => array(
                'type' => 'text',
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'E-mail: ',
            ),
        ));

         $this->add(array(
            'name' => 'pass',
            'attributes' => array(
                'type' => 'password',
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'Password: ',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array( 
                'type' => 'submit',
                'value' => 'Start',
                'title' => 'Start',
                'class' => 'btn btn-success'
            ),
        ));
  
    }
}

?>