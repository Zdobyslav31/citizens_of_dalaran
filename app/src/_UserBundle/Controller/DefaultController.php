<?php

namespace _UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->forward('AppBundle:News:index', ['page' => 1]);
    }
}
