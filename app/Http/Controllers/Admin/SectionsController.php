<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Post;
use DataTables;

class SectionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    /**
     * List of all section
     * Section will be manage by post type and meta value. 
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.$row->slug.'" class="edit btn btn-success btn-sm">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.sections.list');
    }

    public function home(Request $request)
    {
        $activeId = 1;
        $type = "home";
        $post = Post::with(['metas'])->whereId($activeId)->first()->toArray();
        $meta = $post['meta_data'] ?: null;
        return view('admin.home',compact('meta','activeId','type'));
    }

    public function aboutUs(Request $request)
    {
        $activeId = 2;
        $type = "about-us";
        $post = Post::with(['metas'])->whereId($activeId)->first()->toArray();
        $meta = $post['meta_data'] ?: null;
        
        return view('admin.aboutus',compact('meta','activeId','type'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $id = $request->post_id;
        $metaType = $request->type;
        $metaValues = $request->meta; // array value

        if(!$metaValues)
        {

        }
        $post = Post::find($id);
        $post->setAttributes($metaValues);
        $post->save();
        return redirect()->back();

    }
}
