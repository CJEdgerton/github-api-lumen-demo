<?php

namespace App\Http\Controllers;

use App\Http\Handlers\ApiHandler;
use App\Http\Handlers\RepoHandler;

class MainController extends Controller
{
    public function index(ApiHandler $api, RepoHandler $repo_handler)
    {
        $repos = $api->getMostStarredPhpRepos();

        $repo_handler->clearTable();
        $repo_handler->store($repos);

        return view('index');
    }

    public function reposList()
    {
        return json_encode( \App\Repo::all() );
    }
}
