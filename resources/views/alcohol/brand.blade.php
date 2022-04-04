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
    <a href=" {{ route('home')}}">Retour au menu</a>

    <h1>Marque d'alcool</h1>


    @if(!is_null($brand) && !empty($brand))
        @foreach($type as $types)
            <h2> {{$types->name}} </h2>
            @foreach($brand as $brands)
                @if($brands-> alcohol_id == $types->id)
                    <table border=1> 
                        <thead>
                            <tr>
                                <th> id </th>
                                <th> name </th>
                                <th> degrees </th>
                                <th> delete </th>
                            </tr>
                        </thead>
                        <tbody>
                    
                    <tr>
                            <td> {{  $brands->id}}   </td>
                            <td> {{  $brands->name}}   </td>
                            <td> {{  $brands->degrees}}   </td>
                            <td><a id="del" href="{{route('brand.delete', $types->id )}}">Supprimer</a></td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            @endforeach
            <form action=" {{ route('brand.create') }}" method="POST">
                @csrf
                <input type="text" name="brandName">
                <input type="number" name="degrees">
                <input type="text" hidden name="alcoholType_id" value="{{$types->id}}">
                <button type="submit" > Ajouter marque alcool </button>               
            </form>
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