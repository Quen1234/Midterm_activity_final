<?php
namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $model = new UserModel();
        $data =[
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role'     => $this->request->getVar('role'),
        ];
        $model->save($data);
        return redirect()->to('/users')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data =[
            'username' => $this->request->getVar('username'),
            'role'     => $this->request->getVar('role'),
        ];
        
        // Only update password if a new one is typed
        if($this->request->getVar('password')){
            $data['password'] = $this->request->getVar('password');
        }

        $model->update($id, $data);
        return redirect()->to('/users')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully');
    }
}