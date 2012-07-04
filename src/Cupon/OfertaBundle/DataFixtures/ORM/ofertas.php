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
            $entidad->setPrecio(rand(1, 100));
            $entidad->setFechaPublicacion(new \DateTime());

            // random de asignacion de ciudad
            $ciudad = $manager->getRepository('CiudadBundle:Ciudad')->find(rand(1,25));
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
