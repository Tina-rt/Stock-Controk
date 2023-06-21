<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin login</h1>
    <form action="login_process" method="post">
        <input type="text" name="nom_utilisateur" id="nom_utilisateur" placeholder="nom_utilisateur">
        <input type="password" name="password" id="password" placeholder="password">
        <input type="submit" value="submit">
    </form>
    <?php if (isset($_GET['message'])){
        echo $_GET['message'];
    }?>
</body>
</html>