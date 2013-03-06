<?php

namespace FragProject\FragBundle\Entity;

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
    private $FullName;

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
     * Set FullName
     *
     * @param string $fullName
     * @return Dataset
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
     * @return Dataset
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
     * @return Dataset
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