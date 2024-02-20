<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AgentController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Profile/Partials/AgentsTable');
    }
}
