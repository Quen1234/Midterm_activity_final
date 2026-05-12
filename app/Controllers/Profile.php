<?php
namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);
        $data['title'] = 'My Profile';

        return view('profile/index', $data);
    }

    public function update()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $updateData = [
            'username' => $username
        ];

        if (!empty($password)) {
            $updateData['password'] = $password;
        }

        if ($userModel->update($userId, $updateData)) {
            session()->set('username', $username);
            return redirect()->to('/profile')->with('status', 'Profile updated successfully!');
        }

        return redirect()->to('/profile')->with('error', 'Failed to update profile.');
    }
}
