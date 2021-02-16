<?php
//Création de relation entre page
require_once('class.Candidat.php');

//Création de la classe Language programmation
class Language_programmation implements JsonSerializable
{
  //Déclaration des variables
  private $id = 0;
  private $nom = '';
  private $logo = '';

  //Déclaration des variables pour la relation entre les tables
  private $lesCandidats = array();

  //Création du constructeur
  public function __construct($id=0,$nom='',$logo='')
  {
    $this-> id = $id;
    $this-> nom = $nom;
    $this-> logo = $logo;

  }

  //Les getter
  function getId() {return $this->id;} 
  function getNom() {return $this->nom;} 
  function getLogo() {return $this->logo;} 
  function getLesCandidats() {return $this->lesCandidats;} 
  
  //Les setter
  function setId($id) {$this->id = $id;} 
  function setNom($nom) {$this->nom = $nom;} 
  function setLogo($logo) {$this->logo = $logo;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

  //Sécifier les données en JSON
  public function jsonSerialize(){
    return get_object_vars($this);
  }
}

?>