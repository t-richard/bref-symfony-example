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
    public function index(): Response
    {
        $finder = new Finder();

        if (is_dir('/tmp/cache')) {
            $files = $finder->in('/tmp/cache');
        }

        return $this->json([
            'files' => $files ?? null,
            'context' => array_keys($_SERVER),
            'env' => array_keys($_ENV),
            'request' => $_SERVER['LAMBDA_REQUEST_CONTEXT'],
        ]);
    }
}
