<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\Type\MemberType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();

        $member = new Member();

        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $member = $form->getData();
            $em->persist($member);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        $members=$em->getRepository(Member::class)->findAll();

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
            'members'=>$members,
        ]);
    }
}
