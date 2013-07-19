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
    
    //Private variables for the object
    private $doctrine;
    private $templating;
    
    private $x_pos = array();
    private $y_pos = array();
    private $z_pos = array();
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
    private function read_pdb_file($pdb_name,&$pdb_x,&$pdb_y,&$pdb_z,&$size){
		
    /*
    31 - 38        Real(8.3)     x            Orthogonal coordinates for X in Angstroms.
    39 - 46        Real(8.3)     y            Orthogonal coordinates for Y in Angstroms.
    47 - 54        Real(8.3)     z            Orthogonal coordinates for Z in Angstroms.
    */

    $file_handle = fopen($pdb_name, "r");
    $atom_cont = 0;	

        while (!feof($file_handle)) {
            $line = fgets($file_handle);

            if (substr($line,0,6) == "ATOM  " && substr($line,13,3) == "CA "){

                $pdb_x[]=(float)substr($line,31,8);
                $pdb_y[]=(float)substr($line,39,8);
                $pdb_z[]=(float)substr($line,47,8);
                $atom_cont++;
            }
            if (substr($line,0,6) == "ATOM  " && substr($line,13,3) == "CA "){
                $size++;
            }
        }

    fclose($file_handle);	

    }
    
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
