<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aminoacid
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Aminoacid
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="threeLetterAminoacid", type="string", length=255)
     */
    private $threeLetterAminoacid;

    /**
     * @var string
     *
     * @ORM\Column(name="oneLetterAminoacid", type="string", length=255)
     */
    private $oneLetterAminoacid;

    /**
     * @var string
     *
     * @ORM\Column(name="fullName", type="string", length=255)
     */
    private $fullName;

    /**
     * @var float
     *
     * @ORM\Column(name="hidrophCW", type="float")
     */
    private $hidrophCW;

    /**
     * @var float
     *
     * @ORM\Column(name="hidrophB", type="float")
     */
    private $hidrophB;

    
    /**
     * @ORM\OneToMany(targetEntity="Residue", mappedBy="aminoacid",cascade={"persist"})
     **/
    private $residues;

    public function __construct() {
        $this->residues = new \Doctrine\Common\Collections\ArrayCollection();
    }    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set threeLetterAminoacid
     *
     * @param string $threeLetterAminoacid
     * @return Aminoacid
     */
    public function setThreeLetterAminoacid($threeLetterAminoacid)
    {
        $this->threeLetterAminoacid = $threeLetterAminoacid;
    
        return $this;
    }

    /**
     * Get threeLetterAminoacid
     *
     * @return string 
     */
    public function getThreeLetterAminoacid()
    {
        return $this->threeLetterAminoacid;
    }

    /**
     * Set oneLetterAminoacid
     *
     * @param string $oneLetterAminoacid
     * @return Aminoacid
     */
    public function setOneLetterAminoacid($oneLetterAminoacid)
    {
        $this->oneLetterAminoacid = $oneLetterAminoacid;
    
        return $this;
    }

    /**
     * Get oneLetterAminoacid
     *
     * @return string 
     */
    public function getOneLetterAminoacid()
    {
        return $this->oneLetterAminoacid;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return Aminoacid
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    
        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set hidrophCW
     *
     * @param float $hidrophCW
     * @return Aminoacid
     */
    public function setHidrophCW($hidrophCW)
    {
        $this->hidrophCW = $hidrophCW;
    
        return $this;
    }

    /**
     * Get hidrophCW
     *
     * @return float 
     */
    public function getHidrophCW()
    {
        return $this->hidrophCW;
    }

    /**
     * Set hidrophB
     *
     * @param float $hidrophB
     * @return Aminoacid
     */
    public function setHidrophB($hidrophB)
    {
        $this->hidrophB = $hidrophB;
    
        return $this;
    }

    /**
     * Get hidrophB
     *
     * @return float 
     */
    public function getHidrophB()
    {
        return $this->hidrophB;
    }

    /**
     * Add residues
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Residue $residues
     * @return Aminoacid
     */
    public function addResidue(\MeloLab\FragProt\WebBundle\Entity\Residue $residues)
    {
        $this->residues[] = $residues;
    
        return $this;
    }

    /**
     * Remove residues
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Residue $residues
     */
    public function removeResidue(\MeloLab\FragProt\WebBundle\Entity\Residue $residues)
    {
        $this->residues->removeElement($residues);
    }

    /**
     * Get residues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResidues()
    {
        return $this->residues;
    }
}
