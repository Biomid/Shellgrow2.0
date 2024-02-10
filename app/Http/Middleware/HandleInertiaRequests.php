<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
//        return [
//            ...parent::share($request),
//            'auth' => [
//                'user' => $request->user(),
//            ],
//        ];

//        return array_merge(parent::share($request), [
//            'auth' => [
//                'user' => $request->user() ? array_merge($request->user()->toArray(), ['roles' => $request->user()->roles->pluck('name')]) : null,
//            ],
//        ]);

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user() ? array_merge($request->user()->toArray(), [
                    'roles' => $request->user()->roles->pluck('name')->toArray(),
                    'permissions' => $request->user()->getPermissionsViaRoles()->pluck('name')->toArray(),
                ]) : null,
            ],
        ]);

    }
}


