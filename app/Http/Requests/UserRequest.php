<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{

    protected $attrs = [

        'nama' => 'Nama',
        'phone'=> 'No Handphone',
        'email' => 'Email',
        'address' => 'Alamat',
        'level' => 'Level user',
        'password' => 'password',

    ];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|max:35|min:3',
            'phone' => 'required|numeric',
            'email' => 'email',
            'address' => 'required|min:20|max:120',
            'level' => 'required|min:5|max:15',
            'password' => 'required|min:5|max:25'


        ];
    }
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();

        return [
            'success'    => false,
            'validation' => [
                'nama' => $message->first('nama'),
                'phone'=> $message->first('phone'),
                'email' => $message->first('email'),
                'address' => $message->first('address'),
                'level' => $message->first('level'),
                'password' => $message->first('password'),
            ]
        ];
    }

}
