<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function getAllProjects() {
        $projects = Project::orderBy('execution_date', 'asc')->get();
        return $projects;
    }

    public function insertProject() {
        $project = new Project;
        $project->name = 'Name of the project';
        $project->save();
        
        return "Saved";
    }

    public function updateProject() {
        Project::where('is_active', 0)
                    ->update(['name' => 'Cancelled projects', 'execution_date' => NULL]);
        
                    return "Updated";
    }

    public function deleteProject() {
        Project::where('project_id', '>', 2)->delete();
        
        return "Deleted";
    }
}
