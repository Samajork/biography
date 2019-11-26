<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function index()
    {
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
        ]);
    }

    /**
     * @Route("/books_list", name="books_list")
     */
    public function booksList(BookRepository $bookRepository)
    {
        // je cherche mes fichiers dans le repository (et j'utilise la methode find all)
        // pour pouvoir selectionner tous les elements de ma table book
        //les repository servent a faire les requetes select dans les tables
        $booksList = $bookRepository->findAll();
        return $this->render('books/booksList.html.twig', [
            'booksList' => $booksList
        ]);
    }
        /**
         * @Route("/book/{id}", name="book")
         */
        private $auteur;
        public function book(BookRepository $bookRepository , $id){

            $book = $bookRepository->find('$id');
            return $this->render('books/book.html.twig',[
                'book' => $book
            ]);
    }
        /**
        * @Route("/book_by_style", name="book_by_style")
        */
        public function getBooksByStyle(BookRepository $bookRepository)
        {
            $books = $bookRepository->GetByGenre();

            dump($books); die;
            //verification de la page      var dump('hello Books');die;
            // appelle le bookrepository
            //on appelle la méthode getByGenre qui nous retourne tous les livres en fonction d'un genre'
        }




}
