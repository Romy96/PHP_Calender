@extends('layout')

@section('content')

        <?php
            // array used to translate monthnumbers to dutch monthnames
            $monthNames = array(
                'onbekend', 'januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus',
                'september', 'oktober', 'november', 'december'
            );

            setlocale(LC_ALL, 'nld_nld');
            $lastMonth = '';
            $lastDay = '';
            foreach($birthdays as $birthday){
                if ($birthday['month'] != $lastMonth) {
                    printf(PHP_EOL . '<h1>%s</h1>' . PHP_EOL, $monthNames[$birthday['month']] );
                }
                if ($birthday['day'] != $lastDay) {
                    echo '<h2>' . $birthday['day'] . '</h2>' . PHP_EOL;
                }
                $id =  $birthday['id'];
                // print birthday's (printf replaces %s)
                printf('<p><a href="edit.php?id=%s">%s (%s)</a> <a href="delete_action.php?id=%s">x</a></p>' . PHP_EOL, 
                    $id, $birthday['person'], $birthday['year'], $id);
                $lastMonth = $birthday['month'];
                $lastDay = $birthday['day'];
            }
        ?>

        <p><a href="create.php">+ Toevoegen</a></p>

@endsection

