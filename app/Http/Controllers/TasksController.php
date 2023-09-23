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
            'task_type' => 'required|string|max:100',
            'task' => 'required|string|max:250',
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

    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'name' => 'required|string|max:50',
            'task_type' => 'required|string|max:100',
            'task' => 'required|string|max:50',
            'product' => 'required|string|max:250',
            'scheduled_time' => 'nullable',
            'actual_time' => 'nullable',
            'finish_date' => 'nullable',
        ]);

        $record = Tasks::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $record->update($validatedData);

        return response()->json(['message' => 'Record updated successfully'], 200);
    }

    public function deleteItem($id)
    {
        try {
            $item = Tasks::findOrFail($id);

            $item->delete();

            return response()->json(['message' => 'Item deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting item', 'error' => $e->getMessage()], 500);
        }
    }
    
}