@php
$adminData =App\Models\User::where('id',Auth::user()->id)->first();
@endphp

<div class="sidebar-wrapper bg-primary" data-simplebar="true">
    <div class="sidebar-header">
        <div>
        </div>
        <div>
            <h4 class="logo-text"> {{$adminData->name}} </h4>
        </div>
       
    </div>
    <ul class="metismenu" id="menu">
        <li>
            <a href="">
                <div class="parent-icon">
                </div>
                <div class="menu-title"></div>
            </a>
        </li>

        <li>
            <a href="#" target="_blank">
                <div class="parent-icon">
                </div>
                <div class="menu-title"></div>
            </a>
        </li>
    </ul>
    <ul class="metismenu" id="menu" style="background-color: darkblue;">
        <li>
            <a href="{{route('dashboard')}}" class="menu-title btn btn-light w-20px d-flex justify-content-center align-items-center">  
                <div style="color: blue;">Dashboard</div>
            </a>
            
        </li>
        
        <li></li>

        <li class="mt-20">
            <a href=" {{route('clinic.list')}} " class="menu-title btn btn-light w-20px d-flex justify-content-center align-items-center">  
                <div style="color: blue;">Clinic List</div>
            </a>
            
        </li>
    </ul>
    <ul class="metismenu" id="menu">
        <li>
            <a href="">
                <div class="parent-icon">
                </div>
                <div class="menu-title"></div>
            </a>
        </li>

        <li>
            <a href="#" target="_blank">
                <div class="parent-icon">
                </div>
                <div class="menu-title"></div>
            </a>
        </li>
    </ul>
    <ul class="metismenu" id="menu" style="background-color: darkblue;">
        <li>
            <a href="{{route('clinic.schedule')}} " class="menu-title btn btn-light w-20px d-flex justify-content-center align-items-center">  
                <div style="color: blue;">Clinic Schedule</div>
            </a>
            
        </li>
        <br>

        
    </ul>
   
</div>

