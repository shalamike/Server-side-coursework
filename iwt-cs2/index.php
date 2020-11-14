<html>
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
    <body>

        <h1> Lecturer publications and collaborations</h1>
        <h6>select the lecturers you wish to view for their total publications and collaborated publication</h6>

        <form action="clientside.php" method="GET">
            Andrea Cali: <input type="checkbox" id = "cali" name="lecturer[]" value = "cali"><br>
            Jan Hidders: <input type="checkbox" id = "hidders" name="lecturer[]" value = "hidders"><br>
            Mark Levene: <input type="checkbox" id = "levene" name="lecturer[]" value = "levene"><br>
            Nigel Martin: <input type="checkbox" id = "martin" name="lecturer[]" value = "martin"><br>
            Alexandra Poulovassilis: <input type="checkbox" id = "poulo" name="lecturer[]" value = "poulo"><br>
            Peter Wood: <input type="checkbox" id = "wood" name="lecturer[]" value = "wood"><br>
            <br>

            enter the venue you wish to view: <input type="text" name = "venue" value = "">
            <input type="submit">
        </form>

    </body>
</html>