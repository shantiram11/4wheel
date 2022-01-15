<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);
        if ($request->ajax()) {
            $columns = array(
                0 => 'name',
                1 => 'email',
                2 => 'role',
                3 => 'created_at',
                4 => 'action',
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('users as u')
                ->join('roles as r', 'r.id', 'u.role_id')
                ->select(
                    'u.id',
                    'u.name',
                    'u.email',
                    'u.created_at',
                    'r.label as role'
                );
            $query->where('u.name', 'like', $search . '%')
                ->orWhere('u.email', 'like', $search . '%')
                ->orWhere('r.label', 'like', $search . '%')
                ->orWhere('u.created_at', 'like', $search . '%');
            $totalData = $query->count();
            $query->orderBy($order, $dir);
            if ($limit != '-1') {
                $query->offset($start)->limit($limit);
            }
            $records = $query->get();
            $totalFiltered = $totalData;
            $data = array();
            if (isset($records)) {
                foreach ($records as $k => $v) {
                    $nestedData['id'] = $v->id;
                    $nestedData['name'] = $v->name;
                    $nestedData['email'] = $v->email;
                    $nestedData['role'] = $v->role;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.users._action')->with('r',$v)->render();
                    $data[] = $nestedData;
                }
            }
            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            ], 200);
        }
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::pluck('label', 'id');
        return view('dashboard.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name'        => $request->input('name'),
            'email'             => $request->input('email'),
            'role_id'           => $request->input('role_id'),
            'email_verified_at' => now(),
            'password'          => $request->input('password')
        ]);
        return redirect()->route('user.show', compact('user'))->with('alert.success', 'User Successfully Created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('label', 'id');

        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)->update([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'role_id'           => $request->input('role_id'),
            'updated_at'        => now(),
        ]);
        return redirect()->route('user.show', compact('user'))->with('alert.success', 'User Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return response()->json([
            'message' => 'User Successfully Deleted',
        ], 200);
    }
}
