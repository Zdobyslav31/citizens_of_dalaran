<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Form\NewsType;
use AppBundle\Repository\NewsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class NewsController.
 *
 */
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
     * @Route(
     *     "/",
     *     defaults={"page": 1},
     *     name="homepage",
     * )
     * @Route(
     *     "/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="homepage_paginated",
     * )
     * @Route(
     *     "/news",
     *     defaults={"page": 1},
     *     name="tags_index",
     * )
     * @Route(
     *     "news/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="tags_index_paginated",
     * )
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function indexAction(Request $request)
    {
        $news = $this->newsRepository->findAllPaginated();

        return $this->render('news/index.html.twig', [
            'carousel' => 'always',
            'active_element' => 'news',
            'news' => $news
        ]);
    }

    /**
     * View action.
     *
     * @param News $news News entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "news/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="news_view",
     * )
     * @Method("GET")
     */
    public function viewAction(News $news)
    {
        return $this->render(
            'news/view.html.twig',
            [
                'post' => $news,
                'active_element' => 'news',
                'scroll_to_content' => True,
                'size' => $news->getTags()->getValues(),
            ]
        );
    }
}
