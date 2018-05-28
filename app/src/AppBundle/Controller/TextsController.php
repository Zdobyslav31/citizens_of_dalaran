<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Text;
use AppBundle\Repository\TextRepository;
use AppBundle\Form\StaticTextType;
use AppBundle\Service\FileUploader;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to manage static text contents in the public part of the site.
 *
 * @Route("/larps")
 */
class TextsController extends Controller
{
    /**
     * Text repository.
     *
     * @var \AppBundle\Repository\TextRepository|null $textRepository
     */
    protected $textRepository = null;

    /**
     * TextsController constructor.
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
     *     "/add",
     *     name="texts_add",
     * )
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request, FileUploader $fileUploader)
    {
        $text = new Text();
        $form = $this->createForm(StaticTextType::class, $text);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (!empty($text->getImage())) {
                    $file = $text->getImage();
                    $fileName = $fileUploader->upload($file);
                    $text->setImage($fileName);
                }

                $this->textRepository->save($text);
                $this->addFlash('success', 'message.created_successfully');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.add_failed');
            } finally {
                return $this->redirectToRoute('static', ['title' => $text->getParentTitle()]);
            }
        }

        return $this->render(
            'static/add.html.twig',
            [
                'text' => $text,
                'scroll_to_content' => true,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param Text $text Text entity
     * @param FileUploader $fileUploader
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/edit/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="texts_edit",
     * )
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Text $text, FileUploader $fileUploader)
    {
        if (!empty($text->getImage())) {
            $text->setImage(
                new File($this->getParameter('images_directory').'/'.$text->getImage())
            );
        }
        $form = $this->createForm(StaticTextType::class, $text);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (!empty($text->getImage())) {
                    $file = $text->getImage();
                    $fileName = $fileUploader->upload($file);
                    $text->setImage($fileName);
                }
                $this->textRepository->save($text);
                $this->addFlash('success', 'message.edited_successfully');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.edit_failed');
            } finally {
                return $this->redirectToRoute('static', ['title' => $text->getParentTitle()]);
            }
        }

        return $this->render(
            'static/edit.html.twig',
            [
                'text' => $text,
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
     * @param Text $text Text entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/delete/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="texts_delete",
     * )
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Text $text)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->textRepository->delete($text);
                $this->addFlash('success', 'message.deleted_successfully');

                return $this->redirectToRoute('static', ['title' => $text->getParentTitle()]);
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.delete_failed');
                return $this->redirectToRoute('static', ['title' => $text->getParentTitle()]);
            }
        }

        return $this->render(
            'static/delete.html.twig',
            [
                'text' => $text,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }
}

