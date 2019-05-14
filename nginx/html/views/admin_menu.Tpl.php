<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageData['title']; ?></title>
        <link rel="stylesheet" href="/css/content/styles/admin_menuStyle.css">
</head>
<body>
    <div class="usersList">
<?
    echo "<div class'table'><span class='td'> Login </span><span class='td'>Название книги</span><span class='td'>Как выдана</span><span class='td'> кнопочки </span>";
    foreach ($pageData['results'] as $key => $value) {
        echo "<form class='tr' method='post'><span class='td'> " . $value['login'] . " </span><span class='td'> ";
        echo '<select name=\'name\'>';
        foreach ($pageData['resultz'] as $keys => $values) {
            echo '<option> '.$values['name'].' </option>';
        }
        echo"</select></span><span class='td'><select name='typeissue'>
        <option value='По абонименту'>По абонименту</option>
        <option value='В читательный зал'>В читательный зал</option>
        </select></span><span class='td'>
        <input type='submit' name='login' value='".$value['login']."'></span></form>";
    }
    echo "</table>";
?>
    <a href="catalog"> <input type="submit" name="" value="Список книг"> </a>

</div>
</body>
</html>
