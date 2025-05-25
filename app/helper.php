function isAdminOrExecutive()
{
    return Auth::check() && in_array(Auth::user()->role, ['admin', 'executive']);
}