<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ajouter Cocktail</title>
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

    <h1 class="text-center">Liste des Cocktails</h1>

    <div class = "container" >
        <table class="table align-middle table-light table-bordered table-striped table-hover">
        <thead>
            <tr>
                <form action=" {{ route('cocktails.create') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="input_add">
                        <input class="input" type="text" placeholder="Nom du cocktail" name="name" required>
                        <select class="form-select" name="glasses" required >
                            <option value="null">Sélectionnez le verre</option>
                            @foreach($glasses as $glasse)
                                <option value="{{$glasse->id}}">{{$glasse->name}}</option>
                            @endforeach
                        </select>
                        <input type="file" name="image" >
                        
                        <button type="submit" class="btn btn-success"> Ajouter le cocktail </button>
                    </div>
                </form>
            </tr>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Image</th>
                <th scope="col">Verre</th>
                <th scope="col">Alcool</th>
                <th scope="col">Fruit</th>
                <th scope="col">Soft</th>
                <th scope="col">Sirop</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        @if(!is_null($cocktails) && !empty($cocktails))
            @foreach($cocktails as $cocktail)
                <tbody>
                    <tr>
                        <th scope="row">{{$cocktail->id}}
                            <td>{{$cocktail->name}}</td>
                            <td><img height="100" width="100" class="img-fluid rounded mx-auto d-block" src="{{ asset('storage/images/' . $cocktail->image_url) }}"/></td>
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
                                <form action="{{ route('cocktails.add', $cocktail->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="brand">
                                        <option value="null">Ajouter un alcool</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <input hidden name="element" value="brand" >
                                    <button class="btn btn-success" type="submit" >Ajouter</button>
                                </form>
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
                                <form action="{{ route('cocktails.add', $cocktail->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="fruit">
                                        <option value="null">Ajouter un fruit</option>
                                        @foreach($fruits as $fruit)
                                            <option value="{{$fruit->id}}">{{$fruit->name}}</option>
                                        @endforeach
                                    </select>
                                    <input hidden name="element" value="fruit" >
                                    <button class="btn btn-success" type="submit" >Ajouter</button>
                                </form>
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
                                <form action="{{ route('cocktails.add', $cocktail->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="soft">
                                        <option value="null">Ajouter un soft</option>
                                        @foreach($softs as $soft)
                                            <option value="{{$soft->id}}">{{$soft->name}}</option>
                                        @endforeach
                                    </select>
                                    <input hidden name="element" value="soft" >
                                    <button class="btn btn-success" type="submit" >Ajouter</button>
                                </form>
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
                                <form action="{{ route('cocktails.add', $cocktail->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="sirop">
                                        <option value="null">Ajouter un sirop</option>
                                        @foreach($sirops as $sirop)
                                            <option value="{{$sirop->id}}">{{$sirop->name}}</option>
                                        @endforeach
                                    </select>
                                    <input hidden name="element" value="sirop" >
                                    <button class="btn btn-success" type="submit" >Ajouter</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-danger" id="del" href="{{route('cocktails.delete', $cocktail->id )}}">Supprimer</a>
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