<?php
/**
 * Event controller.
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use AppBundle\Form\EventType;
use AppBundle\Repository\EventRepository;
//use AppBundle\Form\NewsType;
use AppBundle\Repository\TagRepository;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class EventController.
 *
 *
 * @Route("/events")
 *
 */
class EventController extends Controller
{
    /**
     * Event repository.
     *
     * @var \AppBundle\Repository\EventRepository|null Event repository
     */
    protected $eventRepository = null;

    /**
     * Path to upload images
     */
    const UPLOAD_DIR = 'events/images';

    /**
     * EventController constructor.
     *
     * @param \AppBundle\Repository\EventRepository $eventRepository Event repository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function upcomingEventsAction($max = 2)
    {
        $events = $this->eventRepository->findUpcoming($max);

        $response = $this->render(
            'components/_calendar.html.twig',
            [
                'events' => $events
            ]
        );
        $response->setSharedMaxAge(600);    //for ESI caching
        return $response;
    }

    /**
     * Index action.
     * @param integer $page
     * @param Request $request
     *
     * @Route(
     *     "/",
     *     defaults={"page": 1},
     *     name="event_index",
     * )
     * @Route(
     *     "/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="event_index_paginated",
     * )
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function indexAction(Request $request, $page)
    {
        $events = $this->eventRepository->findPaginated($page, 'future');

        return $this->render('events/index.html.twig', [
            'right_hide' => true,
            'scroll_to_content' => true,
            'sidebar' => 'group',
            'active_element' => 'group',
            'active_subelement' => 'events',
            'title' => 'title.events.actual',
            'events' => $events,
            'event_subdirectory_path' => self::UPLOAD_DIR,
        ]);
    }

    /**
     * Archive index action.
     * @param integer $page
     * @param Request $request
     *
     * @Route(
     *     "/archive/",
     *     defaults={"page": 1},
     *     name="archive_event_index",
     * )
     * @Route(
     *     "/archive/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="archive_event_index_paginated",
     * )
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function ArchiveIndexAction(Request $request, $page)
    {
        $events = $this->eventRepository->findPaginated($page, 'past');

        return $this->render('events/index.html.twig', [
            'right_hide' => true,
            'sidebar' => 'group',
            'active_element' => 'group',
            'active_subelement' => 'archive',
            'title' => 'title.events.archive',
            'events' => $events,
            'event_subdirectory_path' => self::UPLOAD_DIR,
        ]);
    }

    /**
     * View action.
     *
     * @param Event $event Event entity
     * @param NewsController $newsController
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="event_view",
     * )
     * @Method("GET")
     */
    public function viewAction(Event $event, NewsController $newsController)
    {
        if ($event->getDateEnd() > new \DateTime('now')) {
            $active_subelement = 'events';
        } else {
            $active_subelement = 'archive';
        }
        return $this->render(
            'events/view.html.twig',
            [
                'event' => $event,
                'right_hide' => true,
                'active_element' => 'group',
                'active_subelement' => $active_subelement,
                'event_subdirectory_path' => self::UPLOAD_DIR,
                'news_subdirectory_path' => $newsController::UPLOAD_DIR,
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
     *     name="event_add",
     * )
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request, FileUploader $fileUploader)
    {
        $event = new Event($fileUploader);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (null !== $event->getImageFile()) {
                    $event->setImagePath($fileUploader->upload($event->getImageFile(), self::UPLOAD_DIR));
                    $event->clearImageFile();
                }
                $this->eventRepository->save($event);

                $this->addFlash('success', 'message.created_successfully');
                return $this->redirectToRoute('event_view', ['id' => $event->getId()]);
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.create_failed');
                return $this->redirectToRoute('event_index');
            }
        }

        return $this->render(
            'events/add.html.twig',
            [
                'event' => $event,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param Event $event
     * @param FileUploader $fileUploader
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/edit/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="event_edit",
     * )
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Event $event, FileUploader $fileUploader)
    {

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (null !== $event->getImageFile()) {
                    $event->setImagePath($fileUploader->upload($event->getImageFile(), self::UPLOAD_DIR));
                    if (file_exists($fileUploader->getTargetDirectory(self::UPLOAD_DIR).'/'.$event->getTempImagePath())) {
                        $fileUploader->removeImageFile($event->getTempImagePath(), self::UPLOAD_DIR);
                        $event->setTempImagePath(null);
                    }
                    $event->clearImageFile();

                }
                else {
                    if (null != $event->getTempImagePath()) {
                        $event->setImagePath($event->getTempImagePath());
                    }
                }

                $this->eventRepository->save($event);
                $this->addFlash('success', 'message.edited_successfully');

                return $this->redirectToRoute('event_view', ['id' => $event->getId()]);
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.edit_failed');
                return $this->redirectToRoute('event_view', ['id' => $event->getId()]);
            }
        }

        return $this->render(
            'events/edit.html.twig',
            [
                'event' => $event,
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
     * @param Event $event Event entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/delete/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="event_delete",
     * )
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Event $event, FileUploader $fileUploader)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (null != $event->getImagePath()) {
                    $fileUploader->removeImageFile($event->getImagePath(), self::UPLOAD_DIR);
                }
                $this->eventRepository->delete($event);
                $this->addFlash('success', 'message.deleted_successfully');

                return $this->redirectToRoute('event_index');
            }
            catch (\Doctrine\DBAL\DBALException $e) {
                $this->addFlash('error', 'message.delete_failed');
                return $this->redirectToRoute('event_view', ['id' => $event->getId()]);
            }
        }

        return $this->render(
            'events/delete.html.twig',
            [
                'event' => $event,
                'scroll_to_content' => True,
                'form' => $form->createView(),
            ]
        );
    }
}
