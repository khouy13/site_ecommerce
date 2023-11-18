@extends('product.layout')
@section('content')
<div class="content">
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="d-flex  justify-content-center p-2" id="root">

    <div class="single_produit d-flex align-items-center justify-content-center p-3" id="root1">
 
         <div>
             <img id="img" src="/images/{{$item['produit_image']}}" alt="">
         </div>
         <div>
            <p class="f-10 h4 mb-4">
                {{$item['produit_name']}}
            </p>
            <p>
                {{$item['produit_details']}}
            </p>
            <p>
                 {{$item['produit_prix']}} $
            </p>
           
            <form action="{{route('sessions.update',['parametre'=>$item['produit_id']])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <div class="input-group">
                     <input type="number" class="form-control" style="width:100px;" range min="1" name="quantite" value="{{$item['produit_quantite']}}">
                     <button type="submit" class="btn btn-info  text-white">edit</button> 
                </div>
            </form>
         </div>
     </div>
    
  </div>
</div>
<script>
    var navbar=document.getElementById('navbar');
    navbar.classList.add('navbar-light');
    navbar.classList.add('bg-white');
    navbar.classList.add('shadow-sm');
</script>
<script>
    var ele=document.getElementById('img');
    var root=document.getElementById('root');    
    var root1=document.getElementById('root1');    
    var resizeObserver = new ResizeObserver(function(entries) {
        entries.forEach(function(entry) {
            var newWidth = entry.contentRect.width;    
            if(newWidth>600){
                var x=newWidth/3;
               ele.style.width=x+"px";
               ele.style.height=x+"px";
               root1.classList.add('justify-content-center');
               root1.classList.remove('justify-content-around');
            }
            else{
              var x=newWidth-20;
              ele.style.width=x+"px";
              ele.style.height=x+"px";
              root1.classList.remove('justify-content-center');
              root1.classList.add('justify-content-around');
            }
      });
    });    
    resizeObserver.observe(root);
    </script>
@endsection