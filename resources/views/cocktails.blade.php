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
    <ul>
        <li>
            <a href=" {{ route('home')}}"> Retour au menu</a>
        </li>
    </ul>
    <h1> Cocktails</h1>

    @if(!is_null($cocktails) && !empty($cocktails))
        @foreach($glasses as $glasse)
            <h2> {{$glasse->name}} </h2>
            @foreach($cocktails as $cocktail)
                @if($cocktail->glasse_id == $glasse->id)
                    <div class="position-relative">
                        <div class="row align-items-start">
                            <div class="card text-center " style="width: 18rem;">
                                <div class="card-body">
                                <h5> Nom du cocktail :  {{  $cocktail->name}}   </h5>
                                <p> Id : {{$cocktail->id}}</p>
                                <p>Glasse_Id : {{$cocktail->glasse_id}}</p>
                                <p> Ajouté le : {{$cocktail->created_at}}</p>
                                <p> Modifié le : {{$cocktail->updated_at}}</p>
                                <p> </p>
                                </div>
                                                
                                <a class="btn btn-danger" id="del" href="{{route('cocktails.delete', $cocktail->id )}}">Supprimer</a>
                                <form action=" {{ route('cocktails.update', $cocktail->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="g"> Modifier cocktail </button>
                                <input class="form-control" type="text" name="cocktailsName" value="{{$cocktail->name}}">
                                
                                </form>

                            </div>       
                        </div>
                    </div>
                @endif
            @endforeach
            <form action=" {{ route('cocktails.create') }}" method="POST">
                @csrf
                <input type="text" name="cocktailsName">
                <input type="text" hidden name="glasse_id" value="{{$glasse->id}}">
                <button type="submit" class="btn btn-success"> Ajouter un cocktail</button>
            </form>
        @endforeach
    @endif 
    
</body>
</html>