<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
       <div class="valide">
           <div>
               <h1 style="color:orangered">Bonjour {{ Auth::user()->name }}</h1>
                 <p style="margin-bottom:40px;">
                    votre demande a ete prise en consideration et nous allons vous contacter  pour la valider. je vous souhaite bonne journee!!  
                 </p>   
                
                <a style="text-decoration: none;color:blue;" href="{{route('products.index')}}">acheter d'autres produits</a>
            </div>
        </div>

</body>
</html>