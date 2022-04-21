@extends('layouts.app')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Alcohol Project </title>
</head>
<body>
    <h1>Front Partie</h1>
    <ul>
        <li>
            <a href=" {{ route('sirop.index')}}">Voir les sirops</a>
        </li>
        <li>
            <a href=" {{ route('softs.index')}}">Voir les softs</a>
        </li>
        <li>
            <a href=" {{ route('fruits.index')}}">Voir les fruits</a>
        </li>
        <li>
            <a href=" {{ route('type.index')}}">Voir les types d'alcools</a>
        </li>
        <li>
            <a href=" {{ route('glasse.index')}}">Voir les types de verres</a>
        </li>
        <li>
            <a href=" {{ route('brand.index')}}">Voir les marques d'alcools</a>
        </li>
        <li>
            <a href=" {{ route('cocktails.index')}}">Créer un cocktail </a>
        </li>
    </ul>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cocktails</title>
</head>
<body>

    <h1 class="text-center">Liste des Cocktails home</h1>

    <div class = "container" >
        <table class="table align-middle table-light table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Verre</th>
                <th scope="col">Alcool</th>
                <th scope="col">Fruit</th>
                <th scope="col">Soft</th>
                <th scope="col">Sirop</th>
            </tr>
        </thead>
        @if(!is_null($cocktails) && !empty($cocktails))
            @foreach($cocktails as $cocktail)
                <tbody>
                    <tr>
                        <th scope="row">{{$cocktail->id}}
                            <td>{{$cocktail->name}}</td>
                            @foreach($glasses as $glasse)
                                @if($glasse->id == $cocktail->glasse_id)
                                    <td> {{$glasse->name}} </td>
                                @endif
                            @endforeach
                            <td>
                                @foreach($cocktailMarques as $cocktailMarque)
                                    @foreach($brands as $brand)
                                        @if($cocktailMarque->cocktail_id == $cocktail->id && $cocktailMarque->brand_id == $brand->id)
                                            <ul>
                                                <li> {{$brand->name}} </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                                @foreach($cocktailFruits as $cocktailFruit)
                                    @foreach($fruits as $fruit)
                                        @if($cocktailFruit->cocktail_id == $cocktail->id && $cocktailFruit->fruits_id == $fruit->id)
                                            <ul>
                                                <li> {{$fruit->name}} </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                                @foreach($cocktailSofts as $cocktailSoft)
                                    @foreach($softs as $soft)
                                        @if($cocktailSoft->cocktail_id == $cocktail->id && $cocktailSoft->softs_id == $soft->id)
                                            <ul>
                                                <li> {{$soft->name}} </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                                @foreach($cocktailSirops as $cocktailSirop)
                                    @foreach($sirops as $sirop)
                                        @if($cocktailSirop->cocktail_id == $cocktail->id && $cocktailSirop->sirop_id == $sirop->id)
                                            <ul>
                                                <li> {{$sirop->name}} </li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </th>
                    </tr>
                </tbody>
            @endforeach
        @endif
        </table>
    </div>  
@endsection

<script>
let del = document.querySelectorAll("#del");
del.forEach(element => {
    element.addEventListener("click", function(event){
        alert("Vous êtes sur de vouloir supprimer ?")
    });
});


</script>

</body>
</html>

<style>

.container_navbar{
    display: flex;
    text-align: center;
    justify-content: space-between;
    padding: 40px 50px 40px 10px;
    background-color: #e9ecef;
    margin-bottom: 50px;
}

.fa-home{ 
    font-size: 25px; 
    color: blue 
} 
</style>
