<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'image', 'text', 'link', 'is_published'];

    public function getAbstract($max = 50) {
        return substr($this->text, 0, $max). "...";
    }

    public function getTitle($max = 50) {
        return substr($this->title, 0, $max). "...";
    }

    public static function generateSlug($title) {

        $possible_slug = Str::of($title)->slug('-');
        
         //controllare che lo slug sia unico e, se non lo è, rigenerarlo finché non lo si trova
        $projects = Project::where('slug', $possible_slug)->get();
        
        $original_slug = $possible_slug;
        $i = 2;

        while(count($projects)) {
            $possible_slug = $original_slug . "-" . $i;
            $projects = Project::where('slug', $possible_slug)->get();
            $i++;
        }
        
        return $possible_slug;
    }

    protected function getUpdatedAtAttribute($value) {
        return date('d/m/Y H:i', strtotime($value));
    }

    protected function getCreatedAtAttribute($value) {
        return date('d/m/Y H:i', strtotime($value));
    }

    // protected function getCreatedAtAttribute($value) {
    //     return date('d/m/Y H:i:s', strtotime($value));
    // }
    
    public function getImageUri() {
        return $this->image ? asset('storage/' . $this->image) : 'https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg';
    }
} 
    