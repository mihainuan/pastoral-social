<?php

namespace App\Controller;

use App\Entity\Pessoa;
use App\Form\PessoaType;
use App\Repository\PessoaRepository;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pessoa", name="pessoa.")
 */
class PessoaController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PessoaRepository $pessoaRepository)
    {
        $pessoas = $pessoaRepository->findAll();

        return $this->render('pessoa/index.html.twig', [
            'pessoas' => $pessoas
        ]);
    }

    /**
     * @Route("/criar", name="criar")
     * @param Request $request
     */
    public function create(Request $request, FileUploader $fileUploader)
    {
        //Cria uma nova pessoa
        $pessoa = new Pessoa();

        $form = $this->createForm(PessoaType::class, $pessoa);
//
        $form->handleRequest($request);
        $form->getErrors();

        if ($form->isSubmitted()) {

            //Entity Manager
            $em = $this->getDoctrine()->getManager();

            /** @var UploadedFile $file */
            $file = $request->files->get('pessoa')['attachment'];
            //Check if I have the file before I upload
            if ($file) {
                $filename = $fileUploader->uploadFile($file);
                $pessoa->setImagem($filename);

                $em->persist($pessoa);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('pessoa.index'));
        }

        //Returns a response
        return $this->render('pessoa/show.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/exibir/{id}", name="exibir")
     * @param Pessoa $pessoa
     * @return Response
     */
    public function show(Pessoa $pessoa)
    {
        //dump($pessoa); die;

        //create the show view
        return $this->render('pessoa/show.html.twig', [
            'pessoa' => $pessoa
        ]);

    }

    /**
     * @Route("/remover/{id}", name="remover")
     * @param Pessoa $pessoa
     */
    public function remove(pessoa $pessoa)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($pessoa);
        $em->flush();

        $this->addFlash('success', 'Pessoa removida com sucesso!');

        return $this->redirect($this->generateUrl('pessoa.index'));
    }
}
