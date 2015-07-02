<?php

/**
 * Row definition class for table etudiant.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Etudiant_Row setFromArray($data)
 *
 * @property integer $cin
 * @property string $nom
 * @property string $prenom
 * @property string $date_naissance
 * @property string $lieu_naissance
 * @property integer $ville
 * @property integer $pays
 * @property string $nationalite
 * @property string $passeport
 * @property string $genre
 * @property string $adresse
 * @property integer $code_postal
 * @property integer $tel
 * @property integer $annee_bac
 * @property string $branche
 * @property string $session
 * @property string $mention
 * @property string $etablissement
 * @property string $specialite
 * @property string $niveau
 * @property string $situation_universitaire
 * @property string $login
 * @property string $password
 * @property string $actif
 */
abstract class Application_Model_Etudiant_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'cin' field
     *
     * @param integer $Cin
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setCin($Cin)
    {
        $this->cin = $Cin;
        return $this;
    }

    /**
     * Get value of 'cin' field
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set value for 'nom' field
     *
     * @param string $Nom
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setNom($Nom)
    {
        $this->nom = $Nom;
        return $this;
    }

    /**
     * Get value of 'nom' field
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set value for 'prenom' field
     *
     * @param string $Prenom
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setPrenom($Prenom)
    {
        $this->prenom = $Prenom;
        return $this;
    }

    /**
     * Get value of 'prenom' field
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set value for 'date_naissance' field
     *
     * @param string $DateNaissance
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setDateNaissance($DateNaissance)
    {
        $this->date_naissance = $DateNaissance;
        return $this;
    }

    /**
     * Get value of 'date_naissance' field
     *
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set value for 'lieu_naissance' field
     *
     * @param string $LieuNaissance
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setLieuNaissance($LieuNaissance)
    {
        $this->lieu_naissance = $LieuNaissance;
        return $this;
    }

    /**
     * Get value of 'lieu_naissance' field
     *
     * @return string
     */
    public function getLieuNaissance()
    {
        return $this->lieu_naissance;
    }

    /**
     * Set value for 'ville' field
     *
     * @param integer $Ville
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setVille($Ville)
    {
        $this->ville = $Ville;
        return $this;
    }

    /**
     * Get value of 'ville' field
     *
     * @return integer
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set value for 'pays' field
     *
     * @param integer $Pays
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setPays($Pays)
    {
        $this->pays = $Pays;
        return $this;
    }

    /**
     * Get value of 'pays' field
     *
     * @return integer
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set value for 'nationalite' field
     *
     * @param string $Nationalite
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setNationalite($Nationalite)
    {
        $this->nationalite = $Nationalite;
        return $this;
    }

    /**
     * Get value of 'nationalite' field
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set value for 'passeport' field
     *
     * @param string $Passeport
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setPasseport($Passeport)
    {
        $this->passeport = $Passeport;
        return $this;
    }

    /**
     * Get value of 'passeport' field
     *
     * @return string
     */
    public function getPasseport()
    {
        return $this->passeport;
    }

    /**
     * Set value for 'genre' field
     *
     * @param string $Genre
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setGenre($Genre)
    {
        $this->genre = $Genre;
        return $this;
    }

    /**
     * Get value of 'genre' field
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set value for 'adresse' field
     *
     * @param string $Adresse
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setAdresse($Adresse)
    {
        $this->adresse = $Adresse;
        return $this;
    }

    /**
     * Get value of 'adresse' field
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set value for 'code_postal' field
     *
     * @param integer $CodePostal
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setCodePostal($CodePostal)
    {
        $this->code_postal = $CodePostal;
        return $this;
    }

    /**
     * Get value of 'code_postal' field
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * Set value for 'tel' field
     *
     * @param integer $Tel
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setTel($Tel)
    {
        $this->tel = $Tel;
        return $this;
    }

    /**
     * Get value of 'tel' field
     *
     * @return integer
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set value for 'annee_bac' field
     *
     * @param integer $AnneeBac
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setAnneeBac($AnneeBac)
    {
        $this->annee_bac = $AnneeBac;
        return $this;
    }

    /**
     * Get value of 'annee_bac' field
     *
     * @return integer
     */
    public function getAnneeBac()
    {
        return $this->annee_bac;
    }

    /**
     * Set value for 'branche' field
     *
     * @param string $Branche
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setBranche($Branche)
    {
        $this->branche = $Branche;
        return $this;
    }

    /**
     * Get value of 'branche' field
     *
     * @return string
     */
    public function getBranche()
    {
        return $this->branche;
    }

    /**
     * Set value for 'session' field
     *
     * @param string $Session
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setSession($Session)
    {
        $this->session = $Session;
        return $this;
    }

    /**
     * Get value of 'session' field
     *
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set value for 'mention' field
     *
     * @param string $Mention
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setMention($Mention)
    {
        $this->mention = $Mention;
        return $this;
    }

    /**
     * Get value of 'mention' field
     *
     * @return string
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Set value for 'etablissement' field
     *
     * @param string $Etablissement
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setEtablissement($Etablissement)
    {
        $this->etablissement = $Etablissement;
        return $this;
    }

    /**
     * Get value of 'etablissement' field
     *
     * @return string
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set value for 'specialite' field
     *
     * @param string $Specialite
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setSpecialite($Specialite)
    {
        $this->specialite = $Specialite;
        return $this;
    }

    /**
     * Get value of 'specialite' field
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set value for 'niveau' field
     *
     * @param string $Niveau
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setNiveau($Niveau)
    {
        $this->niveau = $Niveau;
        return $this;
    }

    /**
     * Get value of 'niveau' field
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set value for 'situation_universitaire' field
     *
     * @param string $SituationUniversitaire
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setSituationUniversitaire($SituationUniversitaire)
    {
        $this->situation_universitaire = $SituationUniversitaire;
        return $this;
    }

    /**
     * Get value of 'situation_universitaire' field
     *
     * @return string
     */
    public function getSituationUniversitaire()
    {
        return $this->situation_universitaire;
    }

    /**
     * Set value for 'login' field
     *
     * @param string $Login
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setLogin($Login)
    {
        $this->login = $Login;
        return $this;
    }

    /**
     * Get value of 'login' field
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set value for 'password' field
     *
     * @param string $Password
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setPassword($Password)
    {
        $this->password = $Password;
        return $this;
    }

    /**
     * Get value of 'password' field
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set value for 'actif' field
     *
     * @param string $Actif
     *
     * @return Application_Model_Etudiant_Row
     */
    public function setActif($Actif)
    {
        $this->actif = $Actif;
        return $this;
    }

    /**
     * Get value of 'actif' field
     *
     * @return string
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissement()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement');
    }

    /**
     * Get a row of Pays.
     *
     * @return Application_Model_Pays_Row
     */
    public function getPaysRowByPays()
    {
        return $this->findParentRow('Application_Model_Pays_DbTable', 'pays');
    }

    /**
     * Get a row of Ville.
     *
     * @return Application_Model_Ville_Row
     */
    public function getVilleRowByVille()
    {
        return $this->findParentRow('Application_Model_Ville_DbTable', 'ville');
    }

    /**
     * Get a list of rows of Demande.
     *
     * @return Application_Model_Demande_Rowset
     */
    public function getDemandeRowsByCIN()
    {
        return $this->findDependentRowset('Application_Model_Demande_DbTable', 'CIN');
    }

    /**
     * Get a list of rows of Etudes.
     *
     * @return Application_Model_Etudes_Rowset
     */
    public function getEtudesRowsByCin()
    {
        return $this->findDependentRowset('Application_Model_Etudes_DbTable', 'cin');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->nom;
    }
}
