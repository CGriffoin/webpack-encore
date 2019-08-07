<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecuredController extends AbstractController
{
    /**
    * @Route("/api/public", name="public")
    * @return JsonResponse
    */
    public function publicAction()
    {

        $data = [
            [
                'albumId' => "1",
                "id" => 1,
                "title" => "accusamus beatae ad facilis cum similique qui sunt",
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout"
            ],
            [
                'albumId' => "2",
                "id" => 2,
                "title" => "accusamus beatae ad facilis cum similique qui sunt",
                "description" => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text"
            ],
            [
                'albumId' => "3",
                "id" => 3,
                "title" => "accusamus beatae ad facilis cum similique qui sunt",
                "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form"
            ],
        ];

        return new JsonResponse($data);
    }

    /**
     * @Route("/api/encrypt", name="encrypt") 
     * @return JsonResponse
     */
    public function encryptAction(){

        $stringToHash = '=!$*:34r12ZAGO=!$*:';
        
        $hashed = hash('sha512', $stringToHash);
        
        $hashedExpected = '5a97a52deef7a61dbbe9986b66add16d8ee42c4454f3b6ad0e9250d5e5125488adb56a752bcafcbe3ea100f7cd35a5d38c46c2120b6666c5cc6d8fea64f99b87';

        $hashSucceeded = $hashed == $hashedExpected;

        $data = [
            [
                "stringToHash" => $stringToHash,
                "hashed" => $hashed,
                "isOK" => $hashSucceeded
            ]
        ];

        return new JsonResponse($data);

    }

    /**
    * @Route("/api/private", name="private")
    * @return JsonResponse
    */
    public function privateAction()
    {
        $hashed = hash('sha512', '=!$*:34r12ZAGO=!$*:');
        $hashedExpected = '5a97a52deef7a61dbbe9986b66add16d8ee42c4454f3b6ad0e9250d5e5125488adb56a752bcafcbe3ea100f7cd35a5d38c46c2120b6666c5cc6d8fea64f99b87';

        $hashSucceeded = $hashed == $hashedExpected;

        $data = [
            [
                'albumId' => "1",
                "id" => 1,
                "title" => "accusamus beatae ad facilis cum similique qui sunt",
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout",
                "hashed" => $hashed,
                "hashSucceeded" => $hashSucceeded
            ],
            [
                'albumId' => "2",
                "id" => 2,
                "title" => "accusamus beatae ad facilis cum similique qui sunt",
                "description" => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text"
            ],
            [
                'albumId' => "3",
                "id" => 3,
                "title" => "accusamus beatae ad facilis cum similique qui sunt",
                "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form"
            ],
        ];

        return new JsonResponse($data);
    }
}