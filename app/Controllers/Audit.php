<?php
namespace App\Controllers;

use App\Models\ActivityLogModel;

class Audit extends BaseController
{
    public function index()
    {
        // Auto-create table if not exists
        $db = \Config\Database::connect();
        if (!$db->tableExists('activity_logs')) {
            $forge = \Config\Database::forge();
            $forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'null'       => true,
                ],
                'username' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'action' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'details' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'ip_address' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '45',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $forge->addKey('id', true);
            $forge->createTable('activity_logs');
        }

        $logModel = new ActivityLogModel();
        
        // System Monitoring Data
        $data['system'] = [
            'memory_usage' => $this->get_server_memory_usage(),
            'cpu_load'     => $this->get_server_cpu_usage(),
            'php_version'  => PHP_VERSION,
            'db_driver'    => $db->getPlatform(),
            'uptime'       => $this->get_server_uptime()
        ];

        $data['logs'] = $logModel->orderBy('created_at', 'DESC')->findAll(100); // Last 100 logs
        $data['title'] = 'Activity Logs (Audit Trail)';

        return view('audit/index', $data);
    }

    private function get_server_memory_usage() 
    {
        $free = shell_exec('free');
        if (!$free) {
            // Windows Fallback
            $output = shell_exec('wmic OS get FreePhysicalMemory,TotalVisibleMemorySize /Value');
            if ($output) {
                preg_match('/FreePhysicalMemory=(\d+)/', $output, $free);
                preg_match('/TotalVisibleMemorySize=(\d+)/', $output, $total);
                return round((($total[1] - $free[1]) / $total[1]) * 100, 1) . '%';
            }
            return 'N/A';
        }
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2] / $mem[1] * 100;
        return round($memory_usage, 1) . '%';
    }

    private function get_server_cpu_usage() 
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $output = shell_exec('wmic cpu get loadpercentage');
            if ($output) {
                return trim(str_replace('LoadPercentage', '', $output)) . '%';
            }
            return 'N/A';
        }
        $load = sys_getloadavg();
        return $load[0] . '%';
    }

    private function get_server_uptime()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $output = shell_exec('net stats srv');
            if ($output && preg_match('/Statistics since (.*)/', $output, $matches)) {
                return $matches[1];
            }
            return 'Active';
        }
        return shell_exec('uptime -p');
    }
}
