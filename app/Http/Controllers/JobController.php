<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        // lazyquery -> menggunakan ::with('relasitabel')
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            "jobs" => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        // authorization method 2
        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return ($job->employer->user->is($user));
        // }); // pindah ke App/Providers/AppServiceProvider.php

        // authorization method 1
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        // authorization method 1
        // if($job->employer->user->isNot(Auth::user())){
        //     abort(403);
        // }

        // lanjutan method 2
        Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // authorize
        // update the job and persist
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        // where to redirect
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // authorize

        // delete the job
        $job->delete();

        // redirect
        return redirect('/jobs');
    }
}
