<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $columns = array(
                0 => 'name',
                1 => 'description',
                2 => 'created_at',
                3 => 'action'
            );

            //for data table
            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            //main query
            $query = \DB::table('categories as c')
                ->select(
                    'c.id',
                    'c.name',
                    'c.description',
                    'c.created_at'
                );

            $query->where(function ($q) use ($search) {
                $q->where('c.name', 'like', $search . '%')
                    ->orWhere('c.description', 'like', $search . '%')
                    ->orWhere('c.created_at', 'like', $search . '%');
            });

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
                    $nestedData['description'] = $v->description;
                    $nestedData['created_at'] = $v->created_at;
                    //                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    //                    $nestedData['action'] = \View::make('dashboard.categories._actions')->with('row', $v)->render();
                    $nestedData['action'] = \View::make('dashboard.categories._action')->with('r', $v)->render();
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
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $category = new Category();
        return view('dashboard.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {

        $name = $request->input('name');
        Category::create([
            'name'      => $name,
            'slug'              => Str::slug($name, '-'),
            'description'       => $request->input('description'),
        ]);
        return redirect()->route('categories.index')->with('toast.success', 'Successfully Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return  view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {

        $name = $request->input('name');
        Category::where('id', $id)->update([
            'name'      => $name,
            'description'       => $request->input('description'),
        ]);
        return redirect()->route('categories.index')->with('toast.success', 'Successfully updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'Successfully Deleted'
        ]);
    }
}
