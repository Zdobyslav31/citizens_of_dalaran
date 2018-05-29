<?php
/**
 * News controller.
 */
namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Repository\NewsRepository;
use AppBundle\Form\NewsType;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class NewsController.
 *
 */
class EventController extends Controller
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
    public function indexAction(Request $request, $page)
    {
        $news = $this->newsRepository->findAllPaginated($page);

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

    /**
     * Add action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param FileUploader $fileUploader
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "news/add",
     *     name="news_add",
     * )
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request, FileUploader $fileUploader)
    {
        $news = new News();
        $news->setCreator($this->getUser());
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (!empty($news->getImage())) {
                    $file = $news->getImage();
                    $fileName = $fileUploader->upload($file);
                    $news->setImage($fileName);
                }

                $this->newsRepository->save($news);

                $this->addFlash('success', 'message.created_successfully');
                return $this->redirectToRoute('tag_view', ['id' => $news->getId()]);
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.create_failed');
                return $this->redirectToRoute('homepage');
            }
        }

        return $this->render(
            'news/add.html.twig',
            [
                'news' => $news,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param News $news
     * @param FileUploader $fileUploader
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "news/edit/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="news_edit",
     * )
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, News $news, FileUploader $fileUploader)
    {
        $news->setModifier($this->getUser());
        if (!empty($news->getImage())) {
            $news->setImage(
                new File($this->getParameter('images_directory').'/'.$news->getImage())
            );
        }

        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (!empty($news->getImage())) {
                    $file = $news->getImage();
                    $fileName = $fileUploader->upload($file);
                    $news->setImage($fileName);
                }
                $this->newsRepository->save($news);
                $this->addFlash('success', 'message.edited_successfully');

                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.edit_failed');
                return $this->redirectToRoute('tag_view', ['id' => $news->getId()]);
            }
        }

        return $this->render(
            'news/edit.html.twig',
            [
                'news' => $news,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }
    
    /**
     * Delete action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     *
     * @param News $news News entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/delete/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="news_delete",
     * )
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, News $news)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->newsRepository->delete($news);
                $this->addFlash('success', 'message.deleted_successfully');

                return $this->redirectToRoute('homepage');
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.delete_failed');
                return $this->redirectToRoute('tag_view', ['id' => $news->getId()]);
            }
        }

        return $this->render(
            'news/delete.html.twig',
            [
                'news' => $news,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }


    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
