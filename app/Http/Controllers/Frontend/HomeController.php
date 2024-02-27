<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\CandidateJobApplyDataTable;
use Exception;
use App\Models\User;
use App\Models\Slider;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Blog;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Slider::get();
        $category = Category::where('status', 1)->get();
        $company = User::where('role', 'company')->where('status', 'active')->take(4)->get();
        $jobs = Job::where('status', 'active')->orderBy('created_at', 'DESC')->take(5)->get();

        return view('frontend.layouts.home', compact('banner', 'company', 'category', 'jobs'));
    }


    public function searchJob(Request $request)
    {
        $keyword = $request->input('keyword'); // Accessing the 'keyword' input from the form
        $jobs = Job::where('status', 'active')
        ->where('name', 'like', '%' . $keyword . '%')
        ->orwhere('address', 'like', '%' . $keyword . '%')
        ->orwhere('office_from', 'like', '%' . $keyword . '%')
        ->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.job-via-search', compact('jobs'));
    }


    public function jobList()
    {
        $jobs = Job::where('status', 'active')->orderBy('created_at', 'DESC')->take(5)->get();
        return view('frontend.pages.job-list', compact('jobs'));
    }

    public function jobByCategory(string $id)
    {
        $jobs = Job::where('status', 'active')->where('category_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.job-via-category', compact('jobs'));
    }

    public function jobByCompany(string $id)
    {
        $jobs = Job::where('status', 'active')->where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.job-via-company', compact('jobs'));
    }


    public function aboutPage()
    {
        $company = User::where('role', 'company')->where('status', 'active')->take(4)->get();
        $aboutText = About::first();
        $aboutImage = AboutImage::take(4)->get();
        return view('frontend.pages.about', compact('aboutText', 'aboutImage', 'company'));
    }

    public function jobPage()
    {
        $jobs = Job::where('status', 'active')->orderBy('created_at', 'DESC')->paginate(5);
        return view('frontend.pages.job-list', compact('jobs'));
    }

    public function blogPage()
    {
        $company = User::where('role', 'company')->where('status', 'active')->take(4)->get();
        $blog = Blog::where('status', 1)->paginate(8);
        return view('frontend.pages.blog', compact('blog', 'company'));
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('candidate.dashboard');
            } else {
                $createuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => 'candidate'
                ]);

                Auth::login($createuser);
                return redirect()->route('candidate.dashboard');
            }
        } catch (Exception $e) {
            toastr()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->route('home.page');
        }
    }


    public function companyGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function companyGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('company.dashboard');
            } else {
                $createuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => 'company'
                ]);

                Auth::login($createuser);
                return redirect()->route('company.dashboard');
            }
        } catch (Exception $e) {
            toastr()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->route('home.page');
        }
    }

    public function allCompany()
    {
        $company = User::where('status', 'active')->where('role', 'company')->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.company', compact('company'));
    }

    public function allCategory()
    {
        $category = Category::where('status', 1)->get();
        return view('frontend.pages.category', compact('category'));
    }


}
