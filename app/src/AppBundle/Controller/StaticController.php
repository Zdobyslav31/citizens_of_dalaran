<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Repository\TextRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Text;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to manage static text contents in the public part of the site.
 *
 * @Route("/larps")
 */
class StaticController extends Controller
{
    /**
     * Text repository.
     *
     * @var \AppBundle\Repository\TextRepository|null $textRepository
     */
    protected $textRepository = null;

    /**
     * StaticController constructor.
     *
     * @param \AppBundle\Repository\TextRepository $textRepository Text repository
     */
    public function __construct(TextRepository $textRepository)
    {
        $this->textRepository = $textRepository;
    }

    /**
     * Index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     *
     * @Route(
     *     "/{title}",
     *     requirements={"title": "what_is_larp|types|terms|history|in_poland"},
     *     name="static",
     * )
     * @Method("GET")
     */
    public function indexAction($title)
    {
        $texts = $this->textRepository->queryByParent($title);

        return $this->render(
            'static/index.html.twig',
            [
                'sidebar' => 'larps',
                'active_element' => 'larps',
                'active_subelement' => $title,
                'texts' => $texts
            ]
        );
    }

//    /**
//     * @Route("/what_is_larp", name="larps")
//     */
//    public function larps()
//    {
//        return $this->render('static/larps/what_is_larp.html.twig', [
//            'sidebar' => 'larps',
//            'active_element' => 'larps',
//            'active_subelement' => 'what_is_larp'
//        ]);
//    }
//    /**
//     * @Route("/types", name="larps_types")
//     */
//    public function larps_types()
//    {
//        return $this->render('static/larps/types.html.twig', [
//            'sidebar' => 'larps',
//            'active_element' => 'larps',
//            'active_subelement' => 'larp_types'
//        ]);
//    }
//    /**
//     * @Route("/terms", name="larp_terms")
//     */
//    public function larps_terms()
//    {
//        return $this->render('static/larps/terms.html.twig', [
//            'sidebar' => 'larps',
//            'active_element' => 'larps',
//            'active_subelement' => 'larp_terms'
//        ]);
//    }
//    /**
//     * @Route("/history", name="larp_history")
//     */
//    public function larps_history()
//    {
//        return $this->render('static/larps/history.html.twig', [
//            'sidebar' => 'larps',
//            'active_element' => 'larps',
//            'active_subelement' => 'larp_history'
//        ]);
//    }
//    /**
//     * @Route("/in_poland", name="larps_in_poland")
//     */
//    public function larps_in_poland()
//    {
//        return $this->render('static/larps/in_poland.html.twig', [
//            'sidebar' => 'larps',
//            'active_element' => 'larps',
//            'active_subelement' => 'larps_in_poland'
//        ]);
//    }
}
