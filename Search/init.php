<?php
    session_start();
    $hostname = 'localhost:8889';
    $username = 'root';
    $password = 'root';
    $databaseName = 'WAT';
    $connection = mysqli_connect($hostname, $username, $password, $databaseName) or die("Unable to connect to database!");

    function secureString($string){
        return trim(strip_tags(
                htmlspecialchars(
                    addslashes(
                        htmlentities(
                            $string
                        )
                    )
                )
            ));
    }
?>