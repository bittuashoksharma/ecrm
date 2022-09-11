<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_documents_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_name',
        'upload_file_name'
    ];
}
