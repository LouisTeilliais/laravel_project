<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter type alcool</title>
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

    <h1 class="text-center">Liste des marques d'alcool</h1>


    @if(!is_null($brand) && !empty($brand))
        @foreach($type as $types)
            <h2 class="text-center">  {{$types->name}} </h2>
                        <form action=" {{ route('brand.create') }}" method="POST">
                            @csrf
                            <div class="input_add">
                                <input type="text" placeholder="Nom de la marque" name="brandName" class="input">
                                <input type="number" placeholder="Degrés" name="degrees" class="input">
                                <input type="text"  name="alcoholType_id" hidden value="{{$types->id}}">
                                <button type="submit" class="btn btn-success"> Ajouter marque alcool </button>  
                            </div>             
                        </form>
                    @foreach($brand as $brands)
                        @if($brands-> alcohol_id == $types->id)
                        <div class = "container" >
                            <table class="table align-middle table-light table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Degrés</th>
                                        <th scope="col">Ajouté à</th>
                                        <th scope="col">Mofifié à</th>
                                        <th scope="col">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$brands->id}}
                                            <form action=" {{ route('brand.update', $brands->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <td> 
                                                <button hidden type="submit" class="btn btn-warning"> Modifier boisson brands </button>
                                                <input class="form-control" type="text" name="brandName" value="{{$brands->name}}">
                                            </td>
                                            <td><input type="number" name="degrees" value="{{$brands->degrees}}"></td>
                                            </form>
                                            <td>{{ $brands->created_at}}</td>
                                            <td>{{ $brands->updated_at}}</td>
                                            <td><a class="btn btn-danger" id="del" href="{{route('brand.delete', $brands->id )}}">Supprimer</a></td>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                        @endif
                    @endforeach 
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
     input[type="number"]{
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
    input[type="number"]:hover{
        background-color: #e9ecef;
        padding: 10px 15px;
        border-radius: 3px;
        border:none;
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
    
    
</style>