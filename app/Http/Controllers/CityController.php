<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use Illuminate\Support\Str;

class CityController extends Controller
{
    //

    public function index()
    {
        $city = session('city');
        if (session()->has('city')) {
            return redirect()->route('city.show', ['city' => $city->slug]);
        } else {
            // Возможная логика для случая, когда город не выбран
            $cities = City::all();
            return view('cities.index', compact('city','cities'));
        }
    }

    public function show($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        session(['city' => $city]);
        $cities = City::all();
        return view('cities.show', compact('city','cities'));
    }

    public function about($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        
        return view('cities.about', compact('city'));
    }

    public function news($slug)
    {
        $city = City::where('slug', $slug)->firstOrFail();
        
        return view('cities.news', compact('city'));
    }

    public function form()
    {
        return view('cities.store');

    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:cities,name',
            // 'slug' => 'required|string|unique:cities,slug',
        ]);

        $slug = Str::slug($request->name);
        $city = City::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        session(['store'=>'Добавлено']);

        return redirect()->route('home');
    }

    public function delete($slug)
    {
         $city = City::where('slug', $slug)->firstOrFail();
         $city->delete();

        session(['delete'=>'Выполнено!']);
        return redirect()->route('home');
    }
}
