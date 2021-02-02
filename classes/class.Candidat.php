<?php
require_once('class.Centre_interet.php');
require_once('class.Experience_pro.php');
require_once('class.Formation.php');
require_once('class.Language_programmation.php');

class Candidat implements JsonSerializable
{
	private $id = 0;
  private $nom = '';
  private $prenom ='';
  private $adresse = '';
  private $mail = '';
  private $ville = '';
  private $dateNaissance = '';
  private $info = '';

  private $lesCentreInteret = array();
  private $lesExperiencesPro = array();
  private $lesFormations = array();
  private $lesLanguagesDeProgrammations = array();

  public function __construct($id=0,$nom='',$prenom='',$adresse='',
  $mail='',$ville='',$dateNaissance='',$info='')
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->adresse = $adresse;
    $this->mail = $mail;
    $this->ville = $ville;
    $this->dateNaissance = $dateNaissance;
    $this->info = $info;
	}
	
	//getter
	function getId() {return $this->id;} 
	function getNom() {return $this->nom;} 
	function getPrenom() {return $this->prenom;} 
	function getAdresse() {return $this->adresse;} 
	function getMail() {return $this->mail;} 
	function getVille() {return $this->ville;} 
	function getDateNaissance() {return $this->dateNaissance;} 
	function getInfo() {return $this->info;} 
	function getLesCentreInteret() {return $this->lesCentreInteret;} 
	function getLesExperiencesPro() {return $this->lesExperiencesPro;} 
	function getLesFormations() {return $this->lesFormations;} 
	function getLesLanguagesDeProgrammations() {return $this->lesLanguagesDeProgrammations; } 
	
	//setter
	function setId($id) {$this->id = $id;} 
	function setNom($nom) {$this->nom = $nom;} 
	function setPrenom($prenom) {$this->prenom = $prenom;} 
	function setAdresse($adresse) {$this->adresse = $adresse;} 
	function setMail($mail) {$this->mail = $mail;} 
	function setVille($ville) {$this->ville = $ville;} 
	function setDateNaissance($dateNaissance) {$this->dateNaissance = $dateNaissance;} 
	function setInfo($info) {$this->info = $info;} 
	function setLesCentreInteret($lesCentreInteret) {$this->lesCentreInteret = $lesCentreInteret; } 
	function setLesExperiencesPro($lesExperiencesPro) {$this->lesExperiencesPro = $lesExperiencesPro;} 
	function setLesFormations($lesFormations) {$this->lesFormations = $lesFormations;} 
	function setLesLanguagesDeProgrammations($lesLanguagesDeProgrammations) {$this->lesLanguagesDeProgrammations = $lesLanguagesDeProgrammations;} 
	
	public function jsonSerialize(){
		return get_object_vars($this);
	
}
}






?>