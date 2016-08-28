<?php

namespace App\Http\Handlers;

use Carbon\Carbon;
use DB;

class RepoHandler
{

    public function store($repos)
    {

        foreach ($repos as $repo) 
        {

            $new_repo = \App\Repo::create([
                'id'                => $repo->id,
                'name'              => $repo->name,
                'url'               => $repo->html_url,
                'created_date'      => $repo->created_at,
                'last_push_date'    => $repo->pushed_at,
                'description'       => $repo->description,
                'star_count'        => $repo->stargazers_count,
                'forks_count'        => $repo->forks_count,
                'open_issues_count' => $repo->open_issues_count,
                'homepage'          => $repo->homepage,
                'owner_username'    => $repo->owner->login,
                'owner_url'         => $repo->owner->html_url,
                'owner_avatar_url'  => $repo->owner->avatar_url,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);

        }     
    }

    public function clearTable()
    {
        DB::table('repos')->delete();
    }
}
