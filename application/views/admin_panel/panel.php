<fieldset>
<?php
if ($application){
    ?>
        <table class="table table-striped" style="width: 700px">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Application</th>
            </tr>
        <?
        $number= 1;
        foreach ($application as $app){
            echo '<tr id="app_' . $app->id . '">';

            echo '<td>' . $number .  '</td>';

            echo '<td>' ;
            echo '<span class="glyphicon glyphicon-user"> ' .  $app->username . '</span>';
            echo "</td>";

            echo '<td>' ;
            echo '<span class="glyphicon glyphicon-folder-open"> ' .  anchor("/admin/app_view/$app->id" , $app->title) . '</span>';
            echo "</td>";

            echo "</tr>";

        }
        echo "</table>";
    }
?>
</fieldset>