<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Sirop</title>
</head>
<body>
    <a href=" {{ route('home')}}">Retourner à l'accueil</a>
    <h1>Sirop</h1>

    <table border=1> 
        <thead>
            <tr>
                <th> id </th>
                <th> name </th>
                <th> Supprimer </th>
            </tr>
        </thead>
        <tbody>
        @foreach($sirop as $sirops)
            <tr>
                <td> {{  $sirops->id}}   </td>
                <td> {{  $sirops->name}}   </td>

                <td> <a type="submit" id="del" href="{{route('sirop.delete', $sirops->id )}}">Supprimer</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <form action=" {{ route('sirop.create') }}" method="POST">
        @csrf
        <input type="text" name="add">
        <button type="submit" > Ajouter sirop </button>
    </form>


</body>
</html>