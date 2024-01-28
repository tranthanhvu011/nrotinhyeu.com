<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Role::query();
        if($request->has('s')){
            $s = $request->s;
            $query->where('name', 'like', "%{$s}%");
        }
        $items = $query->paginate(config('constants.items_per_page'));
        return view('role.index', compact('items'));
    }

    public function permissionsList(){
        $prefixExcept = [
            '_ignition', 'adminlte'
        ];
        $routes = Route::getRoutes();
        $results = [];
        foreach($routes as $route){
            if((!$route->getPrefix() || !in_array($route->getPrefix(), $prefixExcept)) && $route->getName()){
                $routeName = $route->getName();
                $actionArray = explode('.', $routeName);
                $group = array_splice($actionArray, 0, 1)[0];
                $results[$group][] = $routeName;
            }
            
        }
        return $results;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionList = $this->permissionsList();
        return view('role.form', compact('permissionList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try{
            $data = $request->all();
            $role = new Role();
            $role->fill($data);
            $role->save();
            return redirect(route('role.index'))->with('success', __('messages.create_success'));
        }catch(Exception $e){
            Log::error('RoleController|store' . $e->getMessage() . $e->getTraceAsString());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissionList = $this->permissionsList();
        return view('role.form', compact('permissionList', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try{
            $data = $request->all();
            $role->fill($data);
            $role->save();
            return back()->with('success', __('messages.update_success'));
        }catch(Exception $e){
            Log::error('RoleController|update' . $e->getMessage() . $e->getTraceAsString());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('success', __('messages.delete_success'));
    }
}
