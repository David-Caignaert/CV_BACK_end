<?php
require_once('class.Candidat.php');

class Centre_interet implements JsonSerializable
{
  private $id = 0;
  private $intitule ='';

  private $lesCandidats = array();

  public function __construct($id=0,$intitule='')
  {
    $this->id = $id;
    $this->intitule = $intitule;
  }
  
  function getId() {return $this->id;} 
  function getIntitule() {return $this->intitule;} 
  function getLesCandidats() {return $this->lesCandidats;} 
  
  function setId($id) {$this->id = $id;}
  function setIntitule($intitule) {$this->intitule = $intitule;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

  public function jsonSerialize(){
    return get_object_vars($this);
  }
}
?>