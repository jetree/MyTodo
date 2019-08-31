<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInformationRequest extends FormRequest
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
            'name' => 'required',
            'year' => 'nullable|digits:4',
            'month' => 'nullable|digits_between:1,12',
            'day' => 'nullable|digits_between:1,31',
            'gender' => 'nullable|digits:1',
            'comment' => 'nullable|string',
            'birthday' => 'nullable|date|before_or_equal:today'
        ];
    }


    //FormRequestクラスのvalidationData()をオーバーライド
    protected function validationData()
    {
      //formから送られてきた全データを取得
      $data = parent::validationData();
      //$dataにbirthday=nullを追加する
      $data['birthday'] = null;

      // dd($data);

      if (isset($data['year']) &&
          isset($data['month']) &&
          isset($data['day']))
        {
            $data['birthday'] = $data['year'] . '-' . $data['month'] . '-' . $data['day'];
        }

      return $data;
    }

    public function attributes()
    {
      return [
          'year' => '年',
          'month' => '月',
          'day' => '日',
          'birthday' => '誕生日',
      ];
    }

    public function messages()
    {
      return [
      'name.required' => 'nameは必須項目です',
      'birthday.before_or_equal' => '誕生日は過去の日付を入力してください',

      ];
    }
}
