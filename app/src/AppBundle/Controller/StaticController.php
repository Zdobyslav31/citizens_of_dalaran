<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('static/about.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }
    /**
     * @Route("/larps", name="larps")
     */
    public function larps()
    {
        return $this->render('static/larps.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }
    /**
     * @Route("/larps/types", name="larps_types")
     */
    public function larps_types()
    {
        return $this->render('static/larps_types.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }
    /**
     * @Route("/larps/terms", name="larps_terms")
     */
    public function larps_terms()
    {
        return $this->render('static/larps_terms.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }
    /**
     * @Route("/larps/history", name="larps_history")
     */
    public function larps_history()
    {
        return $this->render('static/larps_history.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }
}
