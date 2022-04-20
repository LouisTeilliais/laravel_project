<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter un glasse de verre</title>
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

        <h1 class="text-center">Types de verre</h1>

        <div class = "container" >
            <table class="table align-middle table-light table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <form action=" {{ route('glasse.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="Taper un type de verre" name="add">
                        <input type="file" name="image" >
                        <button type="submit"  class="btn btn-success"> Ajouter un verre </button>
                    </form>
                </tr>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Image</th>
                    <th scope="col">Ajouté à</th>
                    <th scope="col">Mofifié à</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            @if(!is_null($glasse) && !empty($glasse))
                @foreach($glasse as $glasses)    
                    <tbody>
                        <tr>
                            <th scope="row">{{$glasses->id}}
                                <form action=" {{ route('glasse.update', $glasses->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>
                                    <button hidden type="submit" class="btn btn-warning"> Modifier verres </button>                                        
                                    <input class="form-control" type="text" name="add" value="{{$glasses->name}}">
                                </td>
                                <td> 
                                    <img height="100" width="100" class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $glasses->image_url) }}"/>
                                    <input type="file" name="image" >
                                    <button type="submit" class="btn btn-warning"> Modifier image </button>
                                </td>
                                </form>
                                <td>{{ $glasses->created_at}}</td>
                                <td>{{ $glasses->updated_at}}</td>
                                <td><a class="btn btn-danger" id="del" href="{{route('glasse.delete', $glasses->id )}}">Supprimer</a></td>
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