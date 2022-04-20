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
        <h1 class="text-center">Liste des Fruits</h1>

        <div class = "container" >
            <table class="table align-middle table-light table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Image</th>
                    <th scope="col">Ajouté à</th>
                    <th scope="col">Mofifié à</th>
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
                            </th>
                        </tr>
                    </tbody>
                @endforeach
            @endif
            </table>
        </div>  

</body>
</html>