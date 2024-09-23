@extends('book.layout')

@section('content')

<!-- اضفنا جمبر ترون لإضافة تعليق!-->
<div class="jumbotron container">
  <h1 class="display-4" style="text-align:center">مكتبتي الرائعة</h1>
  <p class="lead">سأعرض لكم محتويات مكتبتي الجميلة وأقدم كتبها التي تجاوزت الأكثر من 20 عام</p>
  <hr class="my-4">
  <p style="text-align:center">قاعدة بيانات للتصفح وإضافة وتعديل محتوى المكتبة الجميلة </p>
  <a class="btn btn-primary btn-lg" href="{{route('book.index')}}" role="button">جميع البيانات  </a>
 
</div>
<div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
     
      @endif

  </div>
<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم الكتاب</th>
      <th scope="col">التفاصيل</th>
      <th scope="col" style="width: 400px">الحدث</th>
    </tr>
  </thead>
  <tbody>
        @php
                $i = 0;
            @endphp

            @foreach ($z as $item)
                <tr>
               <th scope="row">{{++$i}}</th>
                <td>{{ $item->name_book }}</td>
               <td>{{ $item->details }}</td>
               <td>
               <div class="row">
                  <div class="col-sm">
                      <td><a class="btn btn-primary" href="{{route('book.restore',$item->id)}}"> إستعادة</a></td>
                  </div>
               <div class="col-sm">
              <td><a class="btn btn-success" href="{{route('book.harddelte',$item->id)}}">حذف نهائي</a></td>
                </div>
               
             </div>
              </td>

             </tr>

            @endforeach
            <!-- في حال عدم إضافة سجل لقاعدة البيانات ستظهر هذه الرسالة وهنا استخدمنا كود بي اتش بي بطالريقة الاصلية!-->
            @php
               if($i==0)
               {
                echo "<p style='color:red; text-align:center;'>لا يوجد سجلات</p>";
               }
                else{
                echo "عدد السجلات المضافة".$i;
              }
               
            @endphp




  </tbody>

 </table>
 {!! $z->links() !!}

</div>

@endsection

