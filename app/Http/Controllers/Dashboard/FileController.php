<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Dashboard\Traits\File as TraitsFile;
use Illuminate\Support\Facades\File as FacadesFile;

class FileController extends Controller
{
    use TraitsFile;

    public function getFile()
    {
        $files = $this->type()->files();

        return datatables($files)
                ->editColumn('file', function($query) {
                    return '<a href='.url('files/download/'.$query->file).'>'.$query->file.'</a>';
                })
                ->addColumn('action', function($query) {
                    return '<button onclick="remove('.$query->id.')" type="button" class="btn btn-md btn-outline-danger"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->rawColumns(['action', 'file'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'file'      => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'file.required' => 'File kosong',
        ]);

        if ($file = $request->file('file')) {
            $filename = date('His').uniqid().'.'.$file->getClientOriginalExtension();
            $path = 'upload/files/';

            $file->move($path, $filename);

            $data['file'] = $path.$filename;
        }

        $data = [
            'name'  => $request->name,
            'file'  => $filename,
        ];

        if ($this->type()->files()->create($data)) {
            return true;
        }
    }

    public function destroy(File $file)
    {
        $path = 'upload/files/'.$file->file;
        $public_path = public_path($path);
        $deletedFile = unlink($public_path);

        if ($deletedFile) {
            $file->delete();

            return 'File deleted';
        }
    }

    public function download($file)
    {
        $path = 'upload/files/'.$file;
        $download = Response::download($path);

        return $download;
    }
}
