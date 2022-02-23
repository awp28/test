<?php

namespace App\Models;

use App\scopes\AncientScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidCase extends Model
{
    use HasFactory;

    protected $fillable = ['name','report_date', 'cases', 'votes', 'status'];

//    protected $dates = ['report_date'];



        //Utilizing A Local Scope
    public function scopePopular($query)
    {
        return $query->where('votes', '>', 30);
    }

    public function scopeActive($query)
    {
        $query->where('status', true);
    }


        //Dynamic Scopes
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }


        //Applying Global Scopes
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
            // boshqa file ochish usuli bn qilingan
        static::addGlobalScope(new AncientScope);


            //Anonymous Global Scopes
//        static::addGlobalScope('ancient', function (Builder $builder) {
//            $builder->where('created_at', '<', now()->subYears(2000));
//        });
    }

        //Defining An Accessor
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }

    protected function reportDate(): Attribute
    {
        return new Attribute(
            get: fn ($value) => (new Carbon($value))->format('d/m/y')
        );
    }

}
