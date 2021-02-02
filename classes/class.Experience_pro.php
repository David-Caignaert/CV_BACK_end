<?php
require_once('class.Candidat.php');

class Experience_pro implements JsonSerializable
{
  private $id = 0;
  private $date_debut = '';
  private $date_fin = '';
  private $intitule = '';
  private $lieu = '';
  private $ville = '';
  
  private $lesCandidats = array();
  public function __construct($id=0,$date_debut='',$date_fin='',
  $intitule='',$lieu='',$ville='')
  {
    $this-> id = $id;
    $this-> date_debut = $date_debut;
    $this-> date_fin = $date_fin;
    $this-> intitule = $intitule;
    $this-> lieu = $lieu;
    $this-> ville = $ville;
  } 
   
  function getId() {return $this->id;} 
  function getDatedebut() {return $this->datedebut;} 
  function getDatefin() {return $this->datefin;} 
  function getIntitule() {return $this->intitule;} 
  function getLieu() {return $this->lieu;} 
  function getVille() {return $this->ville;} 
  function getLesCandidats() {return $this->lesCandidats;} 

  
  function setId($id) {$this->id = $id;} 
  function setDatedebut($datedebut) {$this->datedebut = $datedebut;} 
  function setDatefin($datefin) {$this->datefin = $datefin;} 
  function setIntitule($intitule) {$this->intitule = $intitule;} 
  function setLieu($lieu) {$this->lieu = $lieu;} 
  function setVille($ville) {$this->ville = $ville;} 
  function setLesCandidats($lesCandidats) {$this->lesCandidats = $lesCandidats;} 

  public function jsonSerialize(){
    return get_object_vars($this);
  }
}
?>