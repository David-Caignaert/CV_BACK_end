<?php
require_once('class.Candidat.php');

class Formation implements JsonSerializable
{
  private $id = 0;
  private $ville = '';
  private $annee_obtention = '';
  private $intitule = '';
  private $lieu = '';

  private $lesCandidats = array();

  public function __construct($id=0,$ville='',$annee_obtention='',$intitule='',$lieu='')
  {
    $this-> id = $id;
    $this-> ville = $ville;
    $this-> annee_obtention = $annee_obtention;
    $this-> intitule = $intitule;
    $this-> lieu = $lieu;
  }
  function getId() {return $this->id;} 
  function getVille() {return $this->ville;} 
  function getAnneeobtention() {return $this->anneeobtention;} 
  function getIntitule() {return $this->intitule;} 
  function getLieu() {return $this->lieu;} 
  function getLesCandidats() {return $this->lesCandidats;} 
  
  function setId($id) {$this->id = $id;} 
  function setVille($ville) {$this->ville = $ville;} 
  function setAnneeobtention($anneeobtention) {$this->anneeobtention = $anneeobtention;} 
  function setIntitule($intitule) {$this->intitule = $intitule;} 
  function setLieu($lieu) {$this->lieu = $lieu;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

  public function jsonSerialize(){
    return get_object_vars($this);
  }
}
?>