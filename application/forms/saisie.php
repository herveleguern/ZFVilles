<?php

class Application_Form_Saisie extends Zend_Form
{
        //formulaire pour controle de saisie
        public function init()
        {
                //validateurs
                $nonVide = new Zend_Validate_NotEmpty();
                $nonVide->setMessage("Champ obligatoire");

                $ageTrancheValide = new Zend_Validate_Between(array('min' => 7, 'max' => 77, 'inclusive' => TRUE));
                $ageTrancheValide->setMessage("Age compris entre 7 et 77 ans");

                $numerique = new Zend_Validate_Digits();
                $numerique->setMessage("Saisir des chiffres");

                $longueurCP=new Zend_Validate_StringLength(array('min' => 5, 'max' => 5));
                $longueurCP->setMessage("CP sur 5 chiffres");

                //elements de formulaire
                $ville = new Zend_Form_Element_Text('ville');
                $ville->setLabel('Ville')
                        ->setRequired();        //de base, message en anglais (voir nonVide)

                $age = new Zend_Form_Element_Text("age");
                $age->setLabel("Age:")
                        ->setRequired()
                        ->addValidator($nonVide)
                        ->addValidator($numerique)
                        ->addValidator($ageTrancheValide);

                $cp = new Zend_Form_Element_Text("cp");
                $cp->setLabel("Cope postal:")
                ->setRequired()
                ->addValidator($nonVide)
                ->addValidator($numerique)
                ->addValidator($longueurCP);

                $btEnvoyer = new Zend_Form_Element_Submit('envoyer');
                $this->addElements(array($ville, $age, $cp, $btEnvoyer));
        }
}
