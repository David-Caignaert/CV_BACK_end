<?php
//Création de relation entre page
require_once('class.Candidat.php');

//Création de la classe experience pro
class Experience_pro implements JsonSerializable
{
  //Déclaration des variables
  private $id = 0;
  private $dateDebut = '';
  private $dateFin = '';
  private $intitule = '';
  private $lieu = '';
  private $ville = '';
  
  //Déclaration des variables pour la relation entre les tables
  private $lesCandidats = array();

  //Création du constructeur
  public function __construct($id=0,$dateDebut='',$dateFin='',
  $intitule='',$lieu='',$ville='')
  {
    $this-> id = $id;
    $this-> dateDebut = $dateDebut;
    $this-> dateFin = $dateFin;
    $this-> intitule = $intitule;
    $this-> lieu = $lieu;
    $this-> ville = $ville;
  } 
  //Getter
  function getId() {return $this->id;} 
  function getDatedebut() {return $this->dateDebut;} 
  function getDatefin() {return $this->dateFin;} 
  function getIntitule() {return $this->intitule;} 
  function getLieu() {return $this->lieu;} 
  function getVille() {return $this->ville;} 
  function getLesCandidats() {return $this->lesCandidats;} 

  //Setter
  function setId($id) {$this->id = $id;} 
  function setDatedebut($dateDebut) {$this->dateDebut = $dateDebut;} 
  function setDatefin($dateFin) {$this->dateFin = $dateFin;} 
  function setIntitule($intitule) {$this->intitule = $intitule;} 
  function setLieu($lieu) {$this->lieu = $lieu;} 
  function setVille($ville) {$this->ville = $ville;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

	//Sécifier les données en JSON
  public function jsonSerialize(){
    return get_object_vars($this);
  }
}
?>