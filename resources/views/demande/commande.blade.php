@extends('product.layout')
@section('content')   
<div class="content">

 <div class="container p-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    @if ($message=Session::get('success'))
    <div class="alert alert-success">{{$message}}</div>
    @endif

    <div class="row justify-content-center">
           <div class="col-sm-6">

           <form action="{{route('commandes.store')}}" method="POST">
        
            @csrf                
             <div class="my-2">
                <div class="d-flex justify-content-between align-items-basline">
                    
                    <label for=""style="font-weight: bold" class="form-label">name : {{ Auth::user()->name }}</label>
                     <button id="btn1" class="btn btn-outline-info" type="button"  title="edit"  onclick="function1();"><i title="edit" class="fa-solid fa-pen-to-square"></i></button>                    
                </div>
                 <input id="input1" type="text" class="form-control" name="user_name" value="{{ Auth::user()->name }}">
            </div>
        
            <div class="my-2">
                <div class="d-flex justify-content-between">
                         <label for="" style="font-weight: bold" class="form-label">address : {{ Auth::user()->address }}</label>
                         <button id="btn2" class="btn btn-outline-info" type="button"  title="edit"  onclick="function2();"><i title="edit" class="fa-solid fa-pen-to-square"></i></button>                    
                    </div>
                <input id="input2" type="text" class="form-control" name="user_address" value="{{ Auth::user()->address }}">
            </div>
            
            <div class="my-2">
                <div class="d-flex justify-content-between">
                <label for="" style="font-weight: bold" class="form-label">phone number :  {{ Auth::user()->phone_numbre }}</label>
                     <button id="btn3" class="btn btn-outline-info" type="button"  title="edit"  onclick="function3();"><i class="fa-solid fa-pen-to-square"></i></button>                    
                </div>
                <input id="input3" type="text" class="form-control"  name="user_phone" value="{{ Auth::user()->phone_numbre }}">
            </div>
            <div class="my-2">
                <label style="font-weight: bold" class="form-label"  for="payment">payment :</label>
                <select class="form-select" name="payment" id="payment"> 
                <option value="1">en cache</option>
                <option value="2">par carte</option>
                </select>
            </div>
            
            <div class="my-2">
                <label style="font-weight:bold" class="form-label" for="livraison">livraison :</label>
                <select class="form-select" name="livraison" id="livraison"> 
                <option value="1">standard 99DH</option>
                <option value="2">express  200DH</option>
                </select>
            </div>
            
            <div class="my-3 pt-1 pe-2" style="background-color: orangered;color:white;">
                <label for=""style="font-weight: bold" class="px-2 form-label">total : {{ session()->get('total')}}DH</label>                    
             </div>
            <div class="my-3">
               <button type="submit" class="btn btn-outline-success">valider</button>
                <a href="{{route('demande.card')}}" class="btn btn-outline-primary"><i title="edit" class="fa-solid fa-pen-to-square"></i></a>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
  <script>
   var x1=document.getElementById("input1");
   var x2=document.getElementById("input2");
   var x3=document.getElementById("input3");
   x1.style.display="none";
   x2.style.display="none";
   x3.style.display="none";
   function function1(){
    x1.style.display="block";
    document.getElementById('btn1').style.display="none";
   }
   function function2(){
    x2.style.display="block";
    document.getElementById('btn2').style.display="none";
   }
   function function3(){
    x3.style.display="block";
    document.getElementById('btn3').style.display="none";
   }
   
 </script>
<script>
        var navbar=document.getElementById('navbar');
        navbar.classList.add('navbar-light');
        navbar.classList.add('bg-white');
        navbar.classList.add('shadow-sm');
 </script>
@endsection