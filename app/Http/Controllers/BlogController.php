<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('index', compact('blogs'));
    }

    public function create()
    {
        //if (!session('admin_logged_in')) {
       //return redirect('/login');
   //}
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Blog::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'category' => $request->category,
            'image' => $imageName,
        ]);

        return redirect('/');
    }
    public function edit($id)
{
   // if (!session('admin_logged_in')) {
   // return redirect('/login');
   //}
    $blog = Blog::findOrFail($id);

    return view('admin.edit', compact('blog'));
}

public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $imageName = $blog->image;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
    }

    $blog->update([
        'title' => $request->title,
        'short_description' => $request->short_description,
        'content' => $request->content,
        'category' => $request->category,
        'image' => $imageName,
    ]);

    return redirect('/');
}

public function delete($id)
{
    //if (!session('admin_logged_in')) {
   // return redirect('/login');
  // }
    $blog = Blog::findOrFail($id);

    $blog->delete();

    return redirect('/');
}

public function filter(Request $request)
{
    $category = $request->category;
    $search = $request->search;

    $blogs = Blog::query();

    if ($category) {
        $blogs->where('category', $category);
    }

    if ($search) {
        $blogs->where('title', 'LIKE', "%{$search}%");
    }

    $blogs = $blogs->latest()->get();

    return view('filter', compact('blogs'));
}

public function login()
{
    return view('admin.login');
}

public function loginUser(Request $request)
{
    $email = $request->email;
    $password = $request->password;

   if (
    $email == env('ADMIN_EMAIL') &&
    $password == env('ADMIN_PASSWORD')
   ) {

        session([
            'admin_logged_in' => true
        ]);

        return redirect('/admin/create');
    }

    return back()->with('error', 'Invalid Credentials');
}

public function logout()
{
    session()->forget('admin_logged_in');

    return redirect('/login');
}
    
}