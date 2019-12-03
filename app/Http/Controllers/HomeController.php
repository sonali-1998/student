<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class HomeController extends Controller
    {

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            return view('home');
        }

        public function add_class()
        {
            return view('class-form');
        }
        public function list_class()
        {
            return view('class-list');
        }
        public function add_attendance()
        {
            return view('attendance-form');
        }
        public function list_attendance()
        {
            return view('attendance-list');
        }
        public function test()
        {
            return view('test');
        }

    }
    