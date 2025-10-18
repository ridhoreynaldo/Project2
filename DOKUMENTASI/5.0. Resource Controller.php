<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Attribut;
use App\Services\SAWService;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AlternatifRequest;
class AlternatifController extends Controller
{

//Resource Controller (CRUD)
//DRY (DONT REPEAT YOURSELF)
//MVP (MINIMUM VIABLE PRODUCT)

//🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩
//── app/Http/Controllers/Auth/
//   ├── LoginController.php 🟩READ User,Admin
//   └── RegisterController.php 🟩CREATE User

//⚙️ php artisan make:controller Auth/LoginController
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/redirect');
        }
        return redirect('/login')->withErrors(['login' => 'Email atau password salah']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
//🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩

//🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩
//── app/Http/Controllers/User/
//   ├── DashboardController.php 🟩READ User,Admin
//   ├── CalculationController.php 🟩READ User,Admin
//   ├── RoleController.php 🟩CRUD Admin 🟧One To Many (User)
//   ├── UserController.php 🟩CRUD Admin 🟧Many To One (Role) 🟧One To One (Profile)
//   ├── ProfileController.php 🟩CRUD User,Admin 🟧One To One (User) 🟧One To Many (HobbyProfile)
//   ├── HobbyController.php 🟩CRUD Admin 🟧One To Many (HobbyProfile)
//   └── HobbyProfileController.php 🟩CRUD User,Admin 🟧Many To One (Profile) 🟧Many To One (Hobby)

//⚙️ php artisan make:controller DashboardController 🟩READ User,Admin
public function admin()
{
    return view('dashboard.admin'); // ➡️views/dashboard/admin.blade.php
}
public function user()
{
    return view('dashboard.user'); // ➡️views/dashboard/user.blade.php
}

//⚙️ php artisan make:controller User/CalculationController 🟩READ User,Admin
public function index()
    {
        return view('perhitungan.index'); //Halaman untuk memilih metode
    }
    public function proses(Request $request)
    {
        $metode = $request->metode;
        return match ($metode) {
            'saw' => app(SAWService::class)->saw(),
            'waspas' => app(WASPASService::class)->hitung(),
            'topsis' => app(TOPSISService::class)->hitung(),
            'wp' => app(WPService::class)->wp(),
            'vikor' => app(VIKORService::class)->vikor(),
            'smart' => app(SMARTService::class)->hitung(),
            'promethee' => app(PROMETHEEService::class)->hitung(),
            'electre' => app(ELECTREService::class)->electre(),
            'mabac' => app(MabacService::class)->mabac(),
            'moora' => app(MooraService::class)->moora(),
            'maut' => app(MautService::class)->maut(),
            'ahp' => app(AHPService::class)->ahp(),

            //roc kriteria
            default => redirect()->route('perhitungan.index')->with('error', 'Metode tidak ditemukan'),
        };
    }

//⚙️  php artisan make:controller User/RoleController --resource 🟩CRUD Admin 🟧One To Many (User)
    public function index() //🟩Menampilkan Semua Data
    {
        $data = Role::latest()->paginate(10);// urutkan by `created_at` DESC// 10 data per halaman
        return view('roles.index', compact('data'));
    }
    public function create() //🟩Menampilkan Form Input ❌Tidak pakai di REST API
    {
        return view('roles.create');
    }
    public function store(RoleStoreRequest $request) //🟩Menyimpan Data Baru
    {
        Role::create($request->validated()); // Form Request Validation
        return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan.');
    }
    public function show(Role $role) //🟩Menampilkan Detail Dari 1 Data 🟦Route Model Binding
    {
        return view('roles.show', compact('role'));
    }
    public function edit(Role $role) //🟩Menampilkan Form Edit 🟦Route Model Binding ❌Tidak pakai di REST API
    {
        return view('roles.edit', compact('role'));
    }
    public function update(RoleUpdateRequest $request, Role $role) //🟩Menyimpan Perubahan Data 🟦Route Model Binding
    {
        $role->update($request->validated()); // Form Request Validation
        return redirect()->route('roles.index')->with('success', 'Berhasil mengupdate alternatif.');
    }
    public function destroy(Role $role) //🟩 Menghapus Data
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus.');
    }

//⚙️  php artisan make:controller User/UserController --resource 🟧Many To One (Role) 🟧One To One (Profile)
    public function index()
    {
        $data = User::with('role')->latest()->paginate(10); //🟧Memanggil data User beserta relasi (Role)
        return view('users.index', compact('data'));
    }
    public function create()
    {
        $roles = Role::all(); //🟧Ambil data (Role)
        return view('users.create', compact('roles'));
    }
    public function store(UserStoreRequest $request)
    {
        User::create($request->validated()); // Form Request Validation
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        $roles = Role::all(); //🟧Ambil data (Role)
        return view('users.edit', compact('user','roles'));
    }
    public function update(UserUpdateRequest $request, User $user) //🟩Menyimpan Perubahan Data 🟦Route Model Binding
    {
        $user->update($request->validated()); // Form Request Validation
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

//⚙️  php artisan make:controller User/ProfileController --resource 🟧One To One (User) 🟧One To Many (HobbyProfile)
    protected $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    public function index()
    {
        $profiles = Profile::with('user')->latest()->paginate(10); //🟧Memanggil data Profile beserta relasi (User)
        return view('profiles.index', compact('profiles'));
    }
    public function create()
    {
        $users = User::all(); //🟧Ambil data (User)
        return view('profiles.create', compact('users'));
    }
    public function store(ProfileStoreRequest $request)
    {
        $this->profileService->createProfile($request->validated(), $request->file('foto'));
        return redirect()->route('profiles.index')->with('success', 'Profile berhasil ditambahkan.');
    }
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }
    public function edit(Profile $profile)
    {
        $users = User::all(); //🟧Ambil data (User)
        return view('profiles.edit', compact('profile', 'users'));
    }
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $this->profileService->updateProfile($profile, $request->validated(), $request->file('foto'));
        return redirect()->route('profiles.index')->with('success', 'Profile berhasil diperbarui.');
    }
    public function destroy(Profile $profile)
    {
        $this->profileService->deleteProfile($profile);
        return redirect()->route('profiles.index')->with('success', 'Profile berhasil dihapus.');
    }

