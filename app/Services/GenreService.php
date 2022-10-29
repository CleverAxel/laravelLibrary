<?php
declare(strict_types=1);
namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService{

    private GenreRepository $genreRepository;

    public function __construct(GenreRepository $genreRepository){
        $this->genreRepository = $genreRepository;
    }
    public function getAll(){
        return $this->genreRepository->getAll();
    }
}

?>