<?php

class AdminRolesController extends AdminBaseController {

    // Laat alle rollen zien in een tabel
    public function getIndex() {
        $this->layout->title = 'Rollen overzicht';
        $this->layout->content->title = 'Rollen overzicht';
        $this->layout->content->content = View::make('admin.roles.roles_overview')->with('roles', Role::orderBy('name')->get());
    }

    public function getEdit($id = null) {
        $user = Auth::user();
        if (!$user->hasRole('Admin')) {
            return Redirect::to('admin/dashboard')->with('warning', 'Geen toegang tot de pagina rollen.');
        }
        $role = null;
        if (!is_null($id)) {
            $role = Role::find($id);
            $this->layout->title = 'Rol \'' . $role->naam . '\' wijzigen';
            $this->layout->content->title = 'Rol \'' . $role->naam . '\' wijzigen';
        }

        if (is_null($role)) {
            $role = new Role();
            $this->layout->title = 'Rol toevoegen';
            $this->layout->content->title = 'Role toevoegen';
        }

        $this->layout->content->content = View::make('admin.roles.roles_edit')->with('role', $role);
    }

    public function edit($id = null) {
        $role = null;
        if (!is_null($id)) {
            $role = Role::find($id);
        }
        if (is_null($role)) {
            $role = new Role();
        }


        //$role = new Role();
        // Declare the rules for the form validation	
        $rules = array(
            'naam' => 'required'
        );

        //Get all the inputs
        $inputs = Input::all();

        //Validate the inputs
        $validator = Validator::make($inputs, $rules);

        //Check if the form validation with success
        if ($validator->passes()) {
            // Create the role
            $role->name = Input::get('naam');
            $role->save();

            return Redirect::to('admin/roles')->with('success', 'Rol \'' . $role->name . '\' is toegevoegd/gewijzigd');
        } else {
            return Redirect::to('admin/roles/edit')->withErrors($validator);
        }
    }

    public function getDelete($id = null) {
        $role = Role::find($id);

        if (is_null($role)) {
            return Redirect::to('admin/roles')->with('warning', 'Er is geen rol bekend');
        }
        if ($role->id == 1) { //admin deze kan niet weg!!!
            return Redirect::to('admin/roles')->with('warning', 'De rol ' . $role->naam . ' mag niet verwijderd worden!');
        }

        $role->delete();

        return Redirect::to('admin/roles')->with('success', 'Rol  \'' . $role->naam . '\' is verwijderd');
    }

}
