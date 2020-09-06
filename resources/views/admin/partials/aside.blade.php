<link rel="stylesheet" href="/admin/css/awesomplete.css">
<script src="/admin/js/awesomplete.min.js"></script>    <!-- sidebar-->
            <style>

    .menu-border-transparent {
        border-color: transparent !important;
        height: 40px;
        color: #a9a3a3;
        background-color: rgba(255, 255, 255, .1);
        /*width: 100%;*/
    }

    input[type="search"]::-webkit-search-cancel-button {
        -webkit-appearance: searchfield-cancel-button;
    }
    .inner-addon {
        position: relative;
    }
    .left-addon .fa {
        left: 0px;
    }
    .inner-addon .fa {
        position: absolute;
        pointer-events: none;
        padding: 13px;
    }
    .left-addon input {
        padding-left: 30px;
    }


</style>
<aside class="aside">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav data-sidebar-anyclick-close="" class="sidebar ">
            <!-- START sidebar nav-->
            <ul class="nav">
            <!-- START user info-->
            <li class="has-user-block">
               <a href="">
                  <div id="user-block" class="block">
                     <div class="item user-block">
                        <!-- User picture-->
                        <div class="user-block-picture">
                           <div class="user-block-status">
                              <img src="{{ \Auth::user()->image }}" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                              <div class="circle circle-success circle-lg"></div>
                           </div>
                        </div>
                        <!-- Name and Job-->
                        <div class="user-block-info">
                           <span class="user-block-name">{{ \Auth::user()->name }}</span>
                           <span class="user-block-role"> Online</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
         </ul>

            <!-- END user info-->
            <div class="inner-addon left-addon" style="width: 95%">
                <i class="fa fa-search"></i>
                <input type="search" id="s-menu" class="form-control menu-border-transparent" placeholder="Search in menu..."/>
            </div>
            <br/>

            <ul class='nav s-menu '>
                <li class='active' >
                  <a  title='Dashboard' href="{{ url('/auth/dashboard') }}">
                 <em class='fa fa-dashboard'></em><span>Dashboard</span></a>
                </li>
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#stock'> <em class='fa fa-product-hunt'></em><span>Product Management</span></a>
                  <ul id=stock class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Stock Management
                  </li>
                  <li class='' >
                    <a  title='Items' href="{{ route('products.index') }}">
                   <em class='fa fa-shopping-bag'></em><span>Products</span></a>
                  </li>
                  @if(Auth::user()->admin())
                  <li class='' >
                    <a  title='Supplier' href="{{ route('attributes.index') }}">
                   <em class='fa fa-sitemap'></em><span>Product Attribute</span></a>
                  </li>
                  <li class='' >
                    <a  title='Supplier' href="{{ route('primary_categories.index') }}">
                   <em class='fa fa-sitemap'></em><span>Primary Categories</span></a>
                  </li>
                  <li class='' >
                    <a  title='Supplier' href="{{ route('secondary_categories.index') }}">
                   <em class='fa fa-sitemap'></em><span>Secondary Categories</span></a>
                  </li>
                  <li class='' >
                    <a  title='Supplier' href="{{ route('product_categories.index') }}">
                   <em class='fa fa-sitemap'></em><span>Final Categories</span></a>
                  </li>
                  <li class='' >
                    <a  title='Supplier' href="{{ route('brands.index') }}">
                   <em class='fa fa-globe'></em><span>Brands</span></a>
                  </li>
                  @endif
                  </ul>
                </li>
                
                @if(Auth::user()->admin())
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#posts'> <em class='fa fa-newspaper-o'></em><span>Blogs</span></a>
                  <ul id=posts class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Blogs
                  </li>
                  <li class='' >
                    <a  title='Add News' href="{{ route('blogs.create') }}">
                   <em class='fa fa-plus'></em><span>Add new</span></a>
                  </li>
                  <li class='' >
                    <a  title='News List' href="{{ route('blogs.index') }}">
                   <em class='icon-list'></em><span>All Blog</span></a>
                  </li>
                  <li class='' >
                    <a  title='News Categories' href="{{ route('category.index') }}">
                   <em class='fa fa-sitemap'></em><span>Categories</span></a>
                  </li>
                  </ul>
                </li>                
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#page'> <em class='fa fa-newspaper-o'></em><span>Pages</span></a>
                  <ul id=page class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Pages
                  </li>
                  <li class='' >
                    <a  title='Add News' href="{{ route('page.create') }}">
                   <em class='fa fa-plus'></em><span>Add new</span></a>
                  </li>
                  <li class='' >
                    <a  title='News List' href="{{ route('page.index') }}">
                   <em class='icon-list'></em><span>All Pages</span></a>
                  </li>
                  </ul>
                </li>
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#user'> <em class='fa fa-users'></em><span>Users</span></a>
                  <ul id=user class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Users
                  </li>
                  <li class='' >
                    <a  title='Add User' href="{{ route('users.create') }}">
                   <em class='fa fa-plus'></em><span>Add new</span></a>
                  </li>
                  <li class='' >
                    <a  title='List User' href="{{ route('users.index') }}">
                   <em class='icon-list'></em><span>All users</span></a>
                  </li>
                  </ul>
                </li>
                <!-- <li class=''>
                  <a  title='Purchase Management' href="{{ url('/admin/expenses') }}">
                 <em class='fa fa-briefcase'></em><span>Purchase Management</span></a>
                </li> -->
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#ads'> <em class='fa fa-money'></em><span>Ads</span></a>
                  <ul id=ads class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Ads
                  </li>
                  <li class='' >
                    <a  title='Ads' href="{{ route('ads.create') }}">
                   <em class='fa fa-plus'></em><span>Add new</span></a>
                  </li>
                  <li class='' >
                    <a  title='Ads' href="{{ route('ads.index') }}">
                   <em class='icon-list'></em><span>All Ads</span></a>
                  </li>
                  </ul>
                </li>
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#slider'> <em class='fa fa-money'></em><span>Sliders</span></a>
                  <ul id=slider class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Ads
                  </li>
                  <li class='' >
                    <a  title='Ads' href="{{ route('sliders.create') }}">
                   <em class='fa fa-plus'></em><span>Add new</span></a>
                  </li>
                  <li class='' >
                    <a  title='Slider' href="{{ route('sliders.index') }}">
                   <em class='icon-list'></em><span>All Slider</span></a>
                  </li>
                  </ul>
                </li>
                <li class='sub-menu '>
                  <a data-toggle='collapse' href='#sales'> <em class='fa fa-shopping-basket'></em><span>Sales</span></a>
                  <ul id=sales class='nav s-menu sidebar-subnav collapse'><li class="sidebar-subnav-header">Sales
                  </li>
                  <li class='' >
                    <a  title='Items' href="{{ route('sales.create') }}">
                   <em class='fa fa-cube'></em><span>Add new</span></a>
                  </li>
                  <li class='' >
                    <a  title='Supplier' href="{{ route('sales.index') }}">
                   <em class='icon-briefcase'></em><span>All Sales</span></a>
                  </li>
                  </ul>
                </li>
                <li class='' >
                  <a  title='Settings' href="{{ url('/auth/media') }}">
                 <em class='fa fa-upload'></em><span>File Manager</span></a>
                </li>
                <li class='' >
                  <a  title='Settings' href="{{ route('settings.index') }}">
                 <em class='fa fa-cogs'></em><span>Settings</span></a>
                </li>
                @endif
                </ul>                                                                                                                                                      </ul>
                <!-- Iterates over all sidebar items-->
            <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>
