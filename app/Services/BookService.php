<?php
    declare(strict_types=1);
    namespace App\Services;
    
    use App\Repositories\BookRepository;
use Exception;

    class BookService{

        private BookRepository $bookRepository;

        function __construct(BookRepository $bookRepository)
        {
            $this->bookRepository = $bookRepository;    
        }

        public function getAll(int $currentPage){
            try{
                return $this->bookRepository->getAll($currentPage);
            }catch(Exception $e){
                throw new Exception($e->getMessage(), (int)$e->getCode());
            }
        }
    }
?>