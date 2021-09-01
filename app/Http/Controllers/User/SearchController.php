<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Search Santri
     */
    public function santri(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $santri = Santri::where('nama', 'LIKE', '%' . $request->search . "%")
                ->OrWhere('code', 'like', "%" . $request->search . "%")
                ->OrWhere('alamat', 'like', "%" . $request->search . "%")
                ->get();

            if ($santri) {
                foreach ($santri as  $item) {
                    if ($item->user_id == userId()) {
                        $output .=
                            '<div class="text-xs capitalize w-full">
                                <div class="flex justify-between py-2 px-4 bg-white rounded my-1 items-center">
                                    <span class="pr-6">' . $item->code . ', ' . $item->nama . ', ' . $item->alamat . '</span>
                                    <div class="flex space-x-1">
                                        <a href="' . route("tabungan.create", ["code" => $item->code]) . '" class="bg-gray-100 hover:bg-gray-500 hover:text-white text-gray-800 p-1 rounded-full uppercase">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </a>
                                        <a href="' . route("santri.show", $item->code) . '" class="bg-gray-100 hover:bg-gray-500 hover:text-white text-gray-800 p-1 rounded-full uppercase">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </a>
                                        <a href="" class="bg-gray-100 hover:bg-gray-500 hover:text-white text-gray-800 p-1 rounded-full uppercase">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>';
                    }
                }
                return Response($output);
            }
        }
    }
}
