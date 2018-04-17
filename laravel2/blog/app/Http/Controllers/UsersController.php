<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

      $users= User::orderBy('id','ASC')->paginate(5);
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $user = new User($request->all());
        $user->password = bcrypt($request->password);
        if($user->save()){ 

return back()->with('msj', 'Usuario Registrado Exitosamente');
    }else{
return back();
    }

   } /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

       $user=User::find($id);
       return view('admin.users.edit')->with('user',$user);

           }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
     $user= User::find($id);
     $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

if($user->save()){ 


 return redirect()->route('users.index')->with('msj', 'Usuario '. $user->name . ' Modificado Exitosamente');
    }else{
return back();

    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
$user = User::find($id);
//return redirect()->route('admin.user.index')

if($user->delete()){ 

return back()->with('msj', 'Usuario '. $user->name . ' Registrado Exitosamente');
    }else{
return back();
    }

    }
}
