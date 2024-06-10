<?php

namespace App\Services;

use GrahamCampbell\GitHub\GitHubManager;

class GithubService
{
    private GitHubManager $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
    }

    public function getReviewPRs()
    {
        $searchQuery = 'is:open is:pr -author:Niiidro archived:false user:supsign';
        $results = $this->github->search()->issues($searchQuery);
        return $results['items'];
    }
    public function getCreatedPRs()
    {
        $searchQuery = 'is:open is:pr author:Niiidro archived:false user:supsign';
        $results = $this->github->search()->issues($searchQuery);
        return $results['items'];
    }

    public function getReviewedPullRequests($username)
    {
        $pullRequests = $this->getPullRequests($username);
        $reviewedPRs = [];

        foreach ($pullRequests as $pr) {
            $repositoryUrlParts = explode('/', $pr['repository_url']);
            $owner = $repositoryUrlParts[4];
            $repository = $repositoryUrlParts[5];
            $reviews = $this->github->pullRequest()->reviews()->all($owner, $repository, $pr['number']);

            foreach ($reviews as $review) {
                if ($review['state'] === 'APPROVED') {
                    $reviewedPRs[] = $pr;
                    break;
                }
            }
        }

        return $reviewedPRs;
    }
}
