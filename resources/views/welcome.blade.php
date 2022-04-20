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
    

    <script>
    let del = document.querySelectorAll("#del");
    del.forEach(element => {
        element.addEventListener("click", function(event){
            alert("Vous êtes sur de vouloir supprimer ?")
        });
    });


    </script>
</x-app-layout>
</body>
</html>