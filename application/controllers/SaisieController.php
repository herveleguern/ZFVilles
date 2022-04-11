<?php
class SaisieController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $form = new Application_Form_Saisie();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $data = $form->getValues(); //tableau des données validées
                var_dump($data);
            } else {
                $form->populate($formData); //avec les messages d'erreur
            }
        }
    }
}
