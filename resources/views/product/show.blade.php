@extends('product.layout')
@section('content')
<style>
    
</style>
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
    
    <div class="d-flex justify-content-center p-2" id="root">

        <div class="bg-white single_produit d-flex align-items-center justify-content-center p-3" id="root1">
            <div>
               <img style="" id="img" src="/images/{{$product->image}}">
            </div>
            <div class="p-3">
                <p class="f-10 h4 mb-4" style="font-weight: bold">
                    {{$product->name}}
                </p>
                <p>
                    {{$product->details}}
                </p>
                <p style="font-weight: bold;color:coral">
                    {{$product->prix}} DH
            </p>       
            <form action="{{route('sessions.store')}}" method="POST" enctype="multipart/form-data">  
                @csrf
                @method('GET')
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="image" value="{{$product->image}}">
                <input type="hidden" name="prix" value="{{$product->prix}}">
                <input type="hidden" name="details" value="{{$product->details}}">
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="categorie_id" value="{{$product->categorie_id}}">
                <div class="input-group">
                     <input type="number" class="form-control" style="width:100px;" value="1" range min="1" name="quantite" id="quantite">
                     <button type="submit" class="btn btn-info  text-white"><i class="fa-solid fa-plus"></i></button> 
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