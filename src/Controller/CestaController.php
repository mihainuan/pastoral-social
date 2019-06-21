<?php

namespace App\Controller;

use App\Entity\Cesta;
use App\Form\CestaType;
use App\Repository\CestaRepository;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cesta", name="cesta.")
 */
class CestaController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CestaRepository $cestaRepository)
    {
        $cestas = $cestaRepository->findAll();

        return $this->render('cesta/index.html.twig', [
            'cestas' => $cestas
        ]);
    }


    /**
     * @Route("/criar", name="criar")
     * @param Request $request
     */
    public function create(Request $request, FileUploader $fileUploader)
    {
        //Cria uma nova cesta
        $cesta = new Cesta();

        $form = $this->createForm(CestaType::class, $cesta);
//
        $form->handleRequest($request);
        $form->getErrors();

        if ($form->isSubmitted()) {

            //Entity Manager
            $em = $this->getDoctrine()->getManager();

            /** @var UploadedFile $file */
            $file = $request->files->get('cesta')['attachment'];
            //Check if I have the file before I upload
            if ($file) {
                $filename = $fileUploader->uploadFile($file);
                $cesta->setImagem($filename);

                $em->persist($cesta);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('cesta.index'));
        }

        //Returns a response
        return $this->render('cesta/show.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/exibir/{id}", name="exibir")
     * @param Cesta $cesta
     * @return Response
     */
    public function show(Cesta $cesta)
    {
        //dump($cesta); die;

        //create the show view
        return $this->render('cesta/show.html.twig', [
            'cesta' => $cesta
        ]);

    }

    /**
     * @Route("/remover/{id}", name="remover")
     * @param Cesta $cesta
     */
    public function remove(cesta $cesta)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($cesta);
        $em->flush();

        $this->addFlash('success', 'Cesta removida com sucesso!');

        return $this->redirect($this->generateUrl('cesta.index'));
    }
}