//⚙️  php artisan make:controller User/HobbyController --resource 🟧One To Many (HobbyProfile)
    public function index()
    {
        $data = Hobby::latest()->paginate(10);
        return view('hobbies.index', compact('data'));
    }
    public function create()
    {
        return view('hobbies.create');
    }
    public function store(HobbyStoreRequest $request)
    {
        Hobby::create($request->validated());
        return redirect()->route('hobbies.index')->with('success', 'Hobby berhasil ditambahkan.');
    }
    public function show(Hobby $hobby)
    {
        return view('hobbies.show', compact('hobby'));
    }
    public function edit(Hobby $hobby)
    {
        return view('hobbies.edit', compact('hobby'));
    }
    public function update(HobbyUpdateRequest $request, Hobby $hobby)
    {
        $hobby->update($request->validated()); // Form Request Validation
        return redirect()->route('hobbies.index')->with('success', 'Berhasil mengupdate hobby.');
    }
    public function destroy(Hobby $hobby)
    {
        $hobby->delete();
        return redirect()->route('hobbies.index')->with('success', 'Hobi berhasil dihapus.');
    }

//⚙️  php artisan make:controller User/HobbyProfileController --resource 🟧Many To One (Profile) 🟧Many To One (Hobby)
    public function index()
    {
        $data = Profile::with('hobbies')->latest()->paginate(10); //🟧Memanggil data Profile beserta relasi (Hobby)
        $allHobbies = Hobby::all();
        return view('hobby_profiles.index', compact('data','allHobbies'));

    }
    public function create()
    {
        return view('hobbies.create');
    }
    public function store(HobbyStoreRequest $request)
    {
        Hobby::create($request->validated());
        return redirect()->route('hobbies.index')->with('success', 'Hobby berhasil ditambahkan.');
    }
    public function show(Hobby $hobby)
    {
        return view('hobbies.show', compact('hobby'));
    }
    public function edit(Hobby $hobby)
    {
        return view('hobbies.edit', compact('hobby'));
    }
    public function update(HobbyUpdateRequest $request, Hobby $hobby)
    {
        $hobby->update($request->validated()); // Form Request Validation
        return redirect()->route('hobbies.index')->with('success', 'Berhasil mengupdate hobby.');
    }
    public function destroy(Hobby $hobby)
    {
        $hobby->delete();
        return redirect()->route('hobbies.index')->with('success', 'Hobi berhasil dihapus.');
    }
//🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩

//🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩
//── app/Http/Controllers/DSS/
//   ├── AttributeController.php 🟩CRUD Admin 🟧One To Many (Alternative)
//   ├── AlternativeController.php 🟩CRUD Admin 🟧Many To One (Attribute) 🟧One To Many (AlternativeCriterion)
//   ├── CriterionController.php 🟩CRUD Admin 🟧One To Many (AlternativeCriterion) 🟧One To Many (SubCriterion)
//   ├── SubCriterionController.php 🟩CRUD Admin 🟧Many To One (Criterion)
//   └── AlternativeCriterionController.php 🟩CRUD Admin 🟧Many To One (Alternative) 🟧Many To One (Criterion)

//⚙️  php artisan make:controller DSS/AttributeController --resource

//⚙️  php artisan make:controller DSS/AlternativeController --resource
    public function index()
    {
        // $alternatives = Alternative::all();
        $alternatives = Alternative::with('attribute') // jika butuh relasi
                            ->latest()
                            ->paginate(10);
        return view('alternatives.index', compact('alternatives'));
    }
    public function create()
    {
        $attributes = Attribute::all();
        return view('alternative.create', compact('attributes'));
    }
    public function store(AlternativeStoreRequest $request)
    {
        Alternative::create($request->validated());
        return redirect()->route('alternatives.index')->with('success', 'Berhasil menambahkan alternatif.');
    }
    public function show(Alternative $alternative)
    {
        return view('alternatives.show', compact('alternative'));
    }
    public function edit(Alternative $alternative)
    {
        $attributes = Attribute::all(); // kalau memang dibutuhkan
        return view('alternatives.edit', compact('alternative', 'attributes'));
    }
    public function update(AlternativeUpdateRequest $request, Alternative $alternative)
    {
        $alternative->update($request->validated());
        return redirect()->route('alternatives.index')->with('success', 'Berhasil mengupdate alternatif.');
    }
    public function destroy(Alternative $alternative)
    {
        $alternative->delete();
        return redirect()->route('alternatives.index')->with('success', 'Berhasil menghapus alternatif.');
    }

//⚙️  php artisan make:controller DSS/CriterionController --resource
//⚙️  php artisan make:controller DSS/SubCriterionController --resource
//⚙️  php artisan make:controller DSS/AlternativeCriterionController --resource

//🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩🟩
