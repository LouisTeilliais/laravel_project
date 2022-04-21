<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter Cocktail</title>
</head>

<body>
<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des Cocktails
            </h2>
    </x-slot>
    <div class ="container">
        @if(!is_null($cocktails) && !empty($cocktails))
            @foreach($cocktails as $cocktail)

            <div class="card">
                <div class="card-body">
                    <h2 class="text-center" style="font-size: xx-large;">{{$cocktail->name}}</h2>
                    <img  class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $cocktail->image_url) }}" alt="" height="100" width="100"/>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($glasses as $glasse)
                        @if($glasse->id == $cocktail->glasse_id)
                            <li class="list-group-item text-center">Verre : {{$glasse->name}}
                            <img  class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $glasse->image_url) }}" alt="" height="100" width="100"/>
                            </li>
                        @endif
                    @endforeach
                    @foreach($cocktailMarques as $cocktailMarque)
                        @foreach($brands as $brand)
                            @if($cocktailMarque->cocktail_id == $cocktail->id && $cocktailMarque->brand_id == $brand->id)
                                <p class="text-center"> Marque(s) d'alcool: </p>
                                <li class="list-group-item text-center"> {{$brand->name}} </li>
                            @endif
                        @endforeach
                    @endforeach
                    @foreach($cocktailFruits as $cocktailFruit)
                        @foreach($fruits as $fruit)
                            @if($cocktailFruit->cocktail_id == $cocktail->id && $cocktailFruit->fruits_id == $fruit->id)
                                    <p class="text-center"> Fruit(s) : </p>
                                    <li class="list-group-item text-center"> {{$fruit->name}} 
                                    <img  class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $fruit->image_url) }}" alt="" height="100" width="100"/>
                                    </li>
                            @endif
                        @endforeach
                    @endforeach
                    @foreach($cocktailSofts as $cocktailSoft)
                        @foreach($softs as $soft)
                            @if($cocktailSoft->cocktail_id == $cocktail->id && $cocktailSoft->softs_id == $soft->id)
                                    <p class="text-center">
                                        Soft(s) : 
                                    </p>
                                    <li class="list-group-item text-center"> {{$soft->name}} </li>
                            @endif
                        @endforeach
                    @endforeach
                    @foreach($cocktailSirops as $cocktailSirop)
                        @foreach($sirops as $sirop)
                            @if($cocktailSirop->cocktail_id == $cocktail->id && $cocktailSirop->sirop_id == $sirop->id)
                            <p class="text-center"> Sirop(s) : </p>
                            <li class="list-group-item text-center"> {{$sirop->name}} </li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
</body>
</html>

<style>
    
    .container
    {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
    }

    .card{
        width: 31.996%;
        margin-top: 20px;
        margin-right: 10px;
        margin-left: 10px;
    }


</style>