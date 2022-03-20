<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Softs</title>
</head>
<body>
    <a href=" {{ route('home')}}">Retour au menu</a>
    <h1>Softs</h1>

    <table border=1> 
        <thead>
            <tr>
                <th> id </th>
                <th> name </th>
                <th> button </th>
            </tr>
        </thead>
        <tbody>
            @if(!is_null($softs) && !empty($softs))
                @foreach($softs as $soft)
                    <tr>
                        <td> {{  $soft->id}}   </td>
                        <td> {{  $soft->name}}   </td>
                        <td>
                            {{-- <a id="mod" href="{{route('softs.modifier', $soft->id )}}">Modifier</a> --}}
                            <a id="del" href="{{route('softs.delete', $soft->id )}}">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


    <form action=" {{ route('softs.create') }}" method="POST">
        @csrf
        <input type="text" name="name2">
        <button type="submit" > Ajouter boisson soft </button>
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