@extends('book.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">صفحة إنشاء اسماء الكتب</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('book.store')}}" method="POST">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1"> اسم الكتاب</label>
          <input type="text" name="name_book" class="form-control"  placeholder="product name">
        </div>

<!--لاحظ هنا النيم لا بد يكون نفس الحقل الآتي من قاعدة البيانات!-->
        <div class="form-group">
          <label for="exampleFormControlTextarea1">تفاصيل الكتاب  </label>
          <textarea class="form-control" name="details"   rows="3"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection
