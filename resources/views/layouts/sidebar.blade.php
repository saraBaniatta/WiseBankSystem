<div class="iq-sidebar">
    <div class="iq-navbar-logo d-flex justify-content-between">
        <a href="#" class="header-logo">
            <img src="{{asset("images/logo.png")}}" class="img-fluid rounded" alt="">
            <span>{{ env("APP_NAME") }}</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-menu-line"></i></div>
                <div class="hover-circle"><i class="ri-close-fill"></i></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">

                <li>
                    <a href="{{ route("home") }}" class="iq-waves-effect"><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
                </li>

                <li>
                    <a href="{{ route("get.accounts") }}" class="iq-waves-effect"><i class="las la-laptop-code iq-arrow-left"></i><span>Accounts</span></a>
                </li>


{{--                <li>--}}
{{--                    <a href="#" class="iq-waves-effect"><i class="las la-cash-register iq-arrow-left"></i><span>Transactions</span></a>--}}
{{--                </li>--}}


                <li>
                    <a href="{{route("get.notifications")}}" class="iq-waves-effect"><i class="las la-bell iq-arrow-left"></i><span>notifications</span></a>
                </li>


                <li>
                    <a href="#mailbox" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                            class="las la-mail-bulk iq-arrow-left"></i><span>Transactions</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{route("get.withdrawal")}}"><i class="las la-inbox"></i>Withdrawal</a></li>
                        <li><a href="{{ route("get.deposits") }}"><i class="ri-mail-send-line"></i>Deposits</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route("get.web3")}}" class="iq-waves-effect"><i class="las la-bell iq-arrow-left"></i><span>Connect To Web3</span></a>
                </li>

            </ul>

        </nav>
        <div class="p-3"></div>
    </div>
</div>
