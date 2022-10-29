<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Helpers\CodeHelper;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Rules\DateValid;
use App\Services\AuthorService;
use Exception;

class BookController extends Controller
{
    private BookService $bookService;
    private AuthorService $authorService;

    function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index(){
        return view("book.index");
    }

    public function getAll(Request $request){
        $currentPage = (int)$request->query("page");
        $books = null;
        $code = CodeHelper::$okCode;

        try{
            $books = $this->bookService->getAll($currentPage);
        }catch(Exception $e){
            $code = $e->getCode();
        }
        return view("book.getAll", [
            "books" => $books,
            "code" => $code
        ]);
    }

    public function create(){
        // $date = new DateTime("2009-02-29");
        // //$date->setDate(1900, 1, 1);
        // echo $date->format("d/m/Y");
        // if(DateHelper::isDateValid(1995,1,24)){
        //     echo "bon";
        // }else{
        //     echo "pas bon";
        // }
        $authors = [];
        $authors = $this->authorService->getAll();
        
        return view("book.create", [
            "authors" => $authors,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "title" => "unique:book,title",
            "dateHidden" => [new DateValid]
        ]);
    }
}
