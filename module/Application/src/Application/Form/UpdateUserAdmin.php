<?php
namespace Application\Form;

use Zend\Form\Form;

class UpdateUserAdmin extends Form
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
                'class' => 'input form-control'
            ),
            'options' => array(
                'label' => 'Password: ',
            ),
        ));
        
        $this->add(array(
            'name' => 'reading',
            'type' => 'radio',
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'Allow reading: ',
                'value_options' => array(
                    '0' => 'False',
                    '1' => 'True',
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'id_rol',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'Profile: ',
                'value_options' => array(
                    '1' => 'Admin',
                    '2' => 'Agent',
                    '3' => 'Customer',
                    '4' => 'Server',
                    '5' => 'Client',
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'estado',
            'type' => 'radio',
            'attributes' => array(
                'class' => 'input form-control',
                'required'=>'required'
            ),
            'options' => array(
                'label' => 'Status: ',
                'value_options' => array(
                    '0' => 'False',
                    '1' => 'True',
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'id_user',
            'attributes' => array(
                'type' => 'hidden',
                'class' => 'input form-control',
                'required'=>'required'
            )
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