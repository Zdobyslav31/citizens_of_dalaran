<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to manage contents related to the group in the public part of the site.
 *
 * @Route("/group")
 */
class GroupController extends Controller
{
    /**
     * @Route("/", name="about")
     */
    public function about()
    {
        return $this->render('static/group/about.html.twig', [
            'sidebar' => 'group',
            'active_element' => 'group',
            'active_subelement' => 'about'
        ]);
    }
    /**
     * @Route("/events", name="events")
     */
    public function events()
    {
        return $this->render('static/group/events.html.twig', [
            'sidebar' => 'group',
            'right_hide' => True,
            'active_element' => 'group',
            'active_subelement' => 'events'
        ]);
    }
    /**
     * @Route("/gallery", name="gallery")
     */
    public function gallery()
    {
        return $this->render('static/group/gallery.html.twig', [
            'sidebar' => 'group',
            'active_element' => 'group',
            'active_subelement' => 'gallery'
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('static/group/contact.html.twig', [
            'sidebar' => 'group',
            'active_element' => 'group',
            'active_subelement' => 'contact'
        ]);
    }
}
