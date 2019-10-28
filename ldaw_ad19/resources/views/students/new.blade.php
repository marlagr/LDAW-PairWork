<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <h1>New Student</h1>

        <form class="" action="<?php echo url("students"); ?>" method="post">

            @csrf

            <label>ID: </label><input type="text" name="enrollment" value="" />
            <br/><br/>
            <label>Name: </label><input type="text" name="name" value="" />
            <br/><br/>
            <label>Lastname: </label><input type="text" name="lastname" value="" />
            <br/><br/>
            <label>Second Lastname: </label><input type="text" name="lastname" value="" />
            <br/><br/>

            <label>Age: </label>

            <select class="" name="age">

            <?php for($i = 17; $i <= 99; $i++){ ?>

                <option value="{{ $i }}">{{ $i }}</option>

            <?php } ?>

            </select>

            <br/><br/>

            <input type="submit" name="submit" value="Guardar" />

        </form>

        <br/><br/>

        <a href="{{ url("studentsJson/list") }}">Students List</a>

    </body>
</html>
