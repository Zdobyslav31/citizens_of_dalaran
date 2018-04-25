<?php

namespace AppBundle\Controller;

use AppBundle\Repository\NewsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class NewsController extends Controller
{
    /**
     * Index action.
     *
     * @Route("/", name="homepage")
     * @Route("/news", name="news_index")
     *
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function indexAction(Request $request)
    {
        $newsRepository = new NewsRepository();
        $news = $newsRepository->findAll();

        return $this->render('news/index.html.twig', [
            'carousel_hide' => FALSE,
            'sidebar' => Null,
            'active_element' => 'news',
            'active_subelement' => Null,
            'news' => $news
        ]);
    }

    /**
     * @Route(
     *     "/news/{id}",
     *     requirements={"id": "[0-9]+"},
     *     name="news_view"
     * )
     */
    public function viewAction(Request $request, $id)
    {
        $newsRepository = new NewsRepository();
        $post = $newsRepository->findOneById($id);
        return $this->render('news/view.html.twig', [
            'carousel_hide' => FALSE,
            'sidebar' => Null,
            'active_element' => 'news',
            'active_subelement' => Null,
            'post' => $post
        ]);
    }
}
