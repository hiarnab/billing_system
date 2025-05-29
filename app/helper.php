
<?php
use Illuminate\Support\Facades\Auth;

function isAdminOrExecutive()
{
    return Auth::check() && in_array(Auth::user()->role_id, [1,4]);
}