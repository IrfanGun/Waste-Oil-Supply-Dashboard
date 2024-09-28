<?php

namespace App\Http\Controllers;

use App\Charts\UniChart;
use App\Http\Requests\StoreUserAccountRequest;
use App\Http\Requests\UpdateUserAccountRequest;
use App\Models\saldo;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Policies\UserPolicy;
use Carbon\Carbon;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;




class UserAccountController extends Controller
{
     /**
     * Display a listing of the resource.
     * 
     */

     
    public function index()
    {   

        
        // Creating Amount of Users
        $users = User::pelanggan()
        ->selectRaw('
            count(*) as total_users,
            count(case when status = "pending" then 1 end) as pending_users,
            count(case when status = "terverifikasi" then 1 end) as verified_users,
            count(case when date(created_at) = CURDATE() then 1 end) as new_users
        ')
        ->get();

        $dataCount = $users->first()->total_users;
        $userPending = $users->first()->pending_users;
        $userVerified = $users->first()->verified_users;
        $newUser = $users->first()->new_users;
        
        //Creating Data Chart Bar Value
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        $lastMonthStart = $currentMonthStart->subMonth();
        $lastMonthEnd = $lastMonthStart->endOfMonth();
        
        // Get users created in the current month
        $currentMonthUsers = DB::table('users')
            ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
            ->count();
        
        // Get users created in the last month
        $lastMonthUsers = DB::table('users')
            ->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
            ->count();

        //Build Chart
        $currentTime = Carbon::today();
        $currentMonthLabel = $currentTime->format('M');
        $lasMonthLabel = $currentTime->subMonth(1)->format('M');

        $chart = Chartjs::build()
                ->name('LaporanPengguna')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels(['Juli', $lasMonthLabel, $currentMonthLabel])
                ->datasets([
                [
                    'data' => [ 2, 4, 7],
                    'borderRadius' => 10,
                    'borderWidth' => 0,
                    'barPercentage' => 1,
                    'fill' => true,
                    
                   'backgroundColor' =>'rgba(255, 99, 132)',
                ],
                ])
                ->options([
                    'maintainAspectRatio' => false,
                    'plugins' => [
                  
                ],
                        
                    
                  'scales' => 
                    [
                        'x'=> [
                            'grid'=> [
                                'display' => false
                            ],
                            'border' => [
                                'display' => false
                            ]
                        ],
                        'y' => [
                            'max' => 10,
                            'border' => [
                                'display' => false,
                                'dash' => [5,5] 
                            ],
                            'grid'=> [
                                'display' => true
                            ],
                            'beginAtZero' => true
                        ]
                            ],
                    'elements' => [
                        'bar' => [
                            'borderRadius' => 10,
                            'borderSkipped' => false,
                        
                        ]
                    ]
                ]);

        
        return view('admin.beranda.index', compact('dataCount', 'newUser', 'userPending', 'userVerified','users','chart' ));
            

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    
        //
        return view ('admin.beranda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAccountRequest $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'gender' => $request->gender,
            'kota' => $request->kota,
            'password' => Hash::make($request->password),
            'posisi' => 'pelanggan',
            'status' => 'pending',
            
        ]);

        event(new Registered($user));

        $user->assignRole('pelanggan pending');

        $saldo = new saldo([
            'saldo' => 0
        ]);

        $user->saldo()->save($saldo);


        return redirect()->route('admin.beranda.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAccountRequest $request, User $user)
    {
        //
        DB::transaction(function() use ($request, $user) {
            $validated = $request->validate();
            $user -> update($validated);
        });

        return redirect()->route('admin.beranda.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        
      
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return redirect()->route('admin.beranda.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.beranda.index');
            //throw $th;
        }


    }
}
