@extends('product.layout')

@section('content')
<div class="content">

<div class="container table-responsive pt-5"> 
    @if($data=session()->get('demandes'))
        <table class="card-table table table-striped" border="1px">
        <thead class="" style="background-color:coral">
          <tr>
            <th class="text-white">Name</th>
            <th class="text-white">image</th>
            <th class="text-white">prix</th>
            <th class="text-white">quantite</th>
            <th class="text-white">somme</th>
            <th class="text-white">action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                      <th>{{$item['produit_name']}}</th>
                      
                      <th><img src="/images/{{$item['produit_image']}}" style="width:100px;"></th>
                      
                      <th>{{$item['produit_prix']}}</th>
                      
                      <th>{{$item['produit_quantite']}}</th>
                      
                      <th>{{$item['produit_quantite']*$item['produit_prix']}} DH</th>
                      
                      <th>
                        <a href="{{route('sessions.diminuer',['parametre'=>$item['produit_id']])}}" class="btn btn-outline-danger">delete</a>
                        <a href="{{route('sessions.edit',['parametre'=>$item['produit_id']])}}" class="btn btn-outline-primary">edit</a>
                      </th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td style="font-weight: bold">Total :</td>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-weight: bold">
              @if($total=session()->get('total'))
                      {{$total}}DH
              @endif
            </td>
            <td>
              <a href="{{route('commandes.index')}}" class="btn btn-outline-success">commander</a>
            </td>
          </tr>
        </tfoot>
        </table>
    @endif  
</div>
</div>
<script>
    var navbar=document.getElementById('navbar');
    navbar.classList.add('navbar-light');
    navbar.classList.add('bg-white');
    navbar.classList.add('shadow-sm');
</script>
@endsection