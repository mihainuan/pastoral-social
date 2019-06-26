<?php

namespace App\Controller;

use App\Entity\Familia;
use App\Form\FamiliaType;
use App\Repository\FamiliaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/familia", name="familia.")
 */
class FamiliaController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(FamiliaRepository $familiaRepository)
    {
        $familias = $familiaRepository->findAll();

        return $this->render('familia/index.html.twig', [
            'familias' => $familias
        ]);
    }


    /**
     * @Route("/criar", name="criar")
     * @param Request $request
     */
    public function create(Request $request)
    {
        //Cria uma nova familia
        $familia = new Familia();

        $form = $this->createForm(FamiliaType::class, $familia);
//
        $form->handleRequest($request);
        $form->getErrors();

        if ($form->isSubmitted()) {

            //Entity Manager
            $em = $this->getDoctrine()->getManager();

//            /** @var UploadedFile $file */
//            $file = $request->files->get('familia')['attachment'];
//            //Check if I have the file before I upload
//            if($file){
//                $filename = $fileUploader->uploadFile($file);
//                $familia->setImagem($filename);

            $em->persist($familia);
            $em->flush();
//            }
            return $this->redirect($this->generateUrl('familia.index'));
        }

        //Returns a response
        return $this->render('familia/criar.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/exibir/{id}", name="exibir")
     * @param Familia $familia
     * @return Response
     */
    public function show(Familia $familia)
    {
        //dump($familia); die;

        //create the show view
        return $this->render('familia/show.html.twig', [
            'familia' => $familia
        ]);

    }

    /**
     * @Route("/remover/{id}", name="remover")
     * @param Familia $familia
     */
    public function remove(familia $familia)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($familia);
        $em->flush();

        $this->addFlash('success', 'Família removida com sucesso!');

        return $this->redirect($this->generateUrl('familia.index'));
    }
}

