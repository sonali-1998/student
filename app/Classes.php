<?php

    namespace App; 

    use Illuminate\Database\Eloquent\Model;

    class Classes extends Model
    {

        protected $fillable = [
            'class_name', 'section_id',
        ];

        public function sections()
        {
            return $this->belongsTo('App\Section','section_id');
        }


    }
    