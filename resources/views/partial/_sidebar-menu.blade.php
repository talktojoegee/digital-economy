<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{route('news-feed')}}" class="ai-icon" aria-expanded="false">
                    <i class="ti-book"></i>
                    <span class="nav-text">Newsfeed</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Licence</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('all-employees')}}">Applications</a></li>
                    <li><a href="{{route('add-new-employee')}}">Companies</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Administration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('all-employees')}}">All Employees</a></li>
                    <li><a href="{{route('add-new-employee')}}">Add New Employee</a></li>
                    <li><a href="{{route('human-resource-settings')}}">Settings</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-smartphone"></i>
                    <span class="nav-text">Bulk SMS</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('top-up')}}">Top-up</a></li>
                    <li><a href="{{route('phone-group')}}">Phone Groups</a></li>
                    <li><a href="{{route('manage-publication-categories')}}">Compose Message</a></li>
                    <li><a href="{{route('manage-publication-categories')}}">Messages</a></li>
                </ul>
            </li>
            <li><a href="{{route('manage-files')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-file"></i>
                    <span class="nav-text">File Storage</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>{{config('app.name')}}</strong> © {{date('Y')}} All Rights Reserved | Powered By <a target="_blank" href="#" style="color:#fff; font-weight: 700;">O'Jive Network Solutions Ltd</a></p>
        </div>
    </div>
</div>
