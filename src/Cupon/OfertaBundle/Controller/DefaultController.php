<?php
namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function portadaAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
                'ciudad'     => $this->container->getParameter('cupon.ciudad_por_defecto'),
                'fecha_publicacion' => new \DateTime('today')
        ));
        
              
        return $this->render(
            'OfertaBundle:Default:portada.html.twig',
            array('oferta' => $oferta)
        );
    }        

}

