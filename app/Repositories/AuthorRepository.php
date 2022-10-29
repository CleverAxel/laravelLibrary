<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Mapper\AuthorMapper;
use Illuminate\Support\Facades\DB;

class AuthorRepository{
    public function getAll(){
        $authors = [];
        $authors = DB::select("SELECT * FROM author ORDER BY name");

        $authors = array_map(function($author){
            return AuthorMapper::mapAuthor($author);
        },$authors);

        return $authors;
    }
}
?>