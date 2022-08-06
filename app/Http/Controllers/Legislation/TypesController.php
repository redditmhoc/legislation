<?php

namespace App\Http\Controllers\Legislation;

use App\Http\Controllers\Controller;
use App\Models\Legislation\Type;

class TypesController extends Controller
{
    public function view(Type $type)
    {
        $type->load('primaryLegislation');
        return view(
            'types.view', [
                'type' => $type
            ]
        );
    }
}
