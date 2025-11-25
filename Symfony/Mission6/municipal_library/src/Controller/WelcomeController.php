<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/welcome')]
class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('welcome/index.html.twig');
    }

    #[Route ( '/{name}/{gender}' , name: 'app_welcome_index_gender' , methods: [ 'GET' ], requirements:['gender' => 'h|f']) ]
    public function indexCustom( String $name , String $gender ='h' ): Response // donne par défaut la valeur h à gender
    {
        $civility = '' ;
        switch ( $gender ) { 
            case "h" : {
                $civility = "Monsieur";
                break;
            }
            case "f" : {
                $civility = "Madame";
                break;
            }
            default : {
                $civility = " ";
            }
        }
        return $this -> render( 'welcome/index_custom.html.twig' , [
        'name' => $name ,
        'civility' => $civility ,
        ]);
     }    

    #[Route('/{name}', name: 'app_welcome_index_custom', methods: ['GET'])]
    public function indexBasic(string $name): Response
    {
        return new Response('Welcome ' . $name . ', you are in the "indexbasic" action (controller)');
    }
}
