<?php
namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\CiudadBundle\Entity\Ciudad;

class ciudades implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ciudades = array(
            array('nombre' => 'Madrid', 'slug' => 'madrid'),
            array('nombre' => 'Barcelona', 'slug' => 'barcelona'),
            array('nombre' => 'Santa Cruz de Tenerife', 'slug' => 'santa-cruz-tenerife'),
            array('nombre' => 'Cadiz', 'slug' => 'cadiz'),
        );

        foreach ($ciudades as $ciudad) {
            $entidad = new Ciudad();
            
            $entidad->setNombre($ciudad['nombre']);
            $entidad->setSlug($ciudad['slug']);
            
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

}

?>
