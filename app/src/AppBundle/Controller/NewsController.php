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
class NewsController extends Controller
{
    /**
     * News repository.
     *
     * @var \AppBundle\Repository\NewsRepository|null News repository
     */
    protected $newsRepository = null;

    /**
     * Path to upload images
     */
    const UPLOAD_DIR = 'news/images';

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
            'news' => $news,
            'news_subdirectory_path' => self::UPLOAD_DIR,
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
                'scroll_to_content' => true,
                'size' => $news->getTags()->getValues(),
                'news_subdirectory_path' => self::UPLOAD_DIR,
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
        $news = new News($fileUploader);
        $news->setCreator($this->getUser());
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (null !== $news->getImageFile()) {
                    $news->setImagePath($fileUploader->upload($news->getImageFile(), self::UPLOAD_DIR));
                    $news->clearImageFile();
                }
                $this->newsRepository->save($news);

                $this->addFlash('success', 'message.created_successfully');
                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
            } catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.create_failed');
                return $this->redirectToRoute('homepage');
            }
        }

        return $this->render(
            'news/add.html.twig',
            [
                'news' => $news,
                'scroll_to_content' => true,
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

        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (null !== $news->getImageFile()) {
                    $news->setImagePath($fileUploader->upload($news->getImageFile(), self::UPLOAD_DIR));
                    if (file_exists($fileUploader->getTargetDirectory(self::UPLOAD_DIR).'/'.$news->getTempImagePath())) {
                        $fileUploader->removeImageFile($news->getTempImagePath(), self::UPLOAD_DIR);
                        $news->setTempImagePath(null);
                    }
                    $news->clearImageFile();
                } else {
                    if (null != $news->getTempImagePath()) {
                        $news->setImagePath($news->getTempImagePath());
                    }
                }

                $this->newsRepository->save($news);
                $this->addFlash('success', 'message.edited_successfully');

                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
            } catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.edit_failed');
                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
            }
        }

        return $this->render(
            'news/edit.html.twig',
            [
                'news' => $news,
                'scroll_to_content' => true,
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
    public function deleteAction(Request $request, News $news, FileUploader $fileUploader)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (null != $news->getImagePath()) {
                    $fileUploader->removeImageFile($news->getImagePath(), self::UPLOAD_DIR);
                }
                $this->newsRepository->delete($news);
                $this->addFlash('success', 'message.deleted_successfully');

                return $this->redirectToRoute('homepage');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.delete_failed');
                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
            }
        }

        return $this->render(
            'news/delete.html.twig',
            [
                'news' => $news,
                'scroll_to_content' => true,
                'form' => $form->createView(),
            ]
        );
    }
}
