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
    
    private $usrArray = array();
    
    private $size;
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
    private function read_pdb_file($pdb_name){
		
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

                $this->pdb_x[]=(float)substr($line,31,8);
                $this->pdb_y[]=(float)substr($line,39,8);
                $this->pdb_z[]=(float)substr($line,47,8);
                $atom_cont++;
            }
            if (substr($line,0,6) == "ATOM  " && substr($line,13,3) == "CA "){
                $this->size++;
            }
        }

    fclose($file_handle);

    }
    
    public function convertUploadedFile(FragmentFile $fragment){
        
        //Get Path for file
        $pdbFile = $fragment->getFragmentPdbName();
        
        //#### TO DO #########3
        
        //Open file 
        $this->read_pdb_file($pdbFile);
        //Convert pdb to usr
        $usr = $this->convertPdb2Usr($pdbFile);
        
        return $usr;
    }
    
    private function convertPdb2Usr($pdbFile){
        
        $CTD = array(0.0,0.0,0.0);
        $size = count($this->pdb_x);

        foreach($this->pdb_x as $coord){
            $CTD[0] = $CTD[0] + $coord;	
        }
        foreach($this->pdb_y as $coord){
            $CTD[1] = $CTD[1] + $coord;	
        }
        foreach($this->pdb_z as $coord){
            $CTD[2] = $CTD[2] + $coord;	
        }

        $CTD[0] = $CTD[0] / $size;	
        $CTD[1] = $CTD[1] / $size;
        $CTD[2] = $CTD[2] / $size;

        $min_dist = 9999999;
        $max_dist = -9999999;
        $min_ind = 0;
        $max_ind = 0;

        for ($i = 0; $i < $size; $i++) {
            $d = sqrt(($CTD[0] - $this->pdb_x[$i])*($CTD[0] - $this->pdb_x[$i]) + ($CTD[1] - $this->pdb_y[$i])*($CTD[1] - $this->pdb_y[$i]) + ($CTD[2] - $this->pdb_z[$i])*($CTD[2] - $this->pdb_z[$i]));
            if ($d < $min_dist) {
                $min_ind = $i;
                $min_dist = $d;
            }
            if ($d > $max_dist) {
                $max_ind = $i;
                $max_dist = $d;
            }
        }

        $CST[0] = $this->pdb_x[$min_ind];
        $CST[1] = $this->pdb_y[$min_ind];
        $CST[2] = $this->pdb_z[$min_ind];

        $FCT[0] = $this->pdb_x[$max_ind];
        $FCT[1] = $this->pdb_y[$max_ind];
        $FCT[2] = $this->pdb_z[$max_ind];	

        $max_dist = -99999.99;
        $max_ind = 0;

        for ($i = 0; $i < $size; $i++) {
            $d = sqrt(($FCT[0] - $this->pdb_x[$i])*($FCT[0] - $this->pdb_x[$i]) + ($FCT[1] - $this->pdb_y[$i])*($FCT[1] - $this->pdb_y[$i]) + ($FCT[2] - $this->pdb_z[$i])*($FCT[2] - $this->pdb_z[$i]));
            if ($d > $max_dist) {
                $max_ind = $i;
                $max_dist = $d;
            }
        }

        $FTF[0] = $this->pdb_x[$max_ind];
        $FTF[1] = $this->pdb_y[$max_ind];
        $FTF[2] = $this->pdb_z[$max_ind];

        for ($i = 0; $i < $size; $i++) {
            $d1[$i] = sqrt(($CTD[0] - $this->pdb_x[$i])*($CTD[0] - $this->pdb_x[$i]) + ($CTD[1] - $this->pdb_y[$i])*($CTD[1] - $this->pdb_y[$i]) + ($CTD[2] - $this->pdb_z[$i])*($CTD[2] - $this->pdb_z[$i]));
            $d2[$i] = sqrt(($CST[0] - $this->pdb_x[$i])*($CST[0] - $this->pdb_x[$i]) + ($CST[1] - $this->pdb_y[$i])*($CST[1] - $this->pdb_y[$i]) + ($CST[2] - $this->pdb_z[$i])*($CST[2] - $this->pdb_z[$i]));
            $d3[$i] = sqrt(($FCT[0] - $this->pdb_x[$i])*($FCT[0] - $this->pdb_x[$i]) + ($FCT[1] - $this->pdb_y[$i])*($FCT[1] - $this->pdb_y[$i]) + ($FCT[2] - $this->pdb_z[$i])*($FCT[2] - $this->pdb_z[$i]));
            $d4[$i] = sqrt(($FTF[0] - $this->pdb_x[$i])*($FTF[0] - $this->pdb_x[$i]) + ($FTF[1] - $this->pdb_y[$i])*($FTF[1] - $this->pdb_y[$i]) + ($FTF[2] - $this->pdb_z[$i])*($FTF[2] - $this->pdb_z[$i]));
        }	

        $_CTD = array();
        $_CST = array();
        $_FCT = array();
        $_FTF = array();

        $this->MOMENTS($d1, $_CTD);
        $this->MOMENTS($d2, $_CST);
        $this->MOMENTS($d3, $_FCT);
        $this->MOMENTS($d4, $_FTF);

        //echo $_CST[2];
        $this->usrArray = array($_CTD[0],$_CTD[1],$_CTD[2],$_CST[0],$_CST[1],$_CST[2],$_FCT[0],$_FCT[1],$_FCT[2],$_FTF[0],$_FTF[1],$_FTF[2]);

    }
    
    private function MOMENTS($data_array, &$moment) {
        $moment[0] = 0.0;
        $moment[1] = 0.0;
        $moment[2] = 0.0;
        $moment[3] = 0.0;

        $N = count($data_array);

        $s = 0.0;
        for ($i = 0; $i < $N; $i++) {
            $s = $s + $data_array[$i]; 
        }
        $moment[0] = $s/$N;

        $ep = 0.0;

        for ($i = 0; $i < $N; $i++) {
            $s = $data_array[$i] - $moment[0]; 
            $ep = $ep + $s;
            $p = $s*$s;
            $moment[1] = $moment[1] + $p;
            $p = $p*$s;
            $moment[2] = $moment[2] + $p;
            $p = $p*$s;
            $moment[3] = $moment[3] + $p;
        }

        $moment[1] = $moment[1] - ($ep*$ep)/$N;
        $moment[1] = $moment[1]/($N);
        $sdev = sqrt($moment[1]);

        if ($moment[1]) {
            $moment[2] = $moment[2] / ($N*$moment[1]*$sdev);
            $moment[3] = $moment[3] / ($N*$moment[1]*$moment[1]) - 3.0;
        }
    }
  
}

?>
