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
            'carousel_hide' => TRUE,
            'sidebar' => 'group',
            'active_element' => 'about',
            'active_subelement' => 'about'
        ]);
    }
    /**
     * @Route("/larps", name="larps")
     */
    public function larps()
    {
        return $this->render('static/larps/what_is_larp.html.twig', [
            'carousel_hide' => TRUE,
            'sidebar' => 'larps',
            'active_element' => 'larps',
            'active_subelement' => 'what_is_larp'
        ]);
    }
    /**
     * @Route("/larps/types", name="larps_types")
     */
    public function larps_types()
    {
        return $this->render('static/larps/types.html.twig', [
            'carousel_hide' => TRUE,
            'sidebar' => 'larps',
            'active_element' => 'larps',
            'active_subelement' => 'larp_types'
        ]);
    }
    /**
     * @Route("/larps/terms", name="larp_terms")
     */
    public function larps_terms()
    {
        return $this->render('static/larps/terms.html.twig', [
            'carousel_hide' => TRUE,
            'sidebar' => 'larps',
            'active_element' => 'larps',
            'active_subelement' => 'larp_terms'
        ]);
    }
    /**
     * @Route("/larps/history", name="larp_history")
     */
    public function larps_history()
    {
        return $this->render('static/larps/history.html.twig', [
            'carousel_hide' => TRUE,
            'sidebar' => 'larps',
            'active_element' => 'larps',
            'active_subelement' => 'larp_history'
        ]);
    }
}
