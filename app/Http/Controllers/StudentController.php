<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    //method untuk memanggil 
    public function index(){
        $student = Student::all();
        return view('admin.contents.student.index',[
            'students' => $student
        ]);
    }

    // metod untuk manmpilkan data student
    public function create(){
        return view('admin.contents.student.create',
        );
    }

    // method untuk mengirim data student 
    public function store (Request $request) {
        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        // simpan ke database
        student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembali ke halaman student
        return redirect('/admin/student')->with('pesan','Berhasil Menambahkan Student');
    }

    // metod untuk manmpilkan halaman edit
    public function edit($id){
        // cari data student berdasarkan id
        $student = Student::find($id);

        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }
    // method untuk menyimpan hasil update
    public function update($id, Request $request) {
        // cari data student berdasarkan id
        $student = Student::find($id);

        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembali ke halaman student
        return redirect('/admin/student')->with('pesan','Berhasil Mengedit Student');
    }

    // method untuk mengapus student
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id);

        // hapus student
        $student->delete();

        // kembali ke halaman student
        return redirect('/admin/student')->with('pesan','Berhasil Mengedit Student');
    }
}
