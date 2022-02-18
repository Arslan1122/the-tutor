<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'institute_name' => ['string', ],
            'degree_name' => ['string'],
            'profile_img' => ['image','mimes:jpeg,png,jpg,gif,svg,max:2048'],
            'intro_clip' => ['mimes:mp4,mov,ogg,qt', 'max:100000'],
        ];
    }
    public function messages()
    {
        return[
            'institute_name.required' => 'Institute name field is required.',
            'degree_name.required' => 'Degree name or class name is required.',
            'about_me.required' => 'Write something about your self.',
            //'profile_img.required' => 'Profile Image is required.',
            //'intro_clip.required' => 'Introduction Clip is required.',
            'profile_img.size' => 'The Profile Image must be less than 2Mbs.',
            'intro_clip.size' => 'The Introduction Video must be less than 20Mbs.',
            'profile_img.mimes' => 'The Profile Image must be Type of jpeg,png,jpg,gif,svg.',
            'intro_clip.mimes' => 'The Introduction Video must be Type of mp4,mov,ogg,qt',
        ];
    }
}
