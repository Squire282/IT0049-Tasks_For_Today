<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    // Welcome - today's active tasks only
    public function index()
    {
        $taskModel = new TaskModel();

        $today = date('Y-m-d');

        $data['tasks'] = $taskModel
            ->where('task_date', $today)
            ->where('is_archived', 0)
            ->findAll();

        return view('welcome', $data);
    }


    // Task List - all active tasks
    public function tasks()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', $data);
    }


    // New Task form
    public function new()
    {
        $data['title'] = 'Add New Task';

        return view('tasks/new', $data);
    }


    // Create Task
    public function create()
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Task title is required.'
                ]
            ],

            'task_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Task date is required.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task added successfully.');
    }


    // Edit Task form
    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            return redirect()
                ->to('/tasks')
                ->with('error', 'Task not found.');
        }

        $data = [
            'title' => 'Edit Task',
            'task'  => $task
        ];

        return view('tasks/edit', $data);
    }


    // Update Task
    public function update($id)
    {
        $rules = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Task title is required.'
                ]
            ],

            'task_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Task date is required.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if (!$task) {
            return redirect()
                ->to('/tasks')
                ->with('error', 'Task not found.');
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }


    // Archive Task - soft delete
    public function archive($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (!$task) {
            return redirect()
                ->to('/tasks')
                ->with('error', 'Task not found.');
        }

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }


    // Profile
    public function profile()
    {
        $userModel = new UserModel();

        $data['user'] = $userModel->first();

        return view('profile', $data);
    }


    // About
    public function about()
    {
        return view('about');
    }
}