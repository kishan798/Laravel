<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Events\ProjectCreated;


class ProjectsController extends Controller
{
	public function __construct()
	{

		$this->middleware('auth');


	}
    

	public function index()
	{
	
		//$projects = auth()->user()->projects;
		//$projects = Project::where('owner_id', auth()->id())->take(2)->get();
		
		//$stats = cache()->get('stats');

		//dump($stats);
		return view('projects.index', [

			'projects' =>auth()->user()->projects





		]);



	}
	public function show(Project $project)
	{
		//abort_unless(\Gate::allows('update', $project), 403);
		//$this->authorize('update', $project);
		//abort_unless(auth()->user()->owns($project), 403);
		abort_if ($project->owner_id !== auth()->id(), 403);
		return view('projects.show', compact('project'));

	}




	public function create()
	{





		return view('projects.create');
	}


	public function store()
	{
		$attributes = $this->validateProject();

		$attributes['owner_id'] = auth()->id();

		$project = Project::create($attributes);
		//event(new ProjectCreated($project));
		
		


		return redirect('/projects');
	}

	public function edit(Project $project)
	{
		
		//$project = Project::findorFail($id);
		return view('projects.edit', compact('project'));


	}

	public function update(Project $project)
	{
		//$this->authorize('update', $project);
		//$project = Project::findorFail($id);
		
		$project->update($this->validateProject());

		return redirect('/projects');


	}


	public function destroy(Project $project)
	{
		//$this->authorize('update', $project);


		$project->delete();
		return redirect('/projects');

	}

	public function validateProject()
	{

			return request()->validate([

			'title' => ['required', 'min:3'],
			'description' =>['required', 'min:3']
]);




	}





}
