<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Contribution;
use App\Entity\Project;
use App\Entity\User;
use App\Form\ProjectType;
use mysql_xdevapi\TableSelect;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        //rechercher les donnees en bdd
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();

//        $totalcategory = $categories->createQueryBuilder('c')
//        ->select('count(c.id')
//        ->getQuery()
//        ->getSingleScalarResult();
//
//        return new Response($totalcategory);

        //envoyer les donnees a la vue
        return $this->render('default/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    public function headerCategories()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render("default/_thumbnail.html.twig",[
            'categories' => $categories,
        ]);
    }
}
