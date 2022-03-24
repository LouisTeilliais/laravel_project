<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter sirop</title>
</head>
<body>
    <a href=" {{ route('home')}}">Retour au menu</a>
    <h1>Liste de sirop</h1>
    @if(!is_null($sirop) && !empty($sirop))
        @foreach($sirop as $sirops)
            <table border=1> 
                <thead>
                    <tr>
                        <th> id </th>
                        <th> name </th>
                        <th> button </th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <td> {{  $sirops->id}}   </td>
                                <td> {{  $sirops->name}}   </td>
                                <td>
                                    <!-- {{-- <a id="mod" href="{{route('sirop.modifier', $sirops->id )}}">Modifier</a> --}} -->
                                    <a id="del" href="{{route('sirop.delete', $sirops->id )}}">Supprimer</a>
                                </td>
                            </tr>
                </tbody>
            </table>
            <form action=" {{ route('sirop.update', $sirops->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="add" value="{{$sirops->name}}">
                <button type="submit" > Modifier boisson sirops </button>
            </form>
        @endforeach
    @endif
    <form action=" {{ route('sirop.create') }}" method="POST">
        @csrf
        <input type="text" name="add">
        <button type="submit" > Ajouter boisson sirops </button>
    </form>


</body>
</html>