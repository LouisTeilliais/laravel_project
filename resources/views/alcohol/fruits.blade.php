<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter fruits</title>
</head>
<body>
    <a href=" {{ route('home')}}">Retour au menu</a>
    <h1>fruits</h1>
    @if(!is_null($fruits) && !empty($fruits))
        @foreach($fruits as $fruit)
            <table border=1> 
                <thead>
                    <tr>
                        <th> id </th>
                        <th> name </th>
                        <th> Image </th>
                        <th> button </th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <td> {{  $fruit->id}}   </td>
                                <td> {{  $fruit->name}}   </td>
                                <td><img src="{{ asset('storage/images/' . $fruit->image_url) }}"/></td>
                                <td>
                                    <a id="del" href="{{route('fruits.delete', $fruit->id )}}">Supprimer</a>
                                </td>
                            </tr>
                </tbody>
            </table>
            <form action=" {{ route('fruits.update', $fruit->id) }}" method="POST">
                @csrf
                @method("PUT")
                <input type="text" name="fruitName" value="{{$fruit->name}}">
                <button type="submit" > Modifier boisson fruit </button>
            </form>
        @endforeach
    @endif
    <form action=" {{ route('fruits.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="fruitName">
        <input type="file" name="image">
        <button type="submit" > Ajouter boisson fruit </button>
    </form>
    
    {{-- <form action=" {{ route('fruits.save', $fruit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit" > Add photo</button>
    </form> --}}

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