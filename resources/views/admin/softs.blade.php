<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter Softs</title>
</head>
<body>

    <div class = "container_navbar" >
        <a class="btn btn-light" href=" {{ route('home')}}"><i class="fa fa-home"></i></a>
        <a class="btn btn-light" href=" {{ route('sirop.index')}}">Sirops</a>
        <a class="btn btn-light" href=" {{ route('fruits.index')}}">Fruits</a>
        <a class="btn btn-light" href=" {{ route('softs.index')}}">Softs</a>
        <a class="btn btn-light" href=" {{ route('type.index')}}">Types d'alcools</a>
        <a class="btn btn-light" href=" {{ route('glasse.index')}}">Types de verres</a>
        <a class="btn btn-light" href=" {{ route('brand.index')}}">Marques d'alcools</a>
        <a class="btn btn-light" href=" {{ route('cocktails.index')}}">Créer un cocktail </a>
    </div>

    <h1 class="text-center">Liste des Softs</h1>

    <div class = "container" >
        <table class="table align-middle table-light table-bordered table-striped table-hover">
        <thead>
            <tr>
                <form action=" {{ route('softs.create') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Taper un soft" name="add">
                    <button type="submit" class="btn btn-success"> Ajouter soft </button>
                </form>
            </tr>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Ajouté à</th>
                <th scope="col">Mofifié à</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        @if(!is_null($softs) && !empty($softs))
            @foreach($softs as $soft)
            <tbody>
                <tr>
                    <th scope="row">{{$soft->id}}
                        <td> <form action=" {{ route('softs.update', $soft->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button hidden type="submit" class="btn btn-warning"> Modifier boisson sirops </button>
                            <input class="form-control" type="text" name="add" value="{{$soft->name}}">
                        </td>
                        <td>{{ $soft->created_at}}</td>
                        <td>{{ $soft->updated_at}}</td>
                        <td><a class="btn btn-danger" id="del" href="{{route('softs.delete', $soft->id )}}">Supprimer</a></td>
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
    
    input[type="text"]{
        background-color: #e9ecef;
        padding: 10px 15px;
        border-radius: 3px;
        border:none;
    }
    
    input[type="text"]:hover{
        background-color: #e9ecef;
        padding: 10px 15px;
        border-radius: 3px;
        border:none;
    }
    
    
    </style>