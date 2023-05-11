<?php

namespace App\Controller\Blog;

use App\Entity\Post\Post;
use App\Repository\Post\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'blog.index', methods: ['GET'])]
    public function index(PostRepository $postRepository, Request $request): Response
    {
        return $this->render('pages/blog/index.html.twig', [
            'posts' => $postRepository->findPublished($request->query->getInt('page', 1))
        ]);
    }

    #[Route('/article/{slug}', name: 'blog.show', methods: ['GET', 'POST'])]
    public function show(Post $post/*, Request $request, EntityManagerInterface $em*/): Response
    {
//        $comment = new Comment();
//        $comment->setPost($post);
//        if($this->getUser()) {
//            $comment->setAuthor($this->getUser());
//        }
//
//        $form = $this->createForm(CommentType::class, $comment);
//        $form->handleRequest($request);
//        if($form->isSubmitted() && $form->isValid()) {
//            $em->persist($comment);
//            $em->flush();
//
//            $this->addFlash('success', 'Votre commentaire a bien été enregistré. Il sera soumis à modération dans les plus brefs délais.');
//
//            return $this->redirectToRoute('post.show', ['slug' => $post->getSlug()]);
//        }

        return $this->render('pages/blog/show.html.twig', [
            'post' => $post,
//            'form' => $form->createView()
        ]);
    }

}
