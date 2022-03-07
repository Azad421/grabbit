<?php
    function showStatus($status){
           switch ($status->nickname){
               case 'active':
                   echo '<span class="badge badge-primary px-2">'. $status->name .'</span>';
                   break;
               case 'inactive':
                   echo '<span class="badge badge-danger px-2">'. $status->name .'</span>';
                   break;
               case 'pending':
                   echo '<span class="badge badge-warning px-2">'. $status->name .'</span>';
                   break;
               case 'approved':
                   echo '<span class="badge badge-success px-2">'. $status->name .'</span>';
                   break;
               case 'rejected':
                   echo '<span class="badge badge-danger px-2">'. $status->name .'</span>';
                   break;
               default:
                   echo '<span class="badge badge-primary px-2">No status found</span>';
           }
    }

