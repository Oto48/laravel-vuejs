<?php
namespace App\Http\Controllers;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'name' => 'required|string|max:50',
            'task' => 'required|string|max:50',
            'product' => 'required|string|max:250',
            'scheduled_time' => 'nullable',
            'actual_time' => 'nullable',
            'finish_date' => 'nullable',
        ]);

        // Create a new record in the "tasks" table
        $tableData = Tasks::create($validatedData);

        return response()->json($tableData, 201);
    }

    public function getData()
    {
        $dataList = Tasks::all(); // Retrieve all data from the "tasks" table

        return response()->json($dataList, 200);
    }
    
}