<?php
namespace Application\Form;

use Zend\Form\Form;

class RegisterUser extends Form
{
    public function __construct($name = null)
     {
        parent::__construct($name);
      
       $this->setAttributes(array(
            'action'=>"",
            'method' => 'post'
        ));

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'Name: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'email',
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
            'name' => 'phone',
            'attributes' => array(
                'type' => 'text',
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'Phone: ',
            ),
        ));

         $this->add(array(
            'name' => 'password_2',
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
                'value' => 'Save',
                'title' => 'Save',
                'class' => 'btn btn-success'
            ),
        ));
  
    }
}

?>