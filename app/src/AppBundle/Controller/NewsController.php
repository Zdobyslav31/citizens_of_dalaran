<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/news", name="news.index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('news/index.html.twig', [
            'carousel_hide' => FALSE,
            'sidebar' => Null,
            'active_element' => 'news'
        ]);
    }
}
