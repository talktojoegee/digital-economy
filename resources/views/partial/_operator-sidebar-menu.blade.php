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
                    <span class="nav-text">Radio License</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('new-radio-license-application')}}">New Application</a></li>
                    <li><a href="{{route('all-radio-license-applications')}}">Application Log</a></li>
                    <li><a href="{{route('my-assigned-frequencies')}}">Assigned Freq.</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="ti-briefcase"></i>
                    <span class="nav-text">Company</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('company-profile')}}">Profile</a></li>
                    <li><a href="{{route('show-directors')}}">Directors</a></li>
                    <li><a href="{{route('show-contact-persons')}}">Contact Persons</a></li>
                    <li><a href="{{route('radio-work-station')}}">Radio Work Stations</a></li>
                </ul>
            </li>
            <li><a href="{{route('transactions')}}" class="ai-icon" aria-expanded="false">
                    <i class="ti-pulse"></i>
                    <span class="nav-text">Transactions</span>
                </a>
            </li>
            <li><a href="{{route('frequently-asked-questions')}}" class="ai-icon" aria-expanded="false">
                    <i class="ti-help"></i>
                    <span class="nav-text">FAQs</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>{{config('app.name')}}</strong> © {{date('Y')}} All Rights Reserved | Powered By <a target="_blank" href="#" style="color:#fff; font-weight: 700;">O'Jive Network Solutions Ltd</a></p>
        </div>
    </div>
</div>
