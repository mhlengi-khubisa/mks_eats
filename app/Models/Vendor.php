<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Vendor extends Model { use HasFactory; protected $fillable=['user_id','store_name','slug','description','location','province','phone','logo_path','is_approved','approved_at']; protected function casts():array{return ['is_approved'=>'boolean','approved_at'=>'datetime'];} public function user(){return $this->belongsTo(User::class);} public function products(){return $this->hasMany(Product::class);} public function orders(){return $this->hasMany(Order::class);} }
