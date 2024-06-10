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
        $reviewPRs = $this->githubService->getReviewPRs();
        $createdPRs = $this->githubService->getCreatedPRs();

        return Inertia::render('Github/Index', [
            'createdPRs' => $createdPRs,
            'reviewPRs' => $reviewPRs
        ]);
    }
}
