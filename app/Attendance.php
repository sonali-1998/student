<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Attendance extends Model
    {

        protected $table ='attendances';
        
        protected $fillable = [
            'class_id', 'section_id','student_id', 'attendance_date', 'status',
        ];

        public function sections()
        {
            return $this->belongsTo('App\Section', 'section_id');
        }

        public function classes()
        {
            return $this->belongsTo('App\Classes', 'class_id');
        }

        public function students()
        {
            return $this->belongsTo('App\Student', 'student_id');
        }

    }
    