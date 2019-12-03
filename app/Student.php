<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Student extends Model
    {

        protected $fillable = [
            'roll_number', 'student_name', 'class_id', 'section_id', 'father_name', 'mother_name', 'gender', 'dob', 'address'
        ];

        public function sections()
        {
            return $this->belongsTo('App\Section', 'section_id');
        }

        public function classes()
        {
            return $this->belongsTo('App\Classes', 'class_id');
        }

    }
    