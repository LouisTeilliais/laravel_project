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
    <a href=" {{ route('home')}}">Retour au menu</a>
    <h1>Liste des fruits</h1>

    <form action=" {{ route('fruits.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="fruitName">
        <input type="file" name="image" >
        <button type="submit"  class="btn btn-success" > Ajouter boisson fruit </button>
    </form>
     
    @if(!is_null($fruits) && !empty($fruits))
        @foreach($fruits as $fruit)

        <div class="position-relative container">
            <div class="row justify-content-center mb-3 ">
                <div class="card text-center " style="width: 18rem;">
                    <div class="card-body">
                    <h5> Nom du fruit :  {{  $fruit->name}}   </h5>
                    <p> Id : {{$fruit->id}}</p>
                    <p> Ajouté le : {{$fruit->created_at}}</p>
                    <p> Modifié le : {{$fruit->updated_at}}</p>
                    <p> <img  class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $fruit->image_url) }}"/></p>
                    </div>
                                    
                    <a class="btn btn-danger" id="del" href="{{route('fruits.delete', $fruit->id )}}">Supprimer</a>
                    <form action=" {{ route('fruits.update', $fruit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning"> Modifier boisson sirops </button>
                    <input class="form-control" type="text" name="fruitName" value="{{$fruit->name}}">
                    
                    </form>
                </div>       
            </div>
        </div>
        @endforeach
    @endif

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