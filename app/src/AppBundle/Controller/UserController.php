<?php
/**
 * User controller.
 */
namespace AppBundle\Controller;

use AppBundle\Repository\NewsRepository;
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
 * @Route("/users")
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

    /**
     * View action.
     *
     * @param User $user
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/{id}",
     *     requirements={"id": "[1-9]\d*"},
     *     name="user_view",
     * )
     * @Method("GET")
     */
    public function viewAction(User $user, NewsRepository $newsRepository, NewsController $newsController)
    {
        return $this->render(
            'users/view.html.twig',
            [
                'user' => $user,
                'active_element' => 'users',
                'scroll_to_content' => True,
                'posts' => $newsRepository->findAllByUser($user),
                'subdirectory_path' => $newsController::UPLOAD_DIR,
            ]
        );
    }
}
