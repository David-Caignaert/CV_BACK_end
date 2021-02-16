<?php
//Création de relation entre page
require_once('class.Candidat.php');

//Création de la classe Formation
class Formation implements JsonSerializable
{
  //déclaration des variables
  private $id = 0;
  private $ville = '';
  private $anneeObtention = '';
  private $intitule = '';
  private $lieu = '';

  //Déclaration des variables pour la relation entre les tables
  private $lesCandidats = array();

  //Création du constructeur
  public function __construct($id=0,$ville='',$anneeObtention='',$intitule='',$lieu='')
  {
    $this-> id = $id;
    $this-> ville = $ville;
    $this-> anneeObtention = $anneeObtention;
    $this-> intitule = $intitule;
    $this-> lieu = $lieu;
  }

  //Les getter
  function getId() {return $this->id;} 
  function getVille() {return $this->ville;} 
  function getAnneeobtention() {return $this->anneeObtention;} 
  function getIntitule() {return $this->intitule;} 
  function getLieu() {return $this->lieu;} 
  function getLesCandidats() {return $this->lesCandidats;} 
  
  //Les setter
  function setId($id) {$this->id = $id;} 
  function setVille($ville) {$this->ville = $ville;} 
  function setAnneeobtention($anneeObtention) {$this->anneeObtention = $anneeObtention;} 
  function setIntitule($intitule) {$this->intitule = $intitule;} 
  function setLieu($lieu) {$this->lieu = $lieu;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

	//Sécifier les données en JSON
  public function jsonSerialize(){
    return get_object_vars($this);
  }
}
?>