<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Fragment File
 * @ORM\Entity
 * @Vich\Uploadable
 */
class FragmentFile
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
     * @Assert\File(maxSize="1M")
     * @Vich\UploadableField(mapping="fragmentPdb", fileNameProperty="fragmentPdbName")
     * @var File $fragmentPdb
     */
    protected $fragmentPdb;

    /**
     * @ORM\Column(type="string", length=255, name="fragmentPdbName",nullable=true)
     *
     * @var string $fragmentPdbName
     */
    protected $fragmentPdbName;
    
    /**
     * This var was created to manage file updates
     * @var \DateTime
     * @ORM\Column(name="updatedAt", type="date", nullable=true)
     */
    private $updatedAt;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getFragmentPdb()
    {
        return $this->fragmentPdb;
    }

    public function setFragmentPdb($file)
    {
        $this->fragmentPdb = $file;
  
        if ($file instanceof UploadedFile) {  
            $this->setUpdatedAt(new \DateTime());  
        }
        
        return $this;
    }

    /**
     * Set fragmentPdbName
     *
     * @param string $fragmentPdbName
     * @return FragmentFile
     */
    public function setFragmentPdbName($fragmentPdbName)
    {
        $this->fragmentPdbName = $fragmentPdbName;
    
        return $this;
    }

    /**
     * Get fragmentPdbName
     *
     * @return string 
     */
    public function getFragmentPdbName()
    {
        return $this->fragmentPdbName;
    }
    
    /**
     * @return Employee
     */
    public function setUpdatedAt($updateAtDate)
    {
        $this->updatedAt = $updateAtDate;

        return $this;
    }

    /**
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
}