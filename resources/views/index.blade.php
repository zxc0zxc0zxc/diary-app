<!DOCTYPE html>
<html>
<head>
    <title>Дневник всего</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/additional.css" />
</head>
<body>
<div class="uk-background-primary">
    <div class="centered-login-form uk-background-default"  style="width: 900px;">
        <div class="centered-login-form" style="width: 400px;">
            <p class="uk-text-normal">Можно посмотреть чужой дневник по id</p>
            <form action="/blog" method="get">
                <input class="uk-input" name="id" type="text">
                <button class="uk-button-secondary">Показать</button>
            </form>
        </div>
        <hr>

        <div class="centered-login-form" style="width: 400px;">
        <p class="uk-text-normal">Можно залогиниться и постить</p>
        <form action="/api/auth" method="post">
            <input class="uk-input" name="username" type="text" placeholder="Имя пользователя">
            <input class="uk-input" name="password" type="password" placeholder="Пароль">
            <button class="uk-button-secondary">Войти</button>
        </form>
        </div>
        <hr>

        <div class="centered-login-form" style="width: 400px;">
        <p class="uk-text-normal">А можно зарегистрироваться</p>
        <form action="/api/register" method="post">
            <input class="uk-input	" name="username" type="text" placeholder="Имя пользователя">
            <input class="uk-input	" name="password" type="password" placeholder="Пароль">
            <input class="uk-input	" name="password_repeat" type="password" placeholder="Пароль еще раз">
            <button class="uk-button-secondary">Зарегистрироваться</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>
