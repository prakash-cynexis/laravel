<?php

namespace App\Http\Controllers;

use App\User;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller {

    public function index() {
        return view('backend.users');
    }

    public function lists() {
        $users = User::select(['id', 'name', 'email'])->get();
        return DataTables::of($users)->addColumn('action', function ($user) {
            return '<a href="#edit-' . $user->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })->toJson();
    }
}
