@extends('product.layout')
@section('content')

<div class="content">
    <section id="new" class="container pt-5"> 

       <div class="root2" id="root">
            @foreach ($products as $item)
                
            <div class="one">

                <div class="two">
                    <img src="/images/{{ $item->image }}"  alt="">
                    <div class="details">
                        <a href="{{route('products.show',$item->id)}}" class="button text-decoration-none">shop now</a>
                    </div>
                </div> 
          
                <div class="my-2 text-center">
                    <i class="star fas fa-star"></i>
                    <i class="star fas fa-star"></i>
                    <i class="star fas fa-star"></i>
                </div>
          
                <h6>{{$item->name}}</h6>
                <h6>{{$item->prix}} $</h6>
            </div>

            @endforeach
        </div>
     </section>
</div>

<script>
   var navbar=document.getElementById('navbar');
   navbar.classList.add('navbar-light');
   navbar.classList.add('bg-white');
   navbar.classList.add('shadow-sm');
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