<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageData['title']; ?></title>
</head>
<link rel="stylesheet" href="/css/content/styles/catalogStyle.css">
<body>
    <form method="post">
        <input type="search" name="search" placeholder="Поиск">
        <button type="submit">Найти</button>
    </form>
    <br>
<?
    echo "<table>";
    echo "<tr><td> Название книги </td><td> Имя автора </td>
    <td> Жанр </td><td> Количество в наличии</td>
    <td><img class='imgbook' src='book.jpg'></td></tr>";
    foreach ($pageData['results'] as $key => $value) {
        echo "<tr><td>" . $value['name']  . "</td><td>" . $value['writer'] .
        "</td><td>" . $value['genre']  . "</td><td>" . $value['quantity'] ."</td>
        <td><form method='post'>
        <input type='submit' name='".$value['name']."' value='Добавить'><input class='hide' type='text' name='nameBook' value='".$value['name']."'></form></td></tr>";
    }
    echo "</table>";
?>
    <a href="admin_menu"> <input type="submit" name="" value="выдача книг"> </a>
</body>
</html>
