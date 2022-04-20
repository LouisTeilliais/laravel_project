<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter type alcool</title>
</head>
<body>

    <div class = "container navbar" >
        <a class="btn btn-light" href=" {{ route('home')}}">Retour au menu</a>
        <a class="btn btn-light" href=" {{ route('sirop.index')}}">Sirops</a>
        <a class="btn btn-light" href=" {{ route('softs.index')}}">Softs</a>
        <a class="btn btn-light" href=" {{ route('fruits.index')}}">Fruits</a>
        <a class="btn btn-light" href=" {{ route('type.index')}}">Types d'alcools</a>
        <a class="btn btn-light" href=" {{ route('glasse.index')}}">Types de verres</a>
    </div>

    <h1 class="text-center">Liste des marques d'alcool</h1>


    @if(!is_null($brand) && !empty($brand))
        @foreach($type as $types)
            <h2 class="text-center">  {{$types->name}} </h2>
                        <form action=" {{ route('brand.create') }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Nom de la marque" name="brandName">
                            <input type="number" placeholder="Degrés" name="degrees">
                            <input type="text"  name="alcoholType_id" hidden value="{{$types->id}}">
                            <button type="submit" class="btn btn-success"> Ajouter marque alcool </button>               
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
                                        <th scope="col">Modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$brands->id}}
                                            <td>{{ $brands->name}}</td>
                                            <td>{{ $brands->degrees}}°</td>
                                            <td>{{ $brands->created_at}}</td>
                                            <td>{{ $brands->updated_at}}</td>
                                            <td><a class="btn btn-danger" id="del" href="{{route('brand.delete', $brands->id )}}">Supprimer</a></td>
                                            <td> 
                                                <form action=" {{ route('brand.update', $brands->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-warning"> Modifier boisson brands </button>
                                                    <input class="form-control" type="text" name="brandName" value="{{$brands->name}}">
                                                </form>
                                            </td>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                        @endif
                    @endforeach 
        @endforeach
    @endif

    
                

            <!-- <div class="container">
                <div class="col position-relative container">
                    <div class="row justify-content-center mb-3 ">
                        <div class="card text-center " style="width: 18rem;">
                            <div class="card-body">
                            <h2> Marque :  {{  $brands->name}}   </h2>
                            <h5> Alcool : {{$types->name}} </h5>
                            <p> Degrés : {{$brands->degrees}}°</p>
                            </div>
                                            
                            <a class="btn btn-danger" id="del" href="{{route('brand.delete', $brands->id )}}">Supprimer</a>
                            <form action=" {{ route('brand.update', $brands->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning"> Modifier boisson sirops </button>
                            <input class="form-control" type="text" name="brandName" value="{{$brands->name}}">
                            
                            </form>
                        </div>       
                    </div>
                </div>
            </div> -->


        

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