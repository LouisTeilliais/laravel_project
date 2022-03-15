<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Sirop</title>
</head>
<body>
    <h1>Sirop</h1>

    <table border=1> 
        <thead>
            <tr>
                <th> id </th>
                <th> name </th>
            </tr>
        </thead>
       

    </table>


    <form action=" {{ route('sirop.create') }}" method="POST">
        <input type="text" name="add">
        <button type="submit" > Ajouter sirop </button>
    </form>


</body>
</html>