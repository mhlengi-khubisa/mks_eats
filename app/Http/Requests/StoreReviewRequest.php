<?php
namespace App\Http\Requests; use Illuminate\Foundation\Http\FormRequest;
class StoreReviewRequest extends FormRequest { public function authorize():bool{return (bool)$this->user();} public function rules():array{return ['rating'=>['required','integer','between:1,5'],'title'=>['nullable','string','max:140'],'body'=>['nullable','string','max:2000']];} }
