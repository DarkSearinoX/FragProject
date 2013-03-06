<?php

namespace FragProject\FragBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FragmentType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FragmentType
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
     * @ORM\Column(name="fullName", type="string", length=255)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="shortName", type="string", length=255)
     */
    private $shortName;

    /**
     * @ORM\OneToMany(targetEntity="Fragment", mappedBy="fragmentType",cascade={"persist"})
     **/
    private $fragments;

    public function __construct() {
        $this->fragments = new \Doctrine\Common\Collections\ArrayCollection();
        
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
     * @return FragmentType
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
     * Set shortName
     *
     * @param string $shortName
     * @return FragmentType
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    
        return $this;
    }

    /**
     * Get shortName
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Add fragments
     *
     * @param \FragProject\FragBundle\Entity\Fragment $fragments
     * @return FragmentType
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
}