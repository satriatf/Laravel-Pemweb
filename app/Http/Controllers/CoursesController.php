<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //method untuk memanggil 
    public function index(){
        $courses = Courses::all();
        return view('admin.contents.courses.index',[
            'courses' => $courses
        ]);
    }

    // metod untuk manmpilkan data courses
    public function create(){
        return view('admin.contents.courses.create',
        );
    }

        // method untuk mengirim data courses 
        public function store(Request $request) {
            // validasi request
            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'desc' => 'required',
            ]);
    
            // simpan ke database
            Courses::create([
                'name' => $request->name,
                'category' => $request->category,
                'desc' => $request->desc,
            ]);
    
            // kembali ke halaman courses
            return redirect('/admin/courses')->with('pesan','Berhasil Menambahkan Courses');
        }

        // method untuk manmpilkan halaman edit
    public function edit($id){
        // cari data courses berdasarkan id
        $courses = Courses::find($id);

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    // method untuk menyimpan hasil update
    public function update($id, Request $request) {
        // cari data courses berdasarkan id
        $student = Courses::find($id);

        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembali ke halaman courses
        return redirect('/admin/courses')->with('pesan','Berhasil Mengedit Courses');
    }

    // method untuk menghapus courses
    public function destroy($id){
        // cari data courses berdasarkan id
        $courses = Courses::find($id);

        // hapus courses
        $courses->delete();

        // kembali ke halaman courses
        return redirect('/admin/courses')->with('pesan','Berhasil Mengedit Courses');
    }
}