<!-- offsidebar-->
<style type="text/css">
.offsidebar {
background-color: #1e1e2d
}
</style>
<aside class="offsidebar hide">
<!-- START Off Sidebar (right)-->
<div class="tab-content">
<!-- Home tab content -->
<div class="tab-pane active" style="background:none;" id="control-sidebar-home-tab">
    <h2 style="color: #EFF3F4;font-weight: 100;text-align: center;">Sunday<br/>31st May, 2020</h2>
    <div id="idCalculadora"></div>
</div><!-- /.tab-pane -->
</div>
<!-- END Off Sidebar (right)-->
</aside>
<link rel="stylesheet" href="/admin/css/SimpleCalculadorajQuery.css">
<script src="/admin/js/SimpleCalculadorajQuery.js"></script>
<script>
$("#idCalculadora").Calculadora({'EtiquetaBorrar': 'Clear', TituloHTML: ''});
</script>    <!-- Main section-->

<!-- Page content-->
<section>
  <div class="content-wrapper">
     <div class="content-heading">
        <a class='text-muted' href='/admin/dashboard'>{{ ucfirst(Request::segment('2')) }}</a>
        <div class="pull-right">
           <small class="text-sm">
           &nbsp; {{ date('l jS F', strtotime('Y-m-d')) }} - {{ date('Y') }}, &nbsp;Time &nbsp;<span id="txt"></span></small>
        </div>
     </div>
