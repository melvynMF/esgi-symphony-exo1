<?php

namespace App\Controller;

use App\Entity\Issue;
use App\Entity\Status;
use App\Form\IssueType;
use App\Repository\IssueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/issue")
 */
class IssueController extends AbstractController
{
    /**
     * @Route("/", name="issue_index", methods="GET")
     * @param IssueRepository $issueRepository
     * @return Response
     */
    public function index(IssueRepository $issueRepository): Response
    {
        return $this->render('issue/index.html.twig', ['issues' => $issueRepository->findAll()]);
    }

    /**
     * @Route("/new", name="issue_new", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $issue = new Issue();
        $form = $this->createForm(IssueType::class, $issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $status = $em->getRepository(Status::class)->findOneBy(["title" => "in progress"]);
            $issue->setStatusId($status);
            $issue->setUser($this->getUser());
            $em->persist($issue);
            $em->flush();

            return $this->redirectToRoute('issue_index');
        }

        return $this->render('issue/new.html.twig', [
            'issue' => $issue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="issue_show", methods="GET")
     * @param Issue $issue
     * @return Response
     */
    public function show(Issue $issue): Response
    {
        return $this->render('issue/show.html.twig', ['issue' => $issue]);
    }

    /**
     * @Route("/{slug}/edit", name="issue_edit", methods="GET|POST")
     */
    public function edit(Request $request, Issue $issue): Response
    {
        $form = $this->createForm(IssueType::class, $issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('issue_index', ['id' => $issue->getId()]);
        }

        return $this->render('issue/edit.html.twig', [
            'issue' => $issue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="issue_delete", methods="DELETE")
     */
    public function delete(Request $request, Issue $issue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$issue->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($issue);
            $em->flush();
        }

        return $this->redirectToRoute('issue_index');
    }
}
