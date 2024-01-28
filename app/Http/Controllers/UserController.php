<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();
        if($request->has('s')){
            $s = $request->s;
            $query->where('name', 'like', "%{$s}%")->orWhere('email', 'like', "%{$s}%");
        }
        $items = $query->paginate(config('constants.items_per_page'));
        return view('user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'id');
        return view('user.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        try{
            $user = new User();
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $user->fill($data);
            $user->save();
            Session::flash('success', __('messages.create_success'));
            return redirect()->route('user.index');
        }catch(Exception $e){
            Log::error('UserController|update' . $e->getMessage() . $e->getTraceAsString());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get()->pluck('name', 'id');
        return view('user.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try{
            $data = $request->all();
            if($data['password']){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $user->password;
            }
            $user->fill($data);
            $user->save();
            return back()->with('success', __('messages.update_success'));
        }catch(Exception $e){
            Log::error('UserController|update' . $e->getMessage() . $e->getTraceAsString());
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
        $userLogin = Auth::user();
        if($userLogin->id == $id){
            return back()->with('error', __('user.error_destroy'));
        }
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', __('messages.delete_success'));
    }

    public function profile(){
        $user = Auth::user();
        $roles = Role::get()->pluck('name', 'id');
        return view('user.profile', compact('user', 'roles'));
    }
}
