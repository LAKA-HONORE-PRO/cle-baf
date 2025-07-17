<?php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'admin/*', // Ajuste selon tes besoins
        'api/*', // Ajuste selon tes besoins
    ];
    /**
     * Determine if the request is using an API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        return $request->is('api/*') || $request->is('admin/*');
    }
}