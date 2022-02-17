<!DOCTYPE html>
<html>

<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <title>Director</title>
</head>

<body>
    
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($directors as $director)
                <tr>
                    <td>{{ $director->id }}</td>
                    <td>{{ $director->titleDirector }}</td>
                    <td>{{ $director->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

</body>

</html>