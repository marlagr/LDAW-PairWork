<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <h1>Student List</h1>

        <table border="1">

            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
            </thead>

            <tbody>

            <?php foreach($data as $key => $student){ ?>
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $student["name"] }}</td>
                    <td>{{ $student["lastname"] }}</td>
                </tr>
            <?php } ?>

            </tbody>

        </table>

        <br/><br/>

        <a href="{{ url("students/new") }}">New Student</a>

    </body>
</html>
