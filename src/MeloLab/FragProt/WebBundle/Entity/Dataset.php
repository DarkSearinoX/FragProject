<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dataset
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dataset
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
     * @ORM\Column(name="FullName", type="string", length=255)
     */
    private $fullName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $Description;
    

    /**
     * @ORM\OneToMany(targetEntity="Fragment", mappedBy="dataset",cascade={"persist"})
     **/
    private $fragments;

    /**
     * @ORM\OneToMany(targetEntity="Residue", mappedBy="dataset",cascade={"persist"})
     **/
    private $residues;
    
    
    public function __construct() {
        $this->fragments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->residues = new \Doctrine\Common\Collections\ArrayCollection();
    }    
    
    public function __toString() {
        return $this->fullName;
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
     * Set fullName
     *
     * @param string $fullName
     * @return Dataset
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
     * Add fragments
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Fragment $fragments
     * @return Dataset
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
     * @return Dataset
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

    /**
     * Set Description
     *
     * @param string $description
     * @return Dataset
     */
    public function setDescription($description)
    {
        $this->Description = $description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->Description;
    }
}
