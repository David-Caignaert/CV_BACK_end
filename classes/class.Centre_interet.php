<?php
//Création de relation entre page
require_once('class.Candidat.php');

//Creation de la classe centre d'interet
class Centre_interet implements JsonSerializable
{
  //déclaration des variables
  private $id = 0;
  private $intitule ='';

	//Déclaration des variables pour la relation entre les tables
  private $lesCandidats = array();
  
  //Création du constructeur
  public function __construct($id=0,$intitule='')
  {
    $this->id = $id;
    $this->intitule = $intitule;
  }

  //getter
  function getId() {return $this->id;} 
  function getIntitule() {return $this->intitule;} 
  function getLesCandidats() {return $this->lesCandidats;} 
  
  //setter
  function setId($id) {$this->id = $id;}
  function setIntitule($intitule) {$this->intitule = $intitule;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

	//Sécifier les données en JSON
  public function jsonSerialize(){
    return get_object_vars($this);
  }
}
?>