<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GithubController extends Controller
{
    private GithubService $githubService;

    public function __construct(GithubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index(Request $request): Response
    {
        $username = 'supsign';  // Dein GitHub-Benutzername
        $reviewedPRs = $this->githubService->getReviewedPullRequests($username);
        dd($reviewedPRs);

        return Inertia::render('Profile/Edit', [
            'github' => $request->user()->github,
            'status' => session('status'),
        ]);
    }
}
