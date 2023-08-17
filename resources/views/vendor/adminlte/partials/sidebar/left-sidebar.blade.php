<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
    @include('adminlte::partials.common.brand-logo-xl')
    @else
    @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}" data-widget="treeview" role="menu" @if(config('adminlte.sidebar_nav_animation_speed') !=300) data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}" @endif @if(!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')


                <li class="nav-item has-treeview">
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-user "></i>
                        <p>
                            Employé
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employe.index') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Liste des Employés
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employe.create') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Ajouter
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-project-diagram"></i>
                        <p>
                            Projet
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projet.index') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Liste des Projets
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projet.create') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Ajouter
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-tasks"></i>
                        <p>
                            Phase
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('phase.index') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Liste des Phases
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('phase.create') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Ajouter
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-comments"></i>
                        <p>
                            Commentaire
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('commentaire.index') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Liste des Commentaires
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('commentaire.create') }}">
                                <i class="far fa-fw fa-circle "></i>
                                <p>
                                    Ajouter
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Custom logout link --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </form>
            </ul>
        </nav>
    </div>

</aside>