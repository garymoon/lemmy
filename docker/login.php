<?php
//FIXME: This could be much less janky, also maybe a nicer theme?
if (empty($_GET['username']) || empty($_COOKIE['adminer_permanent']) || !$_SESSION["pwds"]) {
    $_POST['auth'] = [
        'driver'    => 'pgsql',
        'server'    => 'postgres',
        'username'  => getenv('POSTGRES_USER'),
        'password'  => getenv('POSTGRES_PASSWORD'),
        'db'        => getenv('POSTGRES_DATABASE'),
        'permanent' => 1,
    ];
}
