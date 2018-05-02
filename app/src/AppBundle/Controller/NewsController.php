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
     * News repository.
     *
     * @var \AppBundle\Repository\NewsRepository|null News repository
     */
    protected $newsRepository = null;

    /**
     * NewsController constructor.
     *
     * @param \AppBundle\Repository\NewsRepository $newsRepository New repository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }
    
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
        $news = $this->newsRepository->findAll();

        return $this->render('news/index.html.twig', [
            'carousel' => 'always',
            'active_element' => 'news',
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
        $post = $this->newsRepository->findOneById($id);
        return $this->render('news/view.html.twig', [
            'active_element' => 'news',
            'post' => $post
        ]);
    }
}
