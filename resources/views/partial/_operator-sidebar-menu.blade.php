<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{route('dashboard')}}" class="ai-icon" aria-expanded="false">
                    <i class="ti-blackboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="ti-id-badge"></i>
                    <span class="nav-text">Licence</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('new-licence-application')}}">New Application</a></li>
                    <li><a href="{{route('licence-certificates')}}">All Applications</a></li>
                    <li><a href="{{route('licence-certificates')}}">Licence Certificates</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="ti-briefcase"></i>
                    <span class="nav-text">Company</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('company-profile')}}">Profile</a></li>
                    <li><a href="{{route('add-new-device-equipment')}}">New Equipment</a></li>
                    <li><a href="{{route('phone-group')}}">All Equipments</a></li>
                    <li><a href="{{route('manage-publication-categories')}}">Work Stations</a></li>
                </ul>
            </li>
            <li><a href="{{route('news-feed')}}" class="ai-icon" aria-expanded="false">
                    <i class="ti-pulse"></i>
                    <span class="nav-text">Transaction Log</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>{{config('app.name')}}</strong> © {{date('Y')}} All Rights Reserved | Powered By <a target="_blank" href="#" style="color:#fff; font-weight: 700;">O'Jive Network Solutions Ltd</a></p>
        </div>
    </div>
</div>
