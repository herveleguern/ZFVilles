<?php
class VilleController extends Zend_Controller_Action {


    public function indexAction() {
        $TVille = new Application_Model_DbTable_Ville();
        $lesVilles=$TVille->fetchAll();
        $this->view->lesVilles = $lesVilles;
    }

    public function ajouterAction() {
        $form = new Application_Form_Ville();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $nom = $form->getValue('nom');
                $langue = $form->getValue('langue');
                $TVille = new Application_Model_DbTable_Ville();
                $TVille->ajouterVille($id, $nom, $langue);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function modifierAction() {
        $form = new Application_Form_Ville();
$this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $nom = $form->getValue('nom');
                $langue = $form->getValue('langue');
                $lesVilles = new Application_Model_DbTable_Ville();
                $lesVilles->modifierVille($id, $nom, $langue);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 1);
            $lesVilles = new Application_Model_DbTable_Ville();
//préremplir-peupler le formulaire avec la ville sélectionnée
            $form->populate($lesVilles->obtenirVille($id));
        }
    }



    public function supprimerAction() {
        if ($this->getRequest()->isPost()) {
            $supprimer = $this->getRequest()->getPost('supprimer');
            if ($supprimer == 'Oui') {
                $id = $this->getRequest()->getPost('id');
                $lesVille = new Application_Model_DbTable_Ville();
                $lesVille->supprimerVille($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $lesVilles = new Application_Model_DbTable_Ville();
            $this->view->ville = $lesVilles->obtenirVille($id);
        }
    }

  
}
?>

