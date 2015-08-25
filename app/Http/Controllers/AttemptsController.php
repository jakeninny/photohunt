<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateAttemptRequest;
use App\Http\Requests\UpdateAttemptRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Mission;
use App\Attempt;

class AttemptsController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateAttemptRequest $request, $mission_id)
    {
        $user = User::findOrFail(1);
        $mission = Mission::findOrFail($mission_id);

        $attempt = new Attempt($request->all());
        $attempt->user_id = 1;
        $attempt->mission_id = $mission_id;

        $attempt->save();

        return redirect()->route('missions.show', $mission_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($mission_id, $id)
    {
        $attempt = Attempt::findOrFail($id);

        return view('attempts.edit', compact('attempt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateAttemptRequest $request, $mission_id, $id)
    {
        $attempt = Attempt::findOrFail($id);
        $attempt->fill($request->all());
        $attempt->save();

        return redirect()->route('missions.show', $mission_id)
            ->with('status.success', 'Success! Your Attempt has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}