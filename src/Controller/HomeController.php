<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        $finder = new Finder();

        if (is_dir('/tmp/cache')) {
            $files = $finder->in('/tmp/cache');
        }

        return $this->json([
            'ip' => $request->getClientIp(),
        ]);
    }
}
