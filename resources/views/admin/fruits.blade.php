<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter fruits</title>
</head>
<body>

    <div class = "container navbar" >
            <a class="btn btn-light" href=" {{ route('home')}}">Retour au menu</a>
            <a class="btn btn-light" href=" {{ route('sirop.index')}}">Sirops</a>
            <a class="btn btn-light" href=" {{ route('softs.index')}}">Softs</a>
            <a class="btn btn-light" href=" {{ route('type.index')}}">Types d'alcools</a>
            <a class="btn btn-light" href=" {{ route('glasse.index')}}">Types de verres</a>
            <a class="btn btn-light" href=" {{ route('brand.index')}}">Marques d'alcool</a>
    </div>

        <h1 class="text-center">Liste des Fruits</h1>

        <div class = "container" >
            <table class="table align-middle table-light table-bordered table-striped table-hover">
            <thead>
                <tr>
                <form action=" {{ route('fruits.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" placeholder="Taper un Fruit" name="fruitName">
                    <input type="file" name="image" >
                    <button type="submit"  class="btn btn-success" > Ajouter fruit </button>
                </form>
                </tr>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Image</th>
                    <th scope="col">Ajouté à</th>
                    <th scope="col">Mofifié à</th>
                    <th scope="col">Supprimer</th>
                    <th scope="col">Modifier</th>
                </tr>
            </thead>
            @if(!is_null($fruits) && !empty($fruits))
                @foreach($fruits as $fruit)    
                    <tbody>
                        <tr>
                            <th scope="row">{{$fruit->id}}
                                <td>{{ $fruit->name}}</td>
                                <td> <img  class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $fruit->image_url) }}" alt="" height="200" width="200"/></td>
                                <td>{{ $fruit->created_at}}</td>
                                <td>{{ $fruit->updated_at}}</td>
                                <td><a class="btn btn-danger" id="del" href="{{route('fruits.delete', $fruit->id )}}">Supprimer</a></td>
                                <td> <form action=" {{ route('fruits.update', $fruit->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning"> Modifier boisson fruit </button>
                                <input class="form-control" type="text" name="fruitName" value="{{$fruit->name}}"></td>
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

</body>
</html>