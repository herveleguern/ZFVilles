<?php
class PaysController extends Zend_Controller_Action {


    public function indexAction() {
        $TPays = new Application_Model_DbTable_Pays();
        $lesPays=$TPays->fetchAll();
        $this->view->lesPays = $lesPays;
    }

    public function ajouterAction() {
        $form = new Application_Form_Pays();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $nom = $form->getValue('nom');
                $continent = $form->getValue('continent');
                $TPays = new Application_Model_DbTable_Pays();
                $TPays->ajouterPays($id, $nom, $continent);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {
        $form = new Application_Form_Pays();
$this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $nom = $form->getValue('nom');
                $continent = $form->getValue('continent');
                $lesPays = new Application_Model_DbTable_Pays();
                $lesPays->modifierPays($id, $nom, $continent);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 1);
            $lesPays = new Application_Model_DbTable_Pays();
//préremplir-peupler le formulaire avec le pays
            $form->populate($lesPays->obtenirPays($id));
        }
    }



    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $id = $this->getRequest()->getPost('id');
                $lesPays = new Application_Model_DbTable_Pays();
                $lesPays->supprimerPays($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $lesPays = new Application_Model_DbTable_Pays();
            $this->view->pays = $lesPays->obtenirPays($id);
        }
    }

  
}
?>

