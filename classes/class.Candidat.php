<?php
//Création de relation entre page
require_once('class.Centre_interet.php');
require_once('class.Experience_pro.php');
require_once('class.Formation.php');
require_once('class.Language_programmation.php');

//Création de la classe Candidat
class Candidat implements JsonSerializable
{
	//Déclaration des variables
	private $id = 0;
  private $nom = '';
  private $prenom ='';
  private $adresse = '';
  private $mail = '';
  private $ville = '';
  private $dateNaissance = '';
  private $info = '';
	private $codePostal = 0;
	private $numTel = '';

	//Déclaration des variables pour la relation entre les tables
  private $lesCentreInteret = array();
  private $lesExperiencesPro = array();
  private $lesFormations = array();
  private $lesLanguagesDeProgrammations = array();
	
	//Création du constructeur
  public function __construct($id=0,$nom='',$prenom='',$adresse='',
  $mail='',$ville='',$dateNaissance='',$info='',$codePostal=0,$numTel='')
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->adresse = $adresse;
    $this->mail = $mail;
    $this->ville = $ville;
    $this->dateNaissance = $dateNaissance;
    $this->info = $info;
		$this->codePostal = $codePostal;
		$this->numTel = $numTel;
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
	function getCodePostal() {return $this->codePostal;} 
	function getNumTel() {return $this->numTel;} 
	
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
	function setCodePostal($codePostal) {$this->codePostal = $codePostal;} 
	function setNumTel($numTel) {$this->numTel = $numTel;} 
	
	//Sécifier les données en JSON
	public function jsonSerialize(){
		return get_object_vars($this);
	
}
}
?>