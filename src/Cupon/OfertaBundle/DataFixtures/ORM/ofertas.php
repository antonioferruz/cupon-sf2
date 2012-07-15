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
            $entidad->setDescripcion("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum ");
            $entidad->setFoto("producto_demo.jpg");
            $entidad->setRevisada(true);
            $entidad->setPrecio(rand(1, 100));
            // fecha de publicacion 1 al dia
            $interval_pub = new \DateInterval("P".$i."D");
            $interval_exp = new \DateInterval("P1Y");
            $date_pub = new \DateTime();
            $date_pub->add($interval_pub);
            
            $date_exp = new \DateTime();
            $date_exp->add($interval_exp);
            //echo $date1->format('Y-m-d');
            $entidad->setFechaPublicacion($date_pub);
            $entidad->setFechaExpiracion($date_exp);
            

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
