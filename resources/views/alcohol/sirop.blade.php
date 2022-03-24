<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter sirop</title>
</head>
<body>
    <a href=" {{ route('home')}}">Retour au menu</a>
    <h1>Liste de Sirop</h1>

    <form action=" {{ route('sirop.create') }}" method="POST">
        @csrf
        <input  type="text" name="add">
        <button type="submit"  class="btn btn-success"> Ajouter boisson sirops </button>
    </form>

    @if(!is_null($sirop) && !empty($sirop))
        @foreach($sirop as $sirops)    
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                <h5> Nom du sirop :  {{  $sirops->name}}   </h5>
                <p> Id : {{$sirops->id}}</p>
                <p> Ajouté le : {{$sirops->created_at}}</p>
                <p> Modifié le : {{$sirops->updated_at}}</p>
                <p> </p>
                </div>
                                
                <a class="btn btn-danger" id="del" href="{{route('sirop.delete', $sirops->id )}}">Supprimer</a>
                <form action=" {{ route('sirop.update', $sirops->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-warning"> Modifier boisson sirops </button>
                <input class="form-control" type="text" name="add" value="{{$sirops->name}}">
                
                </form>
                </div>       
            </div>
        </div>
        @endforeach
    @endif
    


</body>
</html>