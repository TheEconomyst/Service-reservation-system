<?php

namespace App\Util;

use Illuminate\Http\Request;

class Crud
{
    public static function showModel($model, $modelName = null)
    {
        if ($model === null) {
            return response(['status' => 'not_found'], Response::HTTP_NOT_FOUND);
        } else {
            $responseObj = ['status' => 'ok'];

            if ($modelName !== null) {
                $responseObj[$modelName] = $model;
            } else {
                $responseObj['data'] = $model;
            }

            return response($responseObj, Repsonse::HTTP_OK);
        }
    }

    public static function destroyModel($model)
    {
        if ($model === null) {
            return response(['status' => 'error'], Response::HTTP_NOT_FOUND);
        } else {
            $model->delete();
            return response(['status' => 'ok'], Response::HTTP_OK);
        }
    }

    public static function saveModel($model, $modelName = null)
    {
        if ($model->save()) {
            $responseObj = ['status' => 'ok'];

            if ($modelName !== null) {
                $responseObj[$modelName] = $model;
            } else {
                $responseObj['data'] = $model;
            }

            return response($responseObj, Response::HTTP_CREATED);
        } else {
            return invalidCreationDataResponse();
        }
    }

    public static function invalidCreationDataResponse() {
        return response(['status' => 'error'], Response::HTTP_CONFLICT);
    }

    public static function respondInvalidFormData($cause) {
        return response(
            [
                'status' => 'error',
                'cause' => $cause
            ], Response::HTTP_CONFLICT
        );
    }
}

?>
