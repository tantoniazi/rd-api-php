<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuoteModel extends Model
{

    public $table = 'quote';

    public $fillable = ['from','to','price'];

    public $timestamps = true;
}
