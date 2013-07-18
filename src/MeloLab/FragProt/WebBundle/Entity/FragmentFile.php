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
     * @ORM\Column(type="string", length=255, name="fragmentPdbName")
     *
     * @var string $fragmentPdbName
     */
    protected $fragmentPdbName;
    
    

}