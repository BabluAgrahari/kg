<?php

namespace App\Observers;

class AttachTimeStamp
{
    public function saving($model)

    {
        if (empty($model->_id))
        $model->created_at = time();

         $model->updated_at = time();
    }

    public function updating($model)
    {
        $model->updated_at = time();
    }

    public function deleting($model){

        $model->deleted_at = time();
    }
}
