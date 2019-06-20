<?php

namespace App\Controller;

use App\Entity\Visita;
use App\Form\VisitaType;
use App\Repository\VisitaRepository;
use function Composer\Autoload\includeFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/visita", name="visita.")
 */
class VisitaController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(VisitaRepository $visitaRepository)
    {
        $visitas = $visitaRepository->findAll();

        return $this->render('visita/index.html.twig', [
            'visitas' => $visitas
        ]);
    }

    /**
     * @Route("/criar", name="criar")
     * @param Request $request
     */
    public function create(Request $request)
    {
        //Cria uma nova visita
        $visita = new Visita();
//        $visita->setIdFamilia(1);
//        $visita->setDescricao('Uma nova Visita');
//        $visita->setDataVisita('09/27/2019');


        $form = $this->createForm(VisitaType::class, $visita);
//
        $form->handleRequest($request);
        $form->getErrors();

        if($form->isSubmitted()){
            //Entity Manager
            $em = $this->getDoctrine()->getManager();

//            /** @var UploadedFile $file */
//            $file = $request->files->get('visita')['imagem'];
//           $file = $request->files->get('visita')['imagem'];
//           dump($file);

            //Check if I have the file before I upload
//            if($file){
//                $filename = md5(uniqid()) . '.' . $file->guessClientExtension();
//
//                //Move file to uploads_dir
//                $file->move(
//                    $this->getParameter('uploads_dir'),
//                    $filename
//                );

//                $visita->setImagem($filename);

                $em->persist($visita);
                $em->flush();

//            }

            return $this->redirect($this->generateUrl('visita.index'));
//            return new Response('Visita Criada!');
        }

        //Returns a response
        return $this->render('visita/criar.html.twig', [
            'form' => $form->createView()
        ]);
    }




    /**
     * @Route("/exibir/{id}", name="exibir")
     * @param Visita $visita
     * @return Response
     */
    public function show(Visita $visita)
    {
        //dump($visita); die;

        //create the show view
        return $this->render('visita/show.html.twig', [
            'visita' => $visita
        ]);

    }

    /**
     * @Route("/remover/{id}", name="remover")
     * @param Visita $visita
     */
    public function remove(Visita $visita)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($visita);
        $em->flush();

        $this->addFlash('success','Visita removida com sucesso!');

        return $this->redirect($this->generateUrl('visita.index'));
    }
}
