<?php

namespace App\Util;

use Illuminate\Http\Request;

class Crud
{
    public static function showModel($model)
    {
        if ($model === null) {
            return response('', Response::HTTP_NOT_FOUND);
        } else {
            return response($model, Repsonse::HTTP_OK);
        }
    }

    public static function destroyModel($model)
    {
        if ($model === null) {
            return response('', Response::HTTP_NOT_FOUND);
        } else {
            $model->delete();
            return response('', Response::HTTP_OK);
        }
    }

    public static function saveModel($model)
    {
        if ($model->save()) {
            return response($model, Response::HTTP_CREATED);
        } else {
            return response('', Response::HTTP_CONFLICT);
        }
    }
}

?>
