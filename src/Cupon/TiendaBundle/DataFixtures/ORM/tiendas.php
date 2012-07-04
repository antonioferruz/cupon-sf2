<?php
namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\TiendaBundle\Entity\Tienda;
use Cupon\CiudadBundle\Entity\Ciudad;

class tiendas implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        

        for($i=0;$i < 10; $i++){
            $entidad = new Tienda();
            
            $entidad->setNombre('Tienda '  . $i);
            
            // random de asignacion de ciudad
            $ciudad = $manager->getRepository('CiudadBundle:Ciudad')->find(rand(1,25));
            $entidad->setCiudad($ciudad);
            
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

}

?>

