@extends('product.layout')
@section('content')

<section class="section_container">

  <div style="padding-top:100px;">
    <div class="search_section">
      <div class="row justify-content-center">
        <div class="col-sm-4">
              <form action="" class="form-search">
                  <div class="input-group">
                       <input  type="text" class="form-control" placeholder="search">  
                       <button type="submit" class="btn text-white"><i class="fa-solid fa-search"></i></button>
                  </div>
              </form>   
        </div>
      </div>        
  </div> 
</div>

<div id="new" class="container p-3"> 

      <h4  class="h" class="mt-3"><span class="text-info">New Products</span></h4>
      <div class="root py-4" id="root">
           @foreach ($productsAct as $item)      
           <div class="one">
               <div class="two">
                   <img src="images/{{ $item->image }}"  alt="">
                   <div class="details">
                       <a href="{{route('products.show',$item->id)}}" class="button text-decoration-none">shop now</a>
                   </div>
               </div> 

               <div class="my-2 text-center">
                   <i class="star fas fa-star"></i>
                   <i class="star fas fa-star"></i>
                   <i class="star fas fa-star"></i>
                   <i class="star fas fa-star"></i>
                   <i class="star fas fa-star"></i>
               </div>
         
               <h6>{{$item->name}}</h6>
               <h6>{{$item->prix}} DH</h6>
           </div>
           @endforeach
      
          </div>
    </div>

</section>

@foreach($products as $produit)
    @if(count($produit['product_categorie'])!=0)
      <section id="new" class="container"> 
            <div  class="titre" id="{{$produit['categorie_id']}}">
              <p>{{$produit['catagorie_name']}}</p>
              <a class="titre-a" href="{{route('products.categorie',['parametre'=>$produit['categorie_id']])}}">voir plus</a>
            </div>
            
            <div class="root py-4" id="root">
               @foreach ($produit['product_categorie'] as $item)
                   
               <div class="one">
                   <div class="two">
                       <img src="images/{{ $item->image }}"  alt="">
                       <div class="details">
                           <a href="{{route('products.show',$item->id)}}" class="button text-decoration-none">shop now</a>
                       </div>
                   </div> 
             
                   <div class="my-2 text-center">
                       <i class="star fas fa-star"></i>
                       <i class="star fas fa-star"></i>
                       <i class="star fas fa-star"></i>
                       <i class="star fas fa-star"></i>
                       <i class="star fas fa-star"></i>
                      </div>
  
                   <h6>{{$item->name}}</h6>
                   <h6>{{$item->prix}} DH</h6>
                  </div>

                  @endforeach
                </div>
              </section>
              @endif     
       @endforeach
              
            <script>
              var x=document.getElementsByClassName('navbar_a');
              var home=document.getElementById('home');
              var navbar=document.getElementById('navbar');
              for(var k=0;k<x.length;k++){
                   x[k].style.color='white';
                   x[k].style.padding='0px 10px';           
                 }
                    
              window.addEventListener('scroll',()=>{
                navbar.classList.add('navbar-light');
                navbar.classList.add('bg-white');
                navbar.classList.add('shadow-sm');
                for(var j=0;j<x.length;j++){

                   x[j].style.color='black';
                  
                  }
              });
             </script>
             
  <script>
    var img=document.querySelectorAll('img');
        
    var element=document.getElementById('root');
    
    var resizeObserver = new ResizeObserver(function(entries) {
      entries.forEach(function(entry) {
        var newWidth = entry.contentRect.width;    
        if (newWidth >1000) {
          var x=newWidth/5;
          for(var i=0;i<img.length;i++){
            img[i].style.width=x+'px';
          }
        } else if(newWidth<1000 && newWidth>600) {
          var x=newWidth/4;
          for(var i=0;i<img.length;i++){
            img[i].style.width=x+'px';
          }
        }
        else{
          var x=newWidth/2;
          for(var i=0;i<img.length;i++){
            img[i].style.width=x+'px';
          } 
        }
      });
    });    
    resizeObserver.observe(element);
  </script>

  @endsection