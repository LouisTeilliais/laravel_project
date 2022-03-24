<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter type alcool</title>
</head>
<body>
    <h1>Type d'alcool</h1>
    @if(!is_null($type) && !empty($type))
        @foreach($type as $types)
            <table border=1> 
                <thead>
                    <tr>
                        <th> id </th>
                        <th> name </th>
                        <th> delete </th>
                    </tr>
                </thead>
                <tbody>
            
            <tr>
                    <td> {{  $types->id}}   </td>
                    <td> {{  $types->name}}   </td>
                    <td><a id="del" href="{{route('type.delete', $types->id )}}">Supprimer</a></td>
                </tr>
                </tbody>
            </table>
            <form action=" {{ route('type.update', $types->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="add" value="{{$types->name}}">
                <button type="submit" > Modifier l'alcool </button>
            </form>
        @endforeach
    @endif

    <form action=" {{ route('type.create') }}" method="POST">
        @csrf
        <input type="text" name="add">
        <button type="submit" > Ajouter type alcool </button>
    </form>


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