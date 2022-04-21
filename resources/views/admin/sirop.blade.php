<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter sirop</title>
</head>
<body>
     
    <div class = "container_navbar" >
        <a class="btn btn-light" href=" {{ route('dashboard')}}"><i class="fa fa-home"></i></a>
        <a class="btn btn-light" href=" {{ route('sirop.index')}}">Sirops</a>
        <a class="btn btn-light" href=" {{ route('fruits.index')}}">Fruits</a>
        <a class="btn btn-light" href=" {{ route('softs.index')}}">Softs</a>
        <a class="btn btn-light" href=" {{ route('type.index')}}">Types d'alcools</a>
        <a class="btn btn-light" href=" {{ route('glasse.index')}}">Types de verres</a>
        <a class="btn btn-light" href=" {{ route('brand.index')}}">Marques d'alcools</a>
        <a class="btn btn-light" href=" {{ route('cocktails.index')}}">Créer un cocktail </a>
    </div> 

    <h1 class="text-center">Liste de Sirop</h1>

    <div class = "container" >
        <table class="table align-middle table-light table-bordered table-striped table-hover">
        <thead>
            <tr>
                <form action=" {{ route('sirop.create') }}" method="POST">
                    @csrf
                    <div class="input_add">
                        <input  class="input" type="text" placeholder="Taper un sirop" name="add">
                        <button type="submit"  class="btn btn-success"> Ajouter sirop </button>
                    </div>
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
        @if(!is_null($sirop) && !empty($sirop))
            @foreach($sirop as $sirops)    
            <tbody>
                <tr>
                    <th scope="row">{{$sirops->id}}
                        <td>
                            <form action=" {{ route('sirop.update', $sirops->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button hidden type="submit" class="btn btn-warning"> Modifier boisson sirops </button>
                            <input class="form-control" type="text" name="add" value="{{$sirops->name}}">
                        </td>
                        <td>{{ $sirops->created_at}}</td>
                        <td>{{ $sirops->updated_at}}</td>
                        <td><a class="btn btn-danger" id="del" href="{{route('sirop.delete', $sirops->id )}}">Supprimer</a></td>
                    </th>
                </tr>
            </tbody>
            @endforeach
        @endif
        </table>
    </div>  
    
</body>

<script>

</script>
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

    .input_add{
        text-align:center;
        border-radius: 10px;
        padding: 20px;
        background-color: #e9ecef;
        margin-bottom: 50px;
        margin-top: 20px;
    }

    .input_add .input {
        background-color: white;
        width: 300px;
    }

    .input_add .input:hover{
        background-color: white;
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