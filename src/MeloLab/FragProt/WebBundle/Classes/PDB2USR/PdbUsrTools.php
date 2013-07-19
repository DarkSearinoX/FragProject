<?php

namespace MeloLab\FragProt\WebBundle\Classes\PDB2USR;

use Doctrine\Bundle\DoctrineBundle\Registry;
use MeloLab\FragProt\WebBundle\Entity\FragmentFile;
use Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine;


/**
 * Contract checker and mailing system.
 * @author Felipe Rodriguez
 */
class PdbUsrTools {
    
    private $doctrine;
    private $templating;
//    private $mailer;
    
    public function setDoctrine(Registry $doctrine) {
        $this->doctrine = $doctrine;
        return $this;
    }
    
    public function getDoctrine() {
        return $this->doctrine;
    }

    public function setTemplating(TimedTwigEngine $templating) {
        $this->templating = $templating;
        return $this;
    }
    
    public function getTemplating() {
        return $this->templating;
    }
    
//    public function setMailer(Swift_Mailer $mailer) {
//        $this->mailer= $mailer;
//        return $this;
//    }
//    
//    public function getMailer() {
//        return $this->mailer;
//    }
    
    
    public function convertUploadedFile(FragmentFile $fragment){
        
        //Get Path for file
        $pdbFile = $fragment->getFragmentPdbName();
        
        //Open file 
        //######################## TO DO ####################
        
        //Convert pdb to usr
        $usr = $this->convertPdb2Usr($pdbFile);

        
        return $usr;
    }
    
    private function convertPdb2Usr($pdbFile){

        //######################## TO DO ####################
        return 'asdf';
    }
    
  
}

?>
