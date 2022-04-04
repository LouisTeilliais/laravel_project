<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter Softs</title>
</head>
<body>
    <a href=" {{ route('home')}}">Retour au menu</a>
    <h1>Softs</h1>

    <form action=" {{ route('softs.create') }}" method="POST">
        @csrf
        <input type="text" name="add">
        <button type="submit" class="btn btn-success"> Ajouter boisson soft </button>
    </form>


    @if(!is_null($softs) && !empty($softs))
        @foreach($softs as $soft)
        <div class="position-relative">
            <div class="row align-items-start">
                <div class="card text-center " style="width: 18rem;">
                    <div class="card-body">
                    <h5> Nom du sirop :  {{  $soft->name}}   </h5>
                    <p> Id : {{$soft->id}}</p>
                    <p> Ajouté le : {{$soft->created_at}}</p>
                    <p> Modifié le : {{$soft->updated_at}}</p>
                    <p> </p>
                    </div>
                                    
                    <a class="btn btn-danger" id="del" href="{{route('softs.delete', $soft->id )}}">Supprimer</a>
                    <form action=" {{ route('softs.update', $soft->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning"> Modifier boisson sirops </button>
                    <input class="form-control" type="text" name="add" value="{{$soft->name}}">
                    
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