<?php

namespace WIP\SlinkBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Url Controller
 * @Route("/url")
 */
class UrlController extends Controller {

    /**
     * Main page
     * 
     * @Route("/")
     * @Method("GET")
     * 
     */
    public function indexAction() {
        return $this->render('SlinkBundle:Url:index.html.twig');
    }

    /**
     * Generate short URL
     * 
     * @Route("/send", name="url_generate")
     * @Method("POST")
     *
     * @param Request $request
     */
    public function generateAction(Request $request) {
        if ($request->headers->get('Content-Type') === 'application/json') {
            $data = json_decode($request->getContent(), true);
            $urlToShorten = preg_replace('#^https?:/#', '', $data["urlToShorten"]);
            $shortUrl = $this->createShortUrl($urlToShorten);

            return new JsonResponse(["short_url" => $shortUrl], 200);
        } else {
            return new JsonResponse("Wrong data format", 400);
        }
    }

    /**
     * Create random string as short URL
     * 
     * @return string
     */
    private function createShortUrl($url) {
        $shortUrl = "/" . mb_substr($url, 3, rand(3,8));
        
        return $shortUrl;
    }

}
