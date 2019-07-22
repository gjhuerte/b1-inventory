<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\StoreRequest;
use App\Http\Requests\UserRequests\UpdateRequest;
use App\Enums\User\Type;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $service)
    {
        $users = $service->get();

        return view('user.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('user.user.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, UserService $service)
    {
        $service->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'password' => $request['password'],
        ]);

        return redirect()
            ->route('user.index')
            ->with('success', 'Successfully created a user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserService $service, $id)
    {
        $types = Type::all();
        $user = $service->find($id);

        return view('user.user.edit', compact('user', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, UserService $service,  $id)
    {
        $service->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
        ], $id);

        return redirect()
            ->route('user.index')
            ->with('success', 'Successfully updated a user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserService $service, $id)
    {
        $service->delete($id);

        return redirect()
            ->route('user.index')
            ->with('success', 'Successfully removed a user');
    }
}
