<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Book;
use App\Entity\User;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\Persistence\ManagerRegistry;


final class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    #[Route('/new', name: 'app_book_new', methods: ['GET', 'POST'])]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $book = new Book();
        $book->setIsbn('9782070752447');
        $book->setTitle('Villa vortex');
        $book->setSummary('11 septembre 2001, un nouveau monde commence...');
        $book->setPublicationYear(2003);
        $book->setCreatedAt(new \Datetime());
        $book->setUpdatedAt(new \Datetime());
        $entityManager->persist($book);
        $entityManager->flush();
        return $this->render('book/new.html.twig', [
            'book' => $book
        ]);
    }

    #[Route('/{id}', name: 'app_book_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        $loanStatus = 'disponible';
        if ($user = $book->getUser()) {
            $data = [
                $user->getFirstName(),
                $book->getIssueDate()->format('d M. o'),
            ];
            $loanStatus = vsprintf('emprunté par %s le %s', $data);
        }
        return $this->render('book/show.html.twig', [
            'bookTitle' => $book->getTitle(),
            'loanStatus' => $loanStatus,
        ]);

    }

    #[Route('/{id}/edit', name: 'app_book_edit', methods: ['GET', 'POST'])]
    public function edit(Book $book, EntityManagerInterface $entityManager): Response
    {
        $book->setSummary('Attention ! Ouvrir un roman de Dantec c \' est comme entrer en
religion...');
        $entityManager->flush();
         // Ajouter un message flash
        // $this->addFlash('success', 'Votre livre a été mis à jour avec succès !');
        // return $this->redirectToRoute('app_default');
        return $this->render('book/update.html.twig', [
            'bookTitle' => $book->getTitle()
        ]);
    }

    #[Route('/{id}/delete', name: 'app_book_delete', methods: ['GET'])]
    public function delete(Book $book, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($book);
        $entityManager->flush();
        return new Response('Identifiant du livre supprimé : ' . $book->getId());
    }

    //USERS

    #[Route('/user/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function newUser(EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $user = new User();
        $user->setEmail('mathieu.rozand@egs.school');
        $user->setFirstName('Mathieu');
        $user->setLastName('Rozand');
        $user->setPassword('test');
        $user->setAdress("40 rue de marseille");
        $user->setZipCode("33000");
        $user->setBirthDate(new \DateTimeImmutable('1988-11-17'));
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdateAt(new \DatetimeImmutable());

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            return $this->render('user/validate.html.twig', array(
                'errors' => $errors,
            ));
        }

        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Identifiant du user ajouté : ' . $user->getId());
    }

    #[Route('/{bookId}/{userId}/loan', name: 'app_book_nloan', methods: ['GET', 'POST'])]
    public function newLoan(
        int $bookId,
        int $userId,
        ManagerRegistry $doctrine,
        EntityManagerInterface $entityManager
    ) {
        $em = $doctrine->getManager();
        $book = $em->getRepository(Book::class)->find($bookId);
        $user = $em->getRepository(User::class)->find($userId);

        $book->setUser($user);
        $book->setIssueDate(new DateTime());
        $entityManager->flush();
        return new Response('Livre ' . $book->getTitle() .
            ' emprunté par ' . $user->getFirstName() . '&nbsp;' . $user->getLastName() .
            ' le ' . $book->getIssueDate()->format('d/m/Y H:i'));
    }
}
