<?php

/**
 * Row definition class for table retrait.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Retrait_Row setFromArray($data)
 *
 * @property integer $codedem
 * @property string $etablissement_actuel
 * @property string $code_inscription
 * @property string $cause
 * @property string $attestation_affectation
 */
abstract class Application_Model_Retrait_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codedem' field
     *
     * @param integer $Codedem
     *
     * @return Application_Model_Retrait_Row
     */
    public function setCodedem($Codedem)
    {
        $this->codedem = $Codedem;
        return $this;
    }

    /**
     * Get value of 'codedem' field
     *
     * @return integer
     */
    public function getCodedem()
    {
        return $this->codedem;
    }

    /**
     * Set value for 'etablissement_actuel' field
     *
     * @param string $EtablissementActuel
     *
     * @return Application_Model_Retrait_Row
     */
    public function setEtablissementActuel($EtablissementActuel)
    {
        $this->etablissement_actuel = $EtablissementActuel;
        return $this;
    }

    /**
     * Get value of 'etablissement_actuel' field
     *
     * @return string
     */
    public function getEtablissementActuel()
    {
        return $this->etablissement_actuel;
    }

    /**
     * Set value for 'code_inscription' field
     *
     * @param string $CodeInscription
     *
     * @return Application_Model_Retrait_Row
     */
    public function setCodeInscription($CodeInscription)
    {
        $this->code_inscription = $CodeInscription;
        return $this;
    }

    /**
     * Get value of 'code_inscription' field
     *
     * @return string
     */
    public function getCodeInscription()
    {
        return $this->code_inscription;
    }

    /**
     * Set value for 'cause' field
     *
     * @param string $Cause
     *
     * @return Application_Model_Retrait_Row
     */
    public function setCause($Cause)
    {
        $this->cause = $Cause;
        return $this;
    }

    /**
     * Get value of 'cause' field
     *
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Set value for 'attestation_affectation' field
     *
     * @param string $AttestationAffectation
     *
     * @return Application_Model_Retrait_Row
     */
    public function setAttestationAffectation($AttestationAffectation)
    {
        $this->attestation_affectation = $AttestationAffectation;
        return $this;
    }

    /**
     * Get value of 'attestation_affectation' field
     *
     * @return string
     */
    public function getAttestationAffectation()
    {
        return $this->attestation_affectation;
    }

    /**
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissementActuel()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement_actuel');
    }

    /**
     * Get a row of Demande.
     *
     * @return Application_Model_Demande_Row
     */
    public function getDemandeRowByCodedem()
    {
        return $this->findParentRow('Application_Model_Demande_DbTable', 'codedem');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->etablissement_actuel;
    }
}
