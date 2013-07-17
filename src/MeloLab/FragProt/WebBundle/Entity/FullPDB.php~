<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FullPDB
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FullPDB
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
     * @ORM\Column(name="fourLetterName", type="string", length=255)
     */
    private $fourLetterName;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution", type="string", length=255)
     */
    private $resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="fullName", type="text")
     */
    private $fullName;

    /**
     * @ORM\OneToMany(targetEntity="Fragment", mappedBy="pdb",cascade={"persist"})
     **/
    private $fragments;

    /**
     * @ORM\OneToMany(targetEntity="Residue", mappedBy="pdb",cascade={"persist"})
     **/
    private $residues;
    
    
    public function __construct() {
        $this->fragments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set FourLetterName
     *
     * @param string $fourLetterName
     * @return FullPDB
     */
    public function setFourLetterName($fourLetterName)
    {
        $this->fourLetterName = $fourLetterName;
    
        return $this;
    }

    /**
     * Get FourLetterName
     *
     * @return string 
     */
    public function getFourLetterName()
    {
        return $this->fourLetterName;
    }

    /**
     * Set Resolution
     *
     * @param string $resolution
     * @return FullPDB
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
    
        return $this;
    }

    /**
     * Get Resolution
     *
     * @return string 
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set FullName
     *
     * @param string $fullName
     * @return FullPDB
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    
        return $this;
    }

    /**
     * Get FullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Add fragments
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Fragment $fragments
     * @return FullPDB
     */
    public function addFragment(\MeloLab\FragProt\WebBundle\Entity\Fragment $fragments)
    {
        $this->fragments[] = $fragments;
    
        return $this;
    }

    /**
     * Remove fragments
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Fragment $fragments
     */
    public function removeFragment(\MeloLab\FragProt\WebBundle\Entity\Fragment $fragments)
    {
        $this->fragments->removeElement($fragments);
    }

    /**
     * Get fragments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFragments()
    {
        return $this->fragments;
    }

    /**
     * Add residues
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Residue $residues
     * @return FullPDB
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
