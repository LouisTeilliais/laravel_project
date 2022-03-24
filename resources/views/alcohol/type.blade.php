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

    <table border=1> 
        <thead>
            <tr>
                <th> id </th>
                <th> name </th>
            </tr>
        </thead>
        <tbody>
       @foreach($type as $types)
       <tr>
            <td> {{  $types->id}}   </td>
            <td> {{  $types->name}}   </td>
        </tr>
        @endforeach
        </tbody>
    </table>


    <form action=" {{ route('type.create') }}" method="POST">
        @csrf
        <input type="text" name="add">
        <button type="submit" > Ajouter type alcool </button>
    </form>


</body>
</html>