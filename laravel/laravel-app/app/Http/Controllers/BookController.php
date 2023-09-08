<?php

namespace App\Http\Controllers;

        use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$books=Book::all();
        
   
       return view("index",compact("books"));
    
    }
    public function viewborr()
    {
        $borrs=UserBook::all();
   
       return view("borr",compact("borrs"));
    
    }

    public function users(){
      $users=User::all();
      return view("usersdt",compact("users"));

    }
    public function userpage()
    {
        $books=Book::all();
       return view("customerview",compact("books"));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate(
        [
            "name"=>"required",
            "category"=>"required",
            "title"=>"required",
            "quantity"=>"required",
            "file"=>"required|mimes:jpg,png,jpeg|max:5048"

        ]
     );

$slug = Str::slug($request->file, '-');
$newImage=uniqid().'-'.$slug.'.'. $request->file->extension();
$request->file->move(public_path('images'),$newImage);
$file_extension = $request->file->getClientOriginalExtension();


$books=new Book();
$books->name=$request->name;
$books->category=$request->category;
$books->title=$request->title;
$books->quantity=$request->quantity;
$books->slug=$slug;
$books->file=$newImage;
$books->user_id=Auth::id();
$books->save();
return redirect("/books");

    }





//////////////////////////////////////////////


    public function borrow(Book $id)
    {
    
        $user =  User::find(Auth::id());
        $book = $id;

        if ($book->quantity == 0) abort(409);

        $book->decrement('quantity', 1);

        $user->books()->attach($id, [
            'borrowed_at' => now()
        ]);

        // dd($user->books);

        return redirect('homepage');


        return view("createborrow",compact("id"));
    }

    public function return(Book $id)
    {
    
        $user =  User::find(Auth::id());
        $book = $id;

        if ($book->quantity == 0) abort(409);

        $book->increment('quantity', 1);

        $user->books()->detach($id, [
            'returned_at' => now()
        ]);

        // dd($user->books);
        return redirect('homepage');

        return view("createborrow",compact("id"));
    }




    public function storeborrow(Request $request)
    {  
       
    
    $slug = Str::slug($request->file, '-');
    $newImage=uniqid().'-'.$slug.'.'. $request->file->extension();
    $request->file->move(public_path('images'),$newImage);
    $file_extension = $request->file->getClientOriginalExtension();
    
    
    $books=new Book();
    $books->name=$request->name;
    $books->category=$request->category;
    $books->title=$request->title;
    $books->quantity=$request->quantity;
    $books->slug=$slug;
    $books->file=$newImage;
    $books->user_id=Auth::id();
    $books->save();
    
return redirect("/userpage");

    }
    ////////////////////////////////////////////////////

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {   Book::find($book);
        return view("view",compact("book"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        
        Book::find($book);
        return view("edit",compact("book"));

    }
    



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    { Book::find($book);


        $request->validate(
            [
                "name"=>"required",
                "category"=>"required",
                "title"=>"required",
                "quantity"=>"required",
                "file"=>"required|mimes:jpg,png,jpeg|max:5048"
    
            ]);

        $slug = Str::slug($request->file, '-');
        $newImage=uniqid().'-'.$slug.'.'. $request->file->extension();
        $request->file->move(public_path('images'),$newImage);
        $file_extension = $request->file->getClientOriginalExtension();


        $book->name=$request->name;
        $book->title=$request->title;
        $book->quantity=$request->quantity;
        $book->slug=$slug;
        $book->file=$newImage;
        $book->category=$request->category;
        $book->save();
        return redirect("/books");
    }

    /////////////////////////////////////////////
    public function edituser(User $user)
    {
        
      User::find($user);
        return view("edituser",compact("user"));

    }

    public function updateprofile(Request $request, User $user)
    { User::find($user);


        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect("/homepage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        Book::destroy($book);
        return redirect("/books");
    }



    // public function serch(Request $request)
    // {
    //     $users = User::where('id', '=', $request->id)->get();

    //     return view('search', compact('users'));
    // }


    // public function search(User $user)
    // {   $search=User::all();
    //     return view("search",compact("search"));
        
    // }
}
