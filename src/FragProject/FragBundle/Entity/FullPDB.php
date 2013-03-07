<?php

namespace FragProject\FragBundle\Entity;

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
     * @ORM\Column(name="FourLetterName", type="string", length=255)
     */
    private $fourLetterName;

    /**
     * @var string
     *
     * @ORM\Column(name="Resolution", type="string", length=255)
     */
    private $resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="FullName", type="text")
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
        $this->FourLetterName = $fourLetterName;
    
        return $this;
    }

    /**
     * Get FourLetterName
     *
     * @return string 
     */
    public function getFourLetterName()
    {
        return $this->FourLetterName;
    }

    /**
     * Set Resolution
     *
     * @param string $resolution
     * @return FullPDB
     */
    public function setResolution($resolution)
    {
        $this->Resolution = $resolution;
    
        return $this;
    }

    /**
     * Get Resolution
     *
     * @return string 
     */
    public function getResolution()
    {
        return $this->Resolution;
    }

    /**
     * Set FullName
     *
     * @param string $fullName
     * @return FullPDB
     */
    public function setFullName($fullName)
    {
        $this->FullName = $fullName;
    
        return $this;
    }

    /**
     * Get FullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->FullName;
    }

    /**
     * Add fragments
     *
     * @param \FragProject\FragBundle\Entity\Fragment $fragments
     * @return FullPDB
     */
    public function addFragment(\FragProject\FragBundle\Entity\Fragment $fragments)
    {
        $this->fragments[] = $fragments;
    
        return $this;
    }

    /**
     * Remove fragments
     *
     * @param \FragProject\FragBundle\Entity\Fragment $fragments
     */
    public function removeFragment(\FragProject\FragBundle\Entity\Fragment $fragments)
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
     * @param \FragProject\FragBundle\Entity\Residue $residues
     * @return FullPDB
     */
    public function addResidue(\FragProject\FragBundle\Entity\Residue $residues)
    {
        $this->residues[] = $residues;
    
        return $this;
    }

    /**
     * Remove residues
     *
     * @param \FragProject\FragBundle\Entity\Residue $residues
     */
    public function removeResidue(\FragProject\FragBundle\Entity\Residue $residues)
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