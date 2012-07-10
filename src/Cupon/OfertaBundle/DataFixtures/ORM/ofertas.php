<?php

namespace Cupon\OfertaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\OfertaBundle\Entity\Oferta;
use Cupon\CiudadBundle\Entity\Ciudad;
use Cupon\TiendaBundle\Entity\Tienda;
use Cupon\OfertaBundle\Util\Util;

class ofertas implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 100; $i++) {
            $entidad = new Oferta();
            $entidad->setNombre('Oferta '.$i);
            $entidad->setSlug(Util::getSlug($entidad->getNombre()));
            $entidad->setDescripcion("Descripcion de la oferta " . $i);
            $entidad->setFoto("producto_demo.jpg");
            $entidad->setPrecio(rand(1, 100));
            // fecha de publicacion 1 al dia
            $interval = new \DateInterval("P".$i."D");
            $date1 = new \DateTime();
            $date1->add($interval);
            //echo $date1->format('Y-m-d');
            $entidad->setFechaPublicacion($date1);

            // random de asignacion de ciudad
            //$ciudad = $manager->getRepository('CiudadBundle:Ciudad')->find(rand(1,25));
            $ciudad = $manager->getRepository('CiudadBundle:Ciudad')->find(rand(1,1));
            $entidad->setCiudad($ciudad);
            
            
            // random de asignacion de tienda
            $tienda = $manager->getRepository('TiendaBundle:Tienda')->find(rand(1,10));
            $entidad->setTienda($tienda);

            $manager->persist($entidad);
        }
        
        $manager->flush();

    }
}

?>
