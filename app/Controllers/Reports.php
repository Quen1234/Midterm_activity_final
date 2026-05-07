<?php namespace App\Controllers;

class Reports extends BaseController {
    public function index() {
        return view('errors/html/error_404', ['message' => 'Reports & Analytics module coming soon!']);
    }
}
