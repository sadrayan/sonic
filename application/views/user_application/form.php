<?php
/**
 * Created by PhpStorm.
 * User: sadra
 * Date: 3/29/14
 * Time: 9:53 AM
 */

?>
<table class="table table-striped" style="width: 700px">
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <tr>
            <td><?php echo $application[0]->title;?></td>
            <td><?php echo $application[0]->description;?></td>
        </tr>
</table>