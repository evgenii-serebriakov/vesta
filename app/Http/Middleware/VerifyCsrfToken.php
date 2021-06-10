<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://vesta.loc/admin/post/create',
        'http://vesta.loc/admin/post/*',
        'http://vesta.loc/admin/post/edit/*'
    ];
}
