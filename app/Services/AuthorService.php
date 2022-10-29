<?php
declare(strict_types=1);
namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService{

    private AuthorRepository $authorRepository;

    public function __construct(AuthorRepository $authorRepository){
        $this->authorRepository = $authorRepository;
    }
    public function getAll(){
        return $this->authorRepository->getAll();
    }
}

?>