<?php
/**
 * Tags controller.
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Tag;
use AppBundle\Repository\TagRepository;
use AppBundle\Form\TagType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TagController.
 *
 * @Route("/tags")
 */
class TagController extends Controller
{
    /**
     * Tag repository.
     *
     * @var \AppBundle\Repository\TagRepository|null $tagRepository
     */
    protected $tagRepository = null;

    /**
     * TagController constructor.
     *
     * @param \AppBundle\Repository\TagRepository $tagRepository Tag repository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Index action.
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     *
     * @Route(
     *     "/",
     *     defaults={"page": 1},
     *     name="tags_index",
     * )
     * @Route(
     *     "/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="tags_index_paginated",
     * )
     * @Method("GET")
     */
    public function indexAction($page)
    {
        $tags = $this->tagRepository->findAllPaginated($page);

        return $this->render(
            'tags/index.html.twig',
            [
                'tags' => $tags
            ]
        );
    }

    /**
     * View action.
     *
     * @param Tag $tag Tag entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="tag_view",
     * )
     * @Method("GET")
     */
    public function viewAction(Tag $tag)
    {

        return $this->render(
            'tags/view.html.twig',
            [
                'tag' => $tag
            ]
        );
    }

    /**
     * Add action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/add",
     *     name="tags_add",
     * )
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request)
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->tagRepository->save($tag);
                $this->addFlash('success', 'message.created_successfully');
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.add_failed');
            }
            finally {
                return $this->redirectToRoute('tags_index');
            }
        }

        return $this->render(
            'tags/add.html.twig',
            [
                'tag' => $tag,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }



    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     *
     * @param Tag $tag Tag entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/edit/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="tags_edit",
     * )
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tag $tag)
    {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->tagRepository->save($tag);
                $this->addFlash('success', 'message.edited_successfully');

                return $this->redirectToRoute('tags_index');
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.edit_failed');
                return $this->redirectToRoute('tag_view', ['id' => $tag->getId()]);
            }
        }

        return $this->render(
            'tags/edit.html.twig',
            [
                'tag' => $tag,
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
     * @param Tag $tag Tag entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/delete/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="tags_delete",
     * )
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Tag $tag)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->tagRepository->delete($tag);
                $this->addFlash('success', 'message.deleted_successfully');

                return $this->redirectToRoute('tags_index');
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.delete_failed');
                return $this->redirectToRoute('tag_view', ['id' => $tag->getId()]);
            }
        }

        return $this->render(
            'tags/delete.html.twig',
            [
                'tag' => $tag,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }

}
