<?php
namespace App\Http\Controllers;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'name' => 'required|string|max:50',
            'statistics_name' => 'required|string|max:100',
            'dimension' => 'nullable',
            'quantity' => 'nullable',
            'quota' => 'nullable',
            'note' => 'nullable',
        ]);

        // Create a new record in the "statistics" table
        $tableData = Statistics::create($validatedData);

        return response()->json($tableData, 201);
    }

    public function getData()
    {
        $dataList = Statistics::all(); // Retrieve all data from the "statistics" table

        return response()->json($dataList, 200);
    }

    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'name' => 'required|string|max:50',
            'statistics_name' => 'required|string|max:100',
            'dimension' => 'nullable',
            'quantity' => 'nullable',
            'quota' => 'nullable',
            'note' => 'nullable',
        ]);

        $record = Statistics::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $record->update($validatedData);

        return response()->json(['message' => 'Record updated successfully'], 200);
    }

    public function deleteItem($id)
    {
        try {
            $item = Statistics::findOrFail($id);

            $item->delete();

            return response()->json(['message' => 'Item deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting item', 'error' => $e->getMessage()], 500);
        }
    }
    
}