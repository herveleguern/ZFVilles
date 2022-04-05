<?php
class Application_Model_DbTable_Ville extends Zend_Db_Table_Abstract
{
    protected $_name = 'ville'; //table des villes

    public function obtenirVille($id) {
        $row = $this->fetchRow("id='" . $id . "'");
        if (!$row) {
            throw new Exception("Impossible de trouver l'enregistrement");
        }
        return $row->toArray();
    }

    public function modifierVille($id, $nom, $langue)
    {
        $data = array(
            'id' => utf8_decode($id),
            'nom' => utf8_decode($nom),
            'langue' => utf8_decode($langue)
        );
        $this->update($data, "id='" . $id . "'");
    }
    
    public function ajouterVille($id, $nom, $langue)
    {
        $data = array(
            'id' => utf8_decode($id),
            'nom' => utf8_decode($nom),
            'langue' => utf8_decode($langue)
        );
        $this->insert($data);
    }

    public function supprimerVille($id)
    {
        $this->delete("id='" . $id . "'");
    }
}
?>
