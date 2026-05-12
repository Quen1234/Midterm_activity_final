<?php
namespace App\Models;
use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'username', 'action', 'details', 'ip_address', 'created_at'];
    protected $useTimestamps = true;
    protected $updatedField  = ''; // We only need created_at

    public function log($action, $details = '')
    {
        $this->save([
            'user_id'    => session()->get('id'),
            'username'   => session()->get('username') ?? 'Guest',
            'action'     => $action,
            'details'    => $details,
            'ip_address' => service('request')->getIPAddress()
        ]);
    }
}
