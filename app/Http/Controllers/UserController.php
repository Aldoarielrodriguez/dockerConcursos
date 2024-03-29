<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *bcrypt(
     * @return Response
     */
    public function create()
    {
        $roles = collect(['Administrador' => 'Administrador' , 'Administrativo' => 'Administrativo' , 'Miembro' => 'Miembro']);
        $estado = collect(['HABILITADO' => 'Habilitado' , 'DESHABILITADO' => 'Deshabilitado']);
        return view('users.create' , compact('roles' , 'estado'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $roles = collect(['Administrador' => 'Administrador', 'Administrativo' => 'Administrativo', 'Miembro' => 'Miembro']);
        $estado = collect(['HABILITADO' => 'Habilitado' , 'DESHABILITADO' => 'Deshabilitado']);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index') , compact('roles' , 'estado'));
        }

        return view('users.edit' , compact('roles' , 'estado'))->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
    public function profile()
    {
    		return view('profile', array('user' => Auth::user()) );
    }

    public function updatePhoto(Request $request)
    {
    	 if($request->hasFile('image')){
    		 $image = $request->file('image');
    		 $filename = time() . '.' . $image->getClientOriginalExtension();
    		 Image::make($image)->resize(300, 300)->save( public_path('/avatars/' . $filename ) );
    		 $user = Auth::user();
    		 $user->image = $filename;
    		 $user->save();
    }
     return view('profile', array('user' => Auth::user()) );
    }

}
