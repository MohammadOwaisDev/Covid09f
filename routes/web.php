<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Patientregcont;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/About', function () {
    return view('about');
});

Route::get('/Blog', function () {
    return view('blog');
});
Route::get('/Preventation', function () {
    return view('preventation');
});

Route::get('/prodetail', function () {
    return view('prodetails');
});

Route::get('/Contacts', function () {
    return view('contact');
});
Route::get('/Vaccines', function () {
    return view('vaccine');
});

Route::get('/Cart', function () {
    return view('cart');
});

Route::get('/hospitalpage', function () {
    return view('hospitals');
});
Route::get('/bookappoitment', function () {
    return view('appoitmentbook');
});







//------------------------------------ patient dashboard routes---------------------------

Route::get('/preg', function () {
    return view('patient.patientreg');
});
Route::get('/loginform', function () {
    return view('login');
});
// Route::get('/pdash', function () {
//     return view('patient.index');
// });
// Route::get('/ptable', function () {
//     return view('patient.tables-data');
// });

Route::get('/preports', function () {
    return view('patient.report');
});

Route::get('/hospitals', function () {
    return view('ourhospitals');
});

Route::get('/myappointment', function () {
    return view('patient.myapp');
});
Route::get('/myprofile', function () {
    return view('patient.profile');
});







// admin dashboard routes
// Route::get('/adminreg', function () {
//     return view('admin.register');
// });
// Route::get('/alogin', function () {
//     return view('admin.login');
// });

//------------------------------------- admin dashboard routes ------------------
// Route::get('/adash', function () {
//     return view('admin.index');
// });



Route::get('/appbookdetail', function () {
    return view('admin.bookdetail');
});

//hospital dashboard route


// Route::get('/hreg', function () {
//     return view('hospitals.register');
// });
// Route::get('/hlog', function () {
//     return view('hospitals.login');
// });
Route::get('/approved', function () {
    return view('hospitals.approvedpatient');
});

Route::get('/testresult', function () {
    return view('hospitals.Covidtest');
});
Route::get('/vaccineresult', function () {
    return view('hospitals.Vaccination');
});
Route::get('/patientreq', function () {
    return view('hospitals.Request');
});



//update page route
Route::get('/update', function () {
    return view('hospitals.update');
});


// admin table route
Route::get('/admintable', function () {
    return view('admin.tabledata');
});



// auth routes



// ----------------------------------------admin controller routes----------------------------
// Route::GET('/admintable',[Admincontroller::class,'fetchallpatient']);
// Route::get('/delete_patient/{id}',[Admincontroller::class,'deletepatient']);


// Route::get('/Bookings', [AppointmentController::class, 'fetchapp']);

// Route::post('/adminregister', [Admincontroller::class, 'adminreg']);

Route::post('/userlogs', [AuthController::class, 'Login']);

Route::post('/register', [AuthController::class, 'PatientReg']);




// approve patient

Route::post('/appointments/{id}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
Route::delete('/appointments/{id}/reject', [AppointmentController::class, 'reject'])->name('appointments.reject');



// ----------------------Hospital controller route
Route::GET('/approved',[Hospitalcontroller::class,'fetchapproved']);

Route::get('/edit_test/{id}',[Hospitalcontroller::class,'patientedit']);

Route::post('/updatetests/{id}',[Hospitalcontroller::class,'patientupdate']);





// export patient data
// Route::get('/excel/{id}',[AdminController::class,('export')]);



// patient controller route
// Route::POST('/plog',[Patientregcont::class,'patientregs']);

Route::POST('/book',[AppointmentController::class,'booking']);


// Route::POST('/inserted',[LoginController::class,'login']);



//hospital controller route
Route::POST('/hinsert',[HospitalController::class,'hospitalreg']);

Route::POST('/hospitallog',[HospitalController::class,'hospitalogin']);



// login page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/loginform');
})->name('logout');


// Dashboards View Routes With Middleware

Route::middleware(['auth'])->group(function () {
Route::get('/hdash',[AuthController::class, 'HospitalDash']);
Route::get('/adash',[AuthController::class, 'AdminDash']);
Route::post('/pdash',[AuthController::class, 'PatientDash']);
});



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/adash', [AuthController::class, 'AdminDash']);
});

Route::middleware(['auth', 'role:hospital'])->group(function () {
    Route::get('/hdash', [AuthController::class, 'HospitalDash']);
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/pdash', [AuthController::class, 'PatientDash']);
});




// Admin Controller and view Routes
Route::get('/hospitalmanage',[AdminController::class, 'fetchHospitals']);


Route::post('/addhospital',[AdminController::class, 'AddHospital']);

Route::get('/edithospital/{id}',[AdminController::class, 'editHospital']);

Route::post('/updatehospital',[AdminController::class, 'updateHospital']);




