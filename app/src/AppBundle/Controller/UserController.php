<?php
/**
 * User controller.
 */
namespace AppBundle\Controller;

use UserBundle\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface as UserManager;
use UserBundle\Form\ProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController.
 *
 * @Route("/user")
 *
 */
class UserController extends Controller
{
    /**
     * User manager
     *
     * @var UserManager $userManager
     */
    protected $userManager = null;

    /**
     * UserController constructor.
     *
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Index action.
     *
     * @Route(
     *     "/",
     *     name="user_index",
     * )
     * @Method("GET")
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function indexAction(Request $request)
    {
        $users = $this->userManager->findUsers();

        return $this->render('users/index.html.twig', [
            'carousel' => null,
            'active_element' => 'users',
            'users' => $users,
        ]);
    }

//    /**
//     * View action.
//     *
//     * @param News $news News entity
//     *
//     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
//     *
//     * @Route(
//     *     "news/{id}",
//     *     requirements={"id": "[1-9]\d*"},
//     *     name="news_view",
//     * )
//     * @Method("GET")
//     */
//    public function viewAction(News $news)
//    {
//        return $this->render(
//            'news/view.html.twig',
//            [
//                'post' => $news,
//                'active_element' => 'news',
//                'scroll_to_content' => True,
//                'size' => $news->getTags()->getValues(),
//                'subdirectory_path' => self::UPLOAD_DIR,
//            ]
//        );
//    }
//
//    /**
//     * Add action.
//     *
//     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
//     * @param FileUploader $fileUploader
//     *
//     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
//     *
//     * @throws \Doctrine\ORM\OptimisticLockException
//     *
//     * @Route(
//     *     "news/add",
//     *     name="news_add",
//     * )
//     * @Method({"GET", "POST"})
//     */
//    public function addAction(Request $request, FileUploader $fileUploader)
//    {
//        $news = new News($fileUploader);
//        $news->setCreator($this->getUser());
//        $form = $this->createForm(NewsType::class, $news);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            try {
//                if (null !== $news->getImageFile()) {
//                    $news->setImagePath($fileUploader->upload($news->getImageFile(), self::UPLOAD_DIR));
//                    $news->clearImageFile();
//                }
//                $this->newsRepository->save($news);
//
//                $this->addFlash('success', 'message.created_successfully');
//                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
//            }
//            catch (\Doctrine\DBAL\DBALException $e) {
//                $this->addFlash('error', 'message.create_failed');
//                return $this->redirectToRoute('homepage');
//            }
//        }
//
//        return $this->render(
//            'news/add.html.twig',
//            [
//                'news' => $news,
//                'scroll_to_content' => True,
//                'form' => $form->createView(),
//            ]
//        );
//    }
//
//    /**
//     * Edit action.
//     *
//     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
//     * @param News $news
//     * @param FileUploader $fileUploader
//     *
//     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
//     *
//     * @throws \Doctrine\ORM\OptimisticLockException
//     *
//     * @Route(
//     *     "news/edit/{id}",
//     *     requirements={"id": "[1-9]\d*"},
//     *     name="news_edit",
//     * )
//     * @Method({"GET", "POST"})
//     */
//    public function editAction(Request $request, News $news, FileUploader $fileUploader)
//    {
//        $news->setModifier($this->getUser());
//
//        $form = $this->createForm(NewsType::class, $news);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            try {
//                if (null !== $news->getImageFile()) {
//                    $news->setImagePath($fileUploader->upload($news->getImageFile(), self::UPLOAD_DIR));
//                    if (file_exists($fileUploader->getTargetDirectory(self::UPLOAD_DIR).'/'.$news->getTempImagePath())) {
//                        $fileUploader->removeImageFile($news->getTempImagePath(), self::UPLOAD_DIR);
//                        $news->setTempImagePath(null);
//                    }
//                    $news->clearImageFile();
//
//                }
//                else {
//                    if (null != $news->getTempImagePath()) {
//                        $news->setImagePath($news->getTempImagePath());
//                    }
//                }
//
//                $this->newsRepository->save($news);
//                $this->addFlash('success', 'message.edited_successfully');
//
//                return $this->redirectToRoute('news_view', ['id' => $news->getId()]);
//            }
//            catch (\Doctrine\DBAL\DBALException $e) {
//                $this->addFlash('error', 'message.edit_failed');
//                return $this->redirectToRoute('tag_view', ['id' => $news->getId()]);
//            }
//        }
//
//        return $this->render(
//            'news/edit.html.twig',
//            [
//                'news' => $news,
//                'scroll_to_content' => True,
//                'form' => $form->createView(),
//            ]
//        );
//    }
//
//    /**
//     * Delete action.
//     *
//     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
//     *
//     * @param News $news News entity
//     *
//     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response HTTP Response
//     *
//     * @throws \Doctrine\ORM\OptimisticLockException
//     *
//     * @Route(
//     *     "/delete/{id}",
//     *     requirements={"id": "[1-9]\d*"},
//     *     name="news_delete",
//     * )
//     * @Method({"GET", "POST"})
//     */
//    public function deleteAction(Request $request, News $news, FileUploader $fileUploader)
//    {
//        $form = $this->createForm(FormType::class);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            try {
//                if (null != $news->getImagePath()) {
//                    $fileUploader->removeImageFile($news->getImagePath(), self::UPLOAD_DIR);
//                }
//                $this->newsRepository->delete($news);
//                $this->addFlash('success', 'message.deleted_successfully');
//
//                return $this->redirectToRoute('homepage');
//            }
//            catch (\Doctrine\DBAL\DBALException $e) {
//                $this->addFlash('error', 'message.delete_failed');
//                return $this->redirectToRoute('tag_view', ['id' => $news->getId()]);
//            }
//        }
//
//        return $this->render(
//            'news/delete.html.twig',
//            [
//                'news' => $news,
//                'scroll_to_content' => True,
//                'form' => $form->createView(),
//            ]
//        );
//    }
//
//
//    /**
//     * @return string
//     */
//    private function generateUniqueFileName()
//    {
//        return md5(uniqid());
//    }
}
