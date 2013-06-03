<?php

namespace MeloLab\EvaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load required funding data into the database.
 * @author Andreas Schueller <aschueller@bio.puc.cl>
 */
class LoadFundingData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $em = $this->container->get('doctrine')->getManager();
        
        // Reset ID column
        $tableName = $em->getClassMetadata('MeloLabEvaBundle:Aminoacid')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        /* 01 */ $e = new Aminoacid(); $e->setFullName('Full Scholarship'); $manager->persist($e);
        /* 02 */ $e = new Aminoacid(); $e->setFullName('Partial Scholarship'); $manager->persist($e);
        /* 03 */ $e = new Aminoacid(); $e->setFullName('Honorarium'); $manager->persist($e);
        /* 04 */ $e = new Aminoacid(); $e->setFullName('Attached (Adscrito)'); $manager->persist($e);

        $manager->flush();
    }
}