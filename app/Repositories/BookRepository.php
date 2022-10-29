<?php
    declare(strict_types=1);
    namespace App\Repositories;
    use App\Models\Author;
    use App\Models\Genre;
    use App\Models\Book;
    use App\Mapper\BookMapper;

use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;

    class BookRepository{
        private int $resultByPage = 15;
        private string $table = "book";

        public function getAll(int $currentPage){
            $offset = ($currentPage-1) * $this->resultByPage;
            $books = [];

            try{
                $books = DB::select($this->queryGetAllBooks(), [
                            "limit" => $this->resultByPage, 
                            "offset" => $offset
                        ]);
            }catch(PDOException $e){
                throw new Exception("Probably failed to connect to db", (int)$e->getCode());
            }

            if(count($books) == 0){
                throw new Exception("No book returned. This page probably doesn't exist", 404);
            }

            return array_map(function($book){
                return BookMapper::mapBook($book);    
            }, $books);
        }

        private function queryGetAllBooks(){
            return "
                    WITH bookWithAuthAndGenre as (
                        WITH bookWithAuth as(
                            SELECT b.id as bookId, 
                            b.title, 
                            DATE_FORMAT(b.parution, \"%d/%m/%Y\") as date,
                            b.idEdition,
                            b.idCollection,
                            b.resume,
                            b.image,
                            json_arrayagg(JSON_OBJECT('id', a.id, 'name', a.name)) as author
                            FROM (SELECT * FROM book LIMIT :limit OFFSET :offset) as b
                            LEFT JOIN author_book as ab on ab.idBook = b.id
                            LEFT JOIN author as a on a.id = ab.idAuthor
                            GROUP BY b.id, b.title, date, b.idEdition, b.idCollection, b.resume, b.image
                        )
                    SELECT bWa.bookId, 
                    bWa.title, 
                    bWa.date,
                    bWa.author, 
                    json_arrayagg(JSON_OBJECT('id', g.id, 'name', g.name)) as genre,
					bWa.idEdition,
                    bWa.idCollection,
                    bWa.resume,
                    bWa.image
                    FROM bookWithAuth as bWa
                    LEFT JOIN book_genre as bg on bg.idBook = bWa.bookId
                    LEFT JOIN genre as g on g.id = bg.idGenre
                    GROUP BY bWa.bookId, bWa.title, bWa.date, bWa.author, bWa.resume, bWa.image, bWa.idEdition, bwa.idCollection
                )
                Select bag.bookId, bag.title, bag.date, bag.author, bag.resume, bag.image, bag.genre, bag.author, e.name as edition, c.name as collection
                from bookWithAuthAndGenre as bag
                LEFT JOIN edition as e on e.id = bag.idEdition
                LEFT JOIN collection as c on c.id = bag.idCollection;
                ";
        }
    }
?>