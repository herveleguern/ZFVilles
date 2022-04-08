<?php
class Application_Model_DbTable_Pays extends Zend_Db_Table_Abstract
{
    protected $_name = 'pays'; //table des pays

    public function obtenirPays($id) {
        $row = $this->fetchRow("id='" . $id . "'");
        if (!$row) {
            throw new Exception("Impossible de trouver l'enregistrement");
        }
        return $row->toArray();
    }

    public function modifierPays($id, $nom, $continent)
    {
        $data = array(
            'id' => utf8_decode($id),
            'nom' => utf8_decode($nom),
            'continent' => utf8_decode($continent)
        );
        $this->update($data, "id='" . $id . "'");
    }
    
    public function ajouterPays($id, $nom, $continent)
    {
        $data = array(
            'id' => utf8_decode($id),
            'nom' => utf8_decode($nom),
            'continent' => utf8_decode($continent)
        );
        $this->insert($data);
    }

    public function supprimerPays($id)
    {
        $this->delete("id='" . $id . "'");
    }
}
?>
