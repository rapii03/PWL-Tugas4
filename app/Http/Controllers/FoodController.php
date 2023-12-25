<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Models\Food;

class FoodController extends Controller
{
    public function create (Request $request) {
        try {
            $food = $request -> validate ([
                'name' => ['required', 'unique:food'],
                'type' => ['required'],
                'stock' => ['required', 'numeric'],
                'prize' => ['required', 'numeric']
            ]);

            Food::create($food);

            return response() -> json ([
                'data' => $food,
                'message' => 'Data Makanan Berhasil Dibuat'
            ], 201);
        } catch (\Exception $e) {
            return response() -> json ([
                'data' => $food,
                'message' => $e -> getMessage(),
            ], 400);
        }
    }

    public function read () {
        return response () -> json ([
            'data' => Food::all(),
        ], 200);
    }

    public function update (Food $food, Request $request) {
        try {
            $request -> validate ([
                'name' => ['unique:food'],
                'stock' => ['numeric'],
                'prize' => ['numeric']
            ]);

            if(!$request['name'] and !$request['type'] and !$request['stock'] and !$request['prize']) {
                return response () -> json ([
                    'message' => 'Data Perubahan Tidak Ditemukan'
                ], 400);
            }

            if ($request['name']) {
                $food -> name = $request['name'];
            }
            if ($request['type']) {
                $food -> type = $request['type'];
            }
            if ($request['stock']) {
                $food -> stock = $request['stock'];
            }
            if ($request['prize']) {
                $food -> prize = $request['prize'];
            }

            $food -> save();

            return response () -> json ([
                'data' => $food,
                'message' => 'Data Makanan Berhasil Diubah'
            ], 200);
        } catch (\Exception $e) {
            return response () -> json ([
                'data' => $food,
                'message' => $e -> getMessage(),
            ], 400);
        }
    }

    public function delete (Food $food) {
        try {
            $food -> delete();
            
            return response () -> json ([
                'message' => 'Data Makanan Berhasil Dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response () -> json ([
                'message' => $e -> getMessage()
            ], 400);
        }
    }
}
