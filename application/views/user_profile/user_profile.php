Hi, <strong><?php echo $username;?>,</strong>

<?php
echo '<br>';
echo '<span class="glyphicon glyphicon-plus">' .  anchor('/form/add/', 'Add Application') . '</span>';
echo '<br><br>';
echo "Your application: ";

if ($application){
    ?>
    <table class="table table-striped" >
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
    <?
    $number= 1;
    foreach ($application as $app){

        echo "<tr id=\"app_" . $app->id . "\">";

            echo '<td>' . $number .  '</td>';

            echo '<td>' ;
                echo '<span class="glyphicon glyphicon-folder-open"> ' .  anchor('/form/app/' . $app->id, $app->title) . '</span>';
            echo "</td>";

            echo '<td>' ;
                echo '<span class="glyphicon glyphicon-edit"> ' . anchor('/form/update/' . $app->id, "edit") .'</span>' ;
                echo "    ";
                echo '<span class="glyphicon glyphicon-trash"> ' .
                    anchor('/form/delete/' . $app->id, "delete", array('id' => "delete_$app->id", 'class'=> 'delete'))  .'</span>' ;
            echo '</td>' ;

        echo "</tr>";

        $number++;
    }
    echo "</table>";
}else{
    echo 'You have no application';
}

    echo '<span class="glyphicon glyphicon-off"> '. anchor('/auth/logout/', 'Logout') . '</span>';

?>


