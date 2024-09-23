@extends('book.layout')


@section('content')
<div class="container">
    <div class="row">
      <div class="col">


    </div>
    <div class="row">



      <div class="col">

        <div class="card"  >
         
            <div class="card-body-center">
              <h5 class="card-title">{{$book->name_book}}</h5>
              <p class="card-text"> {{$book->details}}</p>
              <p> تاريخ الإضافة:   {{$book->created_at->diffForhumans() }}</p>
            <p>  تاريخ التعديل:    {{$book->updated_at->diffForhumans() }}</p>
            

                

<br>

              <a class="btn btn-success" href="{{route('book.index')}}"> جميع الطلاب</a>
            </div>
          </div>

      </div>
    </div>
  </div>

  
@endsection

