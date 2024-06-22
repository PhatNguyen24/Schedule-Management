<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use App\User;
use App\Project;
use App\Task;
use App\ProjectsXUsers;

class DashboardController extends Controller
{
    public function __construct()
    {


        $this->middleware('loggedin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currUser = Auth::user(); //lấy thông tin người dùng đăng nhập
        // Log::info('Current User:', [$currUser]); 
        if ($currUser->user_role == 2) {
            // Nếu là admin, lấy tất cả các project
            $projectJoinedIds = getJoinedProject();
        } else {
        $projectJoinedIds = getJoinedProjectIds($currUser->user_id); // lấy danh sách id dự án của 1 người dùng
        }
        Log::info('Project Joined ID:', [$projectJoinedIds]); 
        $joinedProjects = Project::find($projectJoinedIds) or null; // lấy danh sách các dự án của 1 người dùng (từ danh sách id)
        Log::info('Joined Project:', [$joinedProjects]); 
        $managerIds = []; //Danh sách ID của các người quản lý dự án.
        $employeeNums = []; //Số lượng nhân viên trong mỗi dự án.
        if (!empty($joinedProjects)) {
            foreach ($joinedProjects as $key => $project) {
                $managerIds[] = $project->project_manager_id; 
                $employeeNums[$project->project_id] = ProjectsXUsers::where('project_id','=',$project->project_id)->count();
                // Log::info('ManagerIds:', [$managerIds]); 
                // Log::info('EmployeeNums:', [$employeeNums]); 
            }
        }
        $managers = User::find($managerIds) or null; //Thong tin người quản lý dự án.
        return view('dashboard',[
            'joinedProjects' => $joinedProjects,
            // 'createdProjects' => $createdProjects,
            'managers' => $managers,
            'employeeNums' => $employeeNums,
            'tasks' => $projectJoinedIds,
            'currUser' => $currUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //===============================================
    public function searchProject(Request $request)
    {
        // $field = $request['project-search-field'];
        $searchKey = trim(mb_strtolower(($request['inp-project-search'])));
        if ($searchKey == '' || $searchKey == null) {
            return redirect(route('dashboard'));
        } else {
            $currUser = Auth::user();

            $projectJoinedIds = getJoinedProjectIds($currUser->user_id);
            // $joinedProjects = Project::whereIn('project_id', $projectJoinedIds)->whereRaw('LOWER(project_name) LIKE ?', "%{$searchKey}%")->get();
            $joinedProjects = Project::whereIn('project_id', $projectJoinedIds)->whereRaw('Lower(project_name) LIKE ?',"%${searchKey}%")->get();
            $managerIds = [];
            $employeeNums = [];
            if (!empty($joinedProjects)) {
                foreach ($joinedProjects as $key => $project) {
                    $managerIds[] = $project->project_manager_id;
                    $employeeNums[$project->project_id] = ProjectsXUsers::where('project_id','=',$project->project_id)->count();
                }
            }
            $managers = User::find($managerIds) or null;
            return view('dashboard',[
                'joinedProjects' => $joinedProjects,
                'managers' => $managers,
                'employeeNums' => $employeeNums,
                'tasks' => $projectJoinedIds,
                'currUser' => $currUser,

            ]);
        }
    }

    public function showUserProjects()
    {

    }
}
