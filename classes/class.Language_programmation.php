<?php
require_once('class.Candidat.php');

class Language_programmation implements JsonSerializable
{
  private $id = 0;
  private $nom = '';
  private $logo = '';

  private $lesCandidats = array();

  public function __construct($id=0,$nom='',$logo='')
  {
    $this-> id = $id;
    $this-> nom = $nom;
    $this-> logo = $logo;

  }
  function getId() {return $this->id;} 
  function getNom() {return $this->nom;} 
  function getLogo() {return $this->logo;} 
  function getLesCandidats() {return $this->lesCandidats;} 
  
  function setId($id) {$this->id = $id;} 
  function setNom($nom) {$this->nom = $nom;} 
  function setLogo($logo) {$this->logo = $logo;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

  public function jsonSerialize(){
    return get_object_vars($this);
  }
}

?>