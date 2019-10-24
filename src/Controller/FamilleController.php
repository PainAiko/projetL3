<?php

namespace App\Controller;
use App\Entity\Famille;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FamilleController extends AbstractController
{
    /**
     * @Route("/famille", name="famille")
     */
    public function index()
    {
        return $this->render('famille/index.html.twig', [
            'controller_name' => 'FamilleController',
        ]);
    }

     /**
     * @Route("/addFamille", name="add")
     */
    public function add(Request $request)
    {
        $famille = new Famille();

        $form=$this->createFormBuilder($famille)
            ->add('libelle',TextType::class,array('libelle' =>'description','required' =>false,'attr' =>array('class' =>'form-control')))
            ->add('Ajouter',SubmitType::class,array('label' => 'Create','attr' =>array('class' =>'btn btn-primary mt-3')))
            ->getForm();
           $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $famille = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($famille);
             $entityManager->flush();

            //return $this->redirectToRoute('article_list');
        }
        $familles = $this->getDoctrine()->getRepository(Famille::class)->findAll();
  return $this->render('famille/add.html.twig',
                array( 'form' => $form->createView(),'famille'=>$familles ));
    }
}
