<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action={{URL::to('insertD')}} enctype="multipart/form-data">
        @csrf
        <table border="2">
            <input type="hidden" name="txtid"/>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="txtname" ></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="txtPhoto"></td>
            </tr>
            <tr>
                <td>Hobby:</td>
                <td><input type="checkbox" name="hobby[]" value="travelling">travelling</input>
                    <input type="checkbox" name="hobby[]" value="food">food</input>
                </td>
            </tr>
            <tr>
                <td>city</td>
                <td><select name="city">
                    <option value="surat">Surat</option>
                </select></td>
            </tr>
            <tr>
                <td><input type="submit" name="operation" value="Insert">
                    <input type="button" name="operation" value="update">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
