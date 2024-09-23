<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**عرض جميع الحقول */
        /**سيكون عندنا متغير سيظهر لنا آخر اضافة بدا مع استخدام عرض اربع روابط في الصفحة */
        $z=Book::latest()->paginate(4);
        return view('book.index',compact('z'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_book'=>'required',
            'details'=>'required'
        ]);

        $z =Book::create($request->all());
         return redirect()->route('book.index')->with('success','تمت اضافة الكتاب بنجاح') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $book =Book::findOrFail($id);
        
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
    public function softDelete(  $id)
    {

        $z = Book::find($id)->delete();

        return redirect()->route('book.index')
        ->with('delete','product deleted successflly') ;
    }

    public function trashedBooks()
    {
    //  $products = Product::withTrashed()->latest()->paginate(4);
    $z = Book::onlyTrashed()->latest()->paginate(4);
       return view('book.trashed', compact('z'));
    }

    public function backFromSoftDelete(  $id)
    {


        $product = Book::onlyTrashed()->where('id' , $id)->first()->restore() ;
      //  dd($product);

        return redirect()->route('book.index')
        ->with('success','product back successfully') ;
    }

    public function  deleteForEver(  $id)
    {

        $product = Book::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('trashedBooks')
        ->with('success','product deleted successflly') ;
    }


}
