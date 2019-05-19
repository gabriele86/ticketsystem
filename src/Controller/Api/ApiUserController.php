<?php
namespace App\Controller\Api;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @Route("/user")
 */
class ApiUserController extends FOSRestController
{
    /**
     * @Rest\Get("/profile")
     * @return JsonResponse
     */
    public function detail()
    {
        #$this->denyAccessUnlessGranted('view', $user);
        $user = $this->getUser();
        return $this->handleView($this->view($user));
    }
    protected function serialize($user)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($user, 'json');
        return $json;
    }
}
