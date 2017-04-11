<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Purchase extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'customerName'
    ];

    protected $rules = array(
        'customerName' => 'required|min:3|max:250',
        'quantity' => 'required|min:1|max:250'
    );

    public function validate($data)
    {
        $validation = Validator::make($data, $this->rules);
        if ($validation->fails()) {
            $this->errors = $validation->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

}
