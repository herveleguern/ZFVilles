<?php

class Application_Form_Pays extends Zend_Form {

    public function init() {
        $id = new Zend_Form_Element_Text('id');
        $id->setLabel('Identifiant')
                ->setRequired();
        $nom = new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nom')
                ->setRequired();
        $continent = new Zend_Form_Element_Text('continent');
        $continent->setLabel('Continent')
                ->setRequired();

        $btEnvoyer = new Zend_Form_Element_Submit('envoyer');
        $this->addElements(array($id, $nom, $continent, $btEnvoyer));
    }

}

?>