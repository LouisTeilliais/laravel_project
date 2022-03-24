<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un glasse de verre</title>
</head>
<body>
    <h1>Types de verre</h1>
    @if(!is_null($glasse) && !empty($glasse))
        @foreach($glasse as $glasses)
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
                    <td> {{  $glasses->id}}   </td>
                    <td> {{  $glasses->name}}   </td>
                    <td><a id="del" href="{{route('glasse.delete', $glasses->id )}}">Supprimer</a></td>
                </tr>
                </tbody>
            </table>
            <form action=" {{ route('glasse.update', $glasses->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="add" value="{{$glasses->name}}">
                <button type="submit" > Modifier le verre </button>
            </form>
        @endforeach
    @endif

    <form action=" {{ route('glasse.create') }}" method="POST">
        @csrf
        <input type="text" name="add">
        <button type="submit" > Ajouter un verre </button>
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